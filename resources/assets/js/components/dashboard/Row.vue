<template>
    <tr>
        <td>{{ book.experience.name }}</td>
        <td>{{ book.booking_date }}</td>
        <td>{{ book.booking_time }}</td>
        <td>{{ book.code }}</td>
        <td><template v-if="book.user">{{ book.user.first_name }} {{ book.user.last_name }}</template><template v-else>No Details</template></td>
        <td class="center-align">
            <div class="input-field showPin" v-if="showPin">
                <input type="text" v-model="pin" v-validate="'required'" />
                <button class="btn" v-on:click="redeem(book.experience.id, book.id, book.user_id, book.code)"><i class="material-icons">done</i></button>
            </div>
            <a v-on:click="showRedeem" class="btn waves-effect btn-flat">Redeem</a>
            <a v-on:click="cancellation(book.code)" class="btn waves-effect btn-flat">Revoke</a>
        </td>
    </tr>
</template>
<script>
    import Vue from 'vue';
    import axios from 'axios';
    import VeeValidate from 'vee-validate';
    import toastr from 'toastr';

    Vue.use(VeeValidate);

    export default {
        props: [
            'book'
        ],
        data() {
            return {
                pin: '',
                showPin: false,
            }
        },
        methods: {
            showRedeem: function() {
                this.showPin = !this.showPin;
            },
            redeem: function(experience_id, voucher_id, voucher_user, voucher_code) {
                let vm = this;
                vm.loading = true;

                console.log(voucher_id);

                axios.post('/voucher/dashboard/redeem', {
                    experience_id: experience_id,
                    voucher_id: voucher_id,
                    user_id: voucher_user,
                    code: voucher_code,
                    pin: vm.pin
                })
                    .then(function(response) {
                        vm.loading = false;
                        if (response.data.status) {
                            toastr.success(response.data.message);
                        } else {
                            toastr.error(response.data.message);
                        }
                        vm.$emit('all');
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
                        } else {
                            toastr.error(response.data.message);
                        }
                        vm.$emit('all');
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