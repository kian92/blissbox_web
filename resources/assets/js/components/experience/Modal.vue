<template>
    <div id="redemption" class="modal">
        <form v-on:submit.prevent="redemption">
            <div class="modal-content">
                <h4 class="center-align">Experience</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col s12">
                                <template v-if="experiences.length > 0">
                                <select id="experience">
                                    <option value="">Choose an Experience to Redeem</option>

                                    <option v-bind:value="experience.id" v-for="experience in experiences">{{
                                    experience.name }}</option>
                                    <label>Experience</label>
                                </select>

                                </template>
                                <template v-else>
                                    <h5 class="center-align">You do not have any experience in this Giftbox</h5>
                                </template>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="waves-effect waves-light btn">Submit</button>
            </div>
        </form>
    </div>
</template>
<style scoped>
    .modal-content {
        min-height: 30rem;
    }
    .dropdown-content {
        max-height: 300px !important;
    }
</style>
<script>
    import Vue from 'vue';
    import axios from 'axios';
    import toastr from 'toastr';

    export default {
        props: [
            'experiences',
            'information'
        ],
        data() {
            return {
                experience_id: ''
            }
        },
        methods: {
            redemption: function() {

                let vm = this;
                vm.loading = true;

                vm.information.experience_id = document.getElementById('experience').value;

                axios.post('/voucher/redeem', vm.information)
                    .then(function(response) {
                        vm.loading = false;
                        if (response.data.status) {
                            toastr.success(response.data.message);
                            $('.modal').modal('close');
                        } else {
                            toastr.error(response.data.message);
                        }
                    })
                    .catch(function(error) {
                        vm.$emit('loading', false);
                        vm.loading = false;
                        if (error.response) {
                            // The request was made and the server responded with a status code
                            // that falls out of the range of 2xx
                            console.log(error.response);
                            if (error.response.status < 500) {
                                for (var name in error.response.data.errors) {
                                    toastr.error(error.response.data.errors[name]);
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
                    });
            }
        }
    }
</script>