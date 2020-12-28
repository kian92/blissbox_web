<template>
    <div class="row">
        <div class="col s12">
            <div class="card blue-grey darken-1" v-bind:class="{'bg-danger': expire}">
                <div class="card-content white-text">
                    <span class="card-title"></span>
                    <div class="row">
                        <div class="col s12 m6">
                            <span>Reservation Date</span>
                            <h5>{{ item.booking_date }}</h5>
                        </div>
                        <div class="col s12 m6">
                            <span>Reservation Time</span>
                            <h5>{{ item.booking_time }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" v-if="item.experience">
                            Experience Name: <br/>
                            {{ item.experience['name'] }}
                        </div>
                    </div>
                    <div class="row" v-if="item.user && item.user['last_name'] && item.user['first_name']">
                        <div class="col s12">
                            Name: <br/>
                            {{ item.user['last_name'] }} {{ item.user['first_name'] }}
                        </div>
                    </div>
                    <div class="row" v-if="item.user && item.user['phone']">
                        <div class="col s12">
                            Phone: <br/>
                            {{ item.user['phone'] }}
                        </div>
                    </div>
                    <div class="row" v-if="item.user && item.user['email']">
                        <div class="col s12">
                            Email: <br/>
                            {{ item.user['email'] }}
                        </div>
                    </div>
                </div>
                <div class="card-action right-align" v-if="showPin">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="pin" v-validate="'required|numeric'" maxlength="6" v-model="pin">
                            <label for="pin">Voucher Pin</label>
                        </div>
                    </div>
                    <a v-on:click="redeem()" class="btn waves-effect btn-flat">Redeem</a>
                    <a v-on:click="inputPin()" class="btn waves-effect btn-flat">Close</a>
                </div>
                <div class="card-action right-align" v-else>
                    <a v-if="showPin == false" v-on:click="inputPin()" class="btn waves-effect btn-flat">Redeem</a>
                    <a v-on:click="cancellation(item.code)" class="btn waves-effect btn-flat">Revoke</a>
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
    import VeeValidate from 'vee-validate';
    import moment from 'moment';
    import toastr from 'toastr';

    Vue.use(VeeValidate);

    export default {
        props: [
            'item',
            'id'
        ],
        data() {
            return {
                expire: false,
                showPin: false,
                pin: '',
            }
        },
        mounted() {
//            var hashids = new Hashids();
//            this.item.code = hashids.encode(this.item.code);
            let now = moment().format('Y-m-d H:i:s');

            if (now <= this.item.expiration_at) {
                this.expire = true;
            }

            this.$emit('initial');
        },
        methods: {
            redeem: function() {
                let vm = this;
                vm.loading = true;
                vm.item.pin = vm.pin;
                axios.post('/voucher/redeem', vm.item)
                    .then(function(response) {
                        vm.loading = false;
                        vm.loading = false;
                        if (response.data.status) {
                            vm.$emit('all');
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
            },
            inputPin: function() {
                this.showPin = !this.showPin;
            }
        }
    }

</script>