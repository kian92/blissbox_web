import 'bootstrap';
import Vue from 'vue';
import Axios from 'axios';
import swal from "sweetalert2";
import axios from "axios/index";
import { store } from './bus.js';

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
        count: function() {
            return this.$store.state.count;
        }
    },
});

new Vue({
    el: '#experiences',
    store: store,
    data() {
        return {
            loading: false,
            search: '',
            items: [],
            info: [],
            status: document.querySelector('meta[name="user-status"]').getAttribute('content'),
        }
    },
    mounted() {
        this.all();
    },
    computed: {
        filteredList() {
            return this.items.filter(post => {
                return post.name.toLowerCase().includes(this.search.toLowerCase())
            })
        },
        count() {
            return this.$store.state.count;
        }
    },
    methods: {
        all() {
            this.loading = true;

            let url = new URL(window.location.href);

            Axios.get('/experience/giftbox/' + (url.pathname.split('/'))[4])
                .then(({data}) => {
                    this.loading = false;
                    if (data.status) {
                        this.items = data.experiences;
                        this.info = data.info;
                    }
                })
                .catch((error) => {
                    this.loading = false;
                    if (error.response) {
                        // The request was made and the server responded with a status code
                        // that falls out of the range of 2xx
                        console.log(error.response);
                        if (error.response.status < 500) {
                        } else {
                        }
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
        addToCart(thumbnail, name, id, price) {

            console.log(name);

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
                                cancelButtonText: 'Continue shopping'
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
                                }
                            } else {
                            }
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
                            }).then((result) => {
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
                            } else {
                            }
                        } else if (error.request) {
                            // The request was made but no response was received
                            // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                            // http.ClientRequest in node.js
                            console.log(error.request);
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            console.log('Error', error.message);
                        }
                    });
            }
        },

        refreshCart() {
            this.$store.dispatch('refreshCart').then(() => {
            });
        }
    }
})