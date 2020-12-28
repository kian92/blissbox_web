import 'bootstrap';
import Vue from 'vue';
import VeeValidate from 'vee-validate';
import axios from 'axios';
import swal from 'sweetalert2';
import {store} from './bus.js';

Vue.use(VeeValidate);

Vue.component('cart-count', {
    template: `<span class="badge badge-secondary" v-cloak>{{ count }}</span>`,
    methods: {
        refreshCart() {
            this.$store.dispatch('refreshCart').then(() => {
            });
        }
    },
    mounted() {
        this.refreshCart();
    },
    computed: {
        count: function () {
            return this.$store.state.count;
        }
    },
});

const payment = new Vue({
    el: "#app",
    store: store,
    data() {
        return {
            loading: false,
            card: {
                name: '',
                number: '',
                month: '',
                year: '',
                cvc: ''
            },
            id: '',
            serverside_errors: [],
            loadingMessage: 'Loading ...'
        }
    },
    computed: {
        count: function() {
            return this.$store.state.count;
        }
    },
    methods: {
        onSubmit() {
            let url = new URL(window.location.href);
            this.loading = true;

            this.loadingMessage = "Processing Payment ...";

            axios.post('/purchase', {
                card: this.card,
                id: (url.pathname.split('/'))[3]
            })
                .then((response) => {
                    if (response.data.status) {
                        this.loadingMessage = "Generating Voucher ...";
                        axios.post('/voucher/send', {
                            id: (url.pathname.split('/'))[3]
                        })
                            .then((response) => {
                                if (response.data.status) {
                                    this.refreshCart();
                                    this.loading = false;
                                    swal({
                                        title: "",
                                        text: response.data.message,
                                        type: "success",
                                        timer: 3000,
                                        onOpen: function () {
                                            swal.showLoading()
                                        }
                                    }).then(
                                        function () {
                                            this.refreshCart();
                                        },
                                        function (dismiss) {
                                            if (dismiss === 'timer') {
                                                window.location = '/checkout/success/';
                                            }
                                        }
                                    )
                                } else {
                                    swal("", response.data.message, "error");
                                }
                            })
                            .catch((error) => {
                                this.loading = false;
                                swal("", response.data.message, "error");
                                console.log(error.config);
                            });
                    }
                })
                .catch((error) => {
                    this.loading = false;
                    this.serverside_errors = [];
                    if (error.response.status === 422) {
                        for (let key in error.response.data.errors) {
                            if (error.response.data.errors.hasOwnProperty(key)) {
                                console.log(error.response.data.errors[key][0]);
                                this.serverside_errors.push(error.response.data.errors[key][0]);
                            }
                        }
                        window.scrollTo(0, 300);
                    } else {
                        swal("", error.response.data.message, "error");
                    }

                });
        },
        refreshCart() {
            this.$store.dispatch('refreshCart').then(() => {
            });
        }
    }
});