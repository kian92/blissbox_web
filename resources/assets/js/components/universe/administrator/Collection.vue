<template>
    <div class="collection-item avatar">
        <img v-bind:src="'/storage/universes/' + item.thumbnail" alt="Logo" class="circle responsive-img">
        <span class="title">{{ item.name }}</span>
        <p>{{ item.description }}</p>
        <div class="row action-panel">
            <div class="col s12 universe-info right-align">
                <span><a class="btn" v-bind:href="'/universe/' + item.id + /edit/">Edit</a></span>
                <span><a class="btn" v-on:click="toggleConfirmDelete">Delete</a></span>
            </div>
        </div>
        <div class="confirmation" v-if="confirmDelete">
            <div class="row valign-wrapper">
                <div class="col s12">
                    <h3>Confirm Delete?</h3>
                    <button class="btn waves-effect" v-on:click="destroy(item.id)">Yes</button>
                    <button class="btn waves-effect" v-on:click="toggleConfirmDelete">No</button>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
    .collection .collection-item.avatar {
        padding-left: 140px;
    }
    .collection .collection-item.avatar .title {
        font-size: 20px;
        text-transform: uppercase;
        margin: 20px 0;
        display: block;
    }
    .collection .collection-item.avatar .circle {
        width: 100px;
        height: 100px;
        border-radius: 0;
    }
    .universe-info .btn {
        margin-bottom: 10px;
    }
    .action-panel {
        margin-bottom: 0;
        margin-top: 15px;
    }
    .confirmation {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        text-align: center;
    }
    .confirmation .valign-wrapper {
        flex-direction: row;
    }
</style>
<script>
    import Vue from 'vue';
    import axios from 'axios';
    import toastr from 'toastr';
    import Hashids from 'hashids';

    export default {
        props: [
            'item'
        ],
        data() {
            return {
                confirmDelete: false
            }
        },
        mounted() {
            let hashids = new Hashids();
            this.item.id = hashids.encode(this.item.id);
        },
        methods: {
            toggleConfirmDelete: function() {
                this.confirmDelete = !this.confirmDelete;
            },
            destroy: function(id) {
                let vm = this;
                vm.loading = true;
                axios.post('/universe/destroy/' + id)
                    .then(function(response) {
                        vm.loading = false;
                        if (response.data.status) {
                            toastr.success('Removed!');
                            vm.$emit('refresh');
                        } else {
                            toastr.success('Failed to remove!');
                        }
                    })
                    .catch(function(error) {
                        vm.loading = false;
                        if (error.response) {
                            // The request was made and the server responded with a status code
                            // that falls out of the range of 2xx
                            console.log(error.response);
                            if (error.response.status < 500) {
                                var errorMessage = error.response.data;
                                for (var name in errorMessage) {
                                    if (errorMessage.hasOwnProperty(name)) {
                                        toastr.error(errorMessage[name]);
                                    }
                                }
                            } else {
                                toastr.error(error.response.statusText);
                            }
                        } else if (error.request) {
                            // The request was made but no response was received
                            // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                            // http.ClientRequest in node.js
                            console.log(error.request);
                            toastr.error(error.request);
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            console.log('Error', error.message);
                            toastr.error(error.message);
                        }
                        console.log(error.config);
                    });
            }
        }
    }
</script>