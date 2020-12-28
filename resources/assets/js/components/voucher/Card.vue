<template>
    <div class="col s12 m6">
        <div class="card">
            <div class="card-content white-text center-align">
                <img v-bind:src="'/storage/giftboxes/' + item.thumbnail" alt="item.name" class="responsive-img" />
                <span class="card-title">{{ item.name }}</span>
            </div>
            <div class="card-action" v-if="show">
                <input type="text" name="quantity" id="quantity" v-validate="'required|numeric'" v-model="quantity">
                <span v-cloak v-show="errors.has('quantity')" class="error">{{ errors.first('quantity') }}</span>
                <br/>
                <label for="quantity">Number to Generate</label>
                <br/><br/>
                <button class="btn" v-on:click="generate(item.id)">Generate</button>
            </div>
            <div class="card-action right-align">
                <a href="#" class="left" v-on:click="showGenerate">Generate</a>
                <a v-bind:href="'/giftbox/' + item.id + /edit/">Edit</a>
                <a v-on:click="toggleConfirmDelete">Delete</a>
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
    </div>
</template>
<style>
    .card .card-content .card-title {
        margin: 15px 0 0px;
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

    export default {
        props: [
            'item'
        ],
        data() {
            return {
                show: false,
                confirmDelete: false,
                quantity: 0,
            }
        },
        methods: {
            showGenerate() {
                this.show = !this.show;
            },
            toggleConfirmDelete: function() {
                this.confirmDelete = !this.confirmDelete;
            },
            generate(id) {
                this.$emit('generate', {'quantity': this.quantity, 'id': id});
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