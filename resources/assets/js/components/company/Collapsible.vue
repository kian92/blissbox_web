<template scope="collapsible">
    <li :company="company">
        <div class="collapsible-header">{{ company.name}}</div>
        <div class="collapsible-body">
            <table class="striped">
                <tr>
                    <td>Company Website</td>
                    <td>{{ company.website }}</td>
                </tr>
                <tr>
                    <td>Company Address</td>
                    <td>{{ company.registered_address }}, Singapore {{ company.postal_code }}</td>
                </tr>
            </table>
            <div class="row">

            </div>
            <div class="row" v-for="user in company.users">
                <div class="col s12">
                    {{ user.first_name }} {{ user.last_name }}
                </div>
                <div class="col s12" v-if="user.email">
                    {{ user.email }}
                </div>
                <div class="col s12" v-if="user.phone">
                    {{ user.phone }}
                </div>
            </div>
        </div>
    </li>
</template>
<script>
    import Vue from 'vue';
    import axios from 'axios';

    export default {
        props: [
            'company'
        ],
        data() {
            return {
                payment: [],
                user: []
            }
        },
        mounted() {
            this.showPayment();
            this.showUser();
        },
        methods: {
            showPayment: function() {
                let vm = this;
                vm.loading = true;

                axios.get('/payment/fetch/' + vm.company.id)
                    .then(function(response) {
                        vm.loading = false;
                        if (response.data.status) {
                            vm.payment = response.data.payment;
                        }
                    })
                    .catch(function(error) {
                        vm.loading = false;
                        if (error.response) {
                            // The request was made and the server responded with a status code
                            // that falls out of the range of 2xx
                            console.log(error.response.data);
                            console.log(error.response.status);
                            console.log(error.response.headers);
                        } else if (error.request) {
                            // The request was made but no response was received
                            // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                            // http.ClientRequest in node.js
                            console.log(error.request);
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            console.log('Error', error.message);
                        }
                        console.log(error.config);
                    });
            },
            showUser: function() {
                let vm = this;
                vm.loading = true;

                axios.get('/user/fetch/' + vm.company.user_id)
                    .then(function(response) {
                        vm.loading = false;
                        if (response.data.status) {
                            vm.user = response.data.user;
                        }
                    })
                    .catch(function(error) {
                        vm.loading = false;
                        if (error.response) {
                            // The request was made and the server responded with a status code
                            // that falls out of the range of 2xx
                            console.log(error.response.data);
                            console.log(error.response.status);
                            console.log(error.response.headers);
                        } else if (error.request) {
                            // The request was made but no response was received
                            // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                            // http.ClientRequest in node.js
                            console.log(error.request);
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            console.log('Error', error.message);
                        }
                        console.log(error.config);
                    });
            }
        }
    }
</script>