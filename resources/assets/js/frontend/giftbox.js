import 'bootstrap';
import Vue from 'vue';
import axios from 'axios';
import toastr from 'toastr';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';
import swal from 'sweetalert2';

import { store } from './bus.js';

Vue.component('cart-count', {
    template: `<span class="badge badge-secondary" v-cloak>{{ count }}</span>`,
    computed: {
        count: function() {
            return this.$store.state.count;
        }
    },
});

const giftbox = new Vue({
    // el: '#giftbox-detail',
    el: '#app',
    store: store,
    data() {
        return {
            loading: false,
            item: [],
            recommendedItems: [],
            status: document.querySelector('meta[name="user-status"]').getAttribute('content'),
            type: document.querySelector('meta[name="user-type"]').getAttribute('content'),
            wishlist: false,
            total_review: 0,
            total_user: 0,
        }
    },
    mounted() {
        this.all();
        this.refreshCart();
    },
    computed: {
        count: function() {
            return this.$store.state.count;
        }
    },
    methods: {
        all() {
            this.loading = true;
            let url = new URL(window.location.href);
            axios.get('/giftbox/' + (url.pathname.split('/'))[3])
                .then((response) => {
                    this.loading = false;
                    this.item = response.data.giftbox;
                    this.recommendedItems = response.data.recommended;
                    this.total_review = response.data.total_review;
                    this.total_user = response.data.total_user;

                    this.wishlist = response.data.wishlist;

                    Vue.nextTick(function () {
                        $('.universe-owl-carousel').owlCarousel({
                            margin: 25,
                            nav: false,
                            loop: true,
                            responsive: {
                                320: {
                                    items: 1
                                },
                                767: {
                                    stagePadding: 100,
                                    items: 2
                                },
                                997: {
                                    items: 2
                                },
                                1200: {
                                    margin: 200,
                                    items: 3
                                }
                            }
                        });
                    });
                })
                .catch((error) => {
                    console.log(error);
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
        addWishlist(id) {
            this.loading = true;

            if (this.status) {
                axios.post('/wishlist/store', {
                    id: id
                }).then((response) => {
                    this.loading = false;
                    if (response.data.status) {
                        swal("", response.data.message, "success");
                    } else {
                        swal("", response.data.message, "error");
                    }
                    this.all();
                }).catch((error) => {
                    this.loading = false;
                });
            } else {
                this.loading = false;
                window.location = '/login';
            }
        },
        removeWishlist(id) {
            this.loading = true;

            if (this.status) {
                axios.post('/wishlist/destroy', {
                    id: id
                }).then((response) => {
                    this.loading = false;
                    if (response.data.status) {
                        swal("", response.data.message, "success");
                    } else {
                        swal("", response.data.message, "error");
                    }
                    this.all();
                }).catch((error) => {
                    this.loading = false;
                });
            } else {
                this.loading = false;
                swal("", "Please login before perform this action", "error");
            }
        },
        review(id, rate) {
            this.loading = true;

            if (this.status) {
                axios.post('/review/store', {
                    id: id,
                    rate: rate
                }).then((response) => {
                    this.loading = false;

                    if (response.data.status) {
                        swal("", response.data.message, "success");
                    } else {
                        swal("", response.data.message, "error");
                    }
                    this.all();
                }).catch((error) => {
                    this.loading = false;
                });
            } else {
                this.loading = false;
                swal("", "Please login before perform this action", "error");
            }
        },
        shareSocial() {
            this.share = !this.share;
        },
        showPreloader(status) {
            this.loading = status;
        },
        refreshCart() {
            this.$store.dispatch('refreshCart').then(() => {
            });
        }
    }
});