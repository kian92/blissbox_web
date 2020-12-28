import 'bootstrap';
import Vue from 'vue';
import axios from 'axios';
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

Vue.component('cart-item', require('../components/cart/Cart.vue'));

const cart = new Vue({
    el: '#app',
    store: store,
    data() {
        return {
            loading: false,
            check: '',
            giftbox_types: [],
            purchase: {
                items: [],
                couponCode: '',
                total: []
            },
            deliveryCharge: 0,
            couponType: 0,
            discount: 0,
            status: document.querySelector('meta[name="user-status"]').getAttribute('content'),
        }
    },
    mounted() {
        this.refreshCart();
        this.all();
    },
    computed: {
        subtotal() {
            var sum = 0.0;
            if (this.giftbox_types.length > 0) {
                this.giftbox_types.forEach((element) => {
                    sum += element.price * element.totalItem;
                })
            }
            return (sum / 100).toFixed(2);
        },
        grandTotal() {
            var grand = parseFloat(this.subtotal);

            if (this.deliveryCharge != 0) {
                grand += parseFloat(this.deliveryCharge);
            } else {
                grand += 0.0;
            }

            if (this.couponType != 0) {
                if (this.couponType == 1) {
                    grand = grand * (100 - this.discount) / 100;
                } else {
                    grand = grand - this.discount;
                }
            }

            return grand.toFixed(2);
        },
    },
    methods: {
        all: function () {
            if (!this.status) {
                axios.get('/cart/session/all')
                    .then(({data}) => {
                        if (data.status) {
                            this.giftbox_types = data.item_type;
                            this.purchase.items = data.items;

                            if (this.purchase.items.length > 0) {
                                let found = false;
                                this.purchase.items.forEach((innerElement) => {
                                    if (innerElement.package === 'blissbox') {
                                        found = true;
                                    }
                                });

                                if (found) {
                                    this.deliveryCharge = 7;
                                } else {
                                    this.deliveryCharge = 0;
                                }

                                this.loading = false;
                                this.refreshCart();
                            }
                        } else {
                            this.giftbox_types = [];
                            this.purchase.items = [];
                            this.deliveryCharge = 0;
                            this.refreshCart();

                            this.loading = false;
                        }
                    })
                    .catch((error) => {
                        this.loading = false;

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
            } else {
                axios.get('/cart/all')
                    .then(({data}) => {
                        this.loading = false;
                        if (data.status) {
                            this.giftbox_types = data.item_type;
                            this.purchase.items = data.items;
                            this.purchase.total = data.total;

                            if (this.purchase.items.length > 0) {
                                let found = false;
                                this.purchase.items.forEach((innerElement) => {
                                    if (innerElement.package === 'blissbox') {
                                        found = true;
                                    }
                                });

                                if (found) {
                                    this.deliveryCharge = 7;
                                } else {
                                    this.deliveryCharge = 0;
                                }
                            }

                            this.refreshCart();

                        } else {
                            this.giftbox_types = [];
                            this.purchase.items = [];
                            this.deliveryCharge = 0;
                            this.refreshCart();
                        }
                    })
                    .catch((error) => {
                        this.loading = false;
                        console.log("Logged In, Error");
                    });

            }
        },
        coupon: function(value) {
            this.loading = true;

            // Fetch Coupon From Database
            if (this.purchase.couponCode) {
                axios.post('/coupon/apply', {
                    coupon: this.purchase.couponCode
                })
                    .then(({data}) => {
                        this.loading = false;
                        if (data.status) {
                            swal("", "Promo Code has been applied", "success");
                            this.couponType = data.result[0]['type_id'];
                            this.discount = data.result[0]['value'];
                        } else {
                            this.couponType = 2;
                            this.discount = 0;
                            swal("", data.message, "error");
                        }
                    })
                    .catch((error) => {
                        this.loading = false;
                    });
            } else {
                this.loading = false;
                this.discount = 0;
            }
            // If Valid Then Apply The Promotion
            // Update The Price
        },
        order: function() {
            this.loading = true;

            if (!this.status) {
                if (this.purchase.packages) {
                    axios.post('/cart/session/package', this.purchase.packages)
                        .then((response) => {
                            this.loading = false;
                        })
                    // Loop all the cart item
                    // Check if Recipient is NULL
                    // Check if Gift Message is NULL
                }
                window.location = '/login';
            } else {
                axios.post('/order/store', {
                    item: this.purchase,
                    total: this.grandTotal
                })
                    .then(({data}) => {
                        this.loading = false;
                        if (data.status) {
                            window.location = '/delivery/' + data.id
                        }
                    })
                    .catch((error) =>  {
                        this.loading = false;
                        if (error.response) {
                            // The request was made and the server responded with a status code
                            // that falls out of the range of 2xx
                            console.log(error.response);
                            if (error.response.status < 500) {
                                for (var name in error.data.errors) {
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
            }
        },
        showPreloader: function(status) {
            this.loading = status;
        },
        refreshCart() {
            this.$store.dispatch('refreshCart').then(() => {
            });
        },
    }
});