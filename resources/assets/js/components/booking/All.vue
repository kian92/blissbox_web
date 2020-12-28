<template>
    <div class="row">
        <div class="col s12">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"></span>
                    <div class="row">
                        <div class="col s12 m6">
                            <span>Reservation Date</span>
                            <h5>{{ info['booking_date'] }}</h5>
                        </div>
                        <div class="col s12 m6">
                            <span>Reservation Time</span>
                            <h5>{{ info['booking_time'] }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            Experience Name: <br/>
                            {{ info.name }}
                        </div>
                    </div>
                    <!--<div class="row" v-if="info.last_name && info.first_name">-->
                        <!--<div class="col s12">-->
                            <!--Name: <br/>-->
                            <!--{{ info.last_name }} {{ info.first_name }}-->
                        <!--</div>-->
                    <!--</div>-->

                    <div class="row" v-if="info.phone">
                        <div class="col s12">
                            Phone: <br/>
                            {{ info.phone }}
                        </div>
                    </div>
                    <div class="row" v-if="info.email">
                        <div class="col s12">
                            Email: <br/>
                            {{ info.email }}
                        </div>
                    </div>
                </div>
                <div class="card-action right-align">
                    <a v-on:click="redeem()" class="btn waves-effect btn-flat">Redeem</a>
                    <a v-on:click="cancellation(info.code)" class="btn waves-effect btn-flat">Revoke</a>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>

</style>
<script>
    import Vue from 'vue';
    import axios from 'axios';
    import materialize from 'materialize-css';
    import toastr from 'toastr';

    export default {
        props: [
            'info',
            'id'
        ],
        mounted() {
//            var hashids = new Hashids();
//            this.item.code = hashids.encode(this.item.code);
            this.$emit('initial');
        },
        methods: {
            redeem: function() {
                let vm = this;
                vm.loading = true;
                axios.post('/voucher/redeem', vm.info)
                    .then(function(response) {
                        vm.loading = false;
                        vm.loading = false;
                        if (response.data.status) {
                            toastr.success(response.data.message);
                        } else {
                            toastr.error(response.data.message);
                        }
                    })
                    .catch(function(error) {
                        vm.loading = false;
                        if (error.response) {
                            // The request was made and the server responded with a status code
                            // that falls out of the range of 2xx
                            var errorMessage = error.response.data;
                            for (var name in errorMessage) {
                                if (errorMessage.hasOwnProperty(name)) {
                                    toastr.error(errorMessage[name]);
                                }
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
            },
            cancellation: function(id) {
                let vm = this;
                vm.loading = true;
                axios.post('/voucher/cancellation', {
                    code: id
                })
                    .then(function(response) {
                        vm.loading = false;
                        if (response.data.status) {
                            toastr.success(response.data.message);
                            vm.$emit('all');
                        } else {
                            toastr.error(response.data.message);
                        }
                    })
                    .catch(function(error) {
                        vm.loading = false;
                        if (error.response) {
                            // The request was made and the server responded with a status code
                            // that falls out of the range of 2xx
                            var errorMessage = error.response.data;
                            for (var name in errorMessage) {
                                if (errorMessage.hasOwnProperty(name)) {
                                    toastr.error(errorMessage[name]);
                                }
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