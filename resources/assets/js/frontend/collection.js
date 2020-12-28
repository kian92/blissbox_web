import 'bootstrap';
import Vue from 'vue';
import Axios from 'axios';
import swal from "sweetalert2";
import axios from "axios/index";
import { store } from './bus.js';
import toastr from "toastr";

Vue.component('cart-count', {
    template: `<span class="badge badge-secondary" v-cloak>{{ count }}</span>`,
    computed: {
        count: function() {
            return this.$store.state.count;
        }
    },
});

new Vue({
    el: '#collection',
    data() {
        return {
            items: [],
        }
    },
    store: store,
    mounted() {
        this.all();
    },
    methods: {
        all() {
            this.loading = true;

            axios.get('/all')
                .then((response) => {
                    this.loading = false;
                    if (response.data.status) {
                        this.items = response.data.giftboxes;
                    } else {

                    }
                })
                .catch((error) => {
                   this.loading = false;
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
                            console.log(error.config);
                });
        },
        addToCart(thumbnail, name, id, price) {
        this.loading = true;

        if (!this.status) {
            this.loading = true;

            axios.post('/cart/session', {
                thumbnail: thumbnail,
                id: id,
                name: name,
                quantity: 1,
                price: price
            })
                .then((response) => {
                    this.loading = false;
                    if (response.data.status) {
                        this.refreshCart();
                        swal({
                            title: 'Item added into cart',
                            text: "Please choose your options",
                            type: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Go to cart',
                            cancelButtonText: 'Continue Shopping'
                        }).then(function (result) {
                            if (result) {
                                window.location = "/cart";
                            }
                        });
                    } else {
                        swal("", response.data.message, "error");
                    }
                })
                .catch((error) => {
                    this.loading = false;
                    if (error.response) {
                        // The request was made and the server responded with a status code
                        // that falls out of the range of 2xx
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
                    console.log(error.config);
                });
        } else {
            axios.post('/cart', {
                id: id,
                name: name,
                price: price
            })
                .then((response) => {
                    this.loading = false;
                    if (response.data.status) {
                        this.refreshCart();
                        swal({
                            title: 'Item added into cart',
                            text: "Please choose your options",
                            type: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Go to cart',
                            cancelButtonText: 'Continue Shopping'
                        }).then(function (result) {
                            if (result) {
                                console.log("asda");
                                window.location = "/cart";
                            }
                        });
                    } else {
                        swal("", response.data.message, "error");
                    }
                })
                .catch((error) => {
                    this.loading = false;
                    if (error.response) {
                        // The request was made and the server responded with a status code
                        // that falls out of the range of 2xx
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
        },
        refreshCart() {
            this.$store.dispatch('refreshCart').then(() => {
            });
        }
    },
});