import 'bootstrap';
import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import { store } from './bus.js';

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
        count() {
            return this.$store.state.count;
        }
    },
});

const delivery = new Vue({
    el: '#app',
    store: store,
    data() {
        return {
            loading: false,
            different: true,
            serverside_errors: [],
            deliveryMethod: false,
            billing: {
                first_name: '',
                last_name: '',
                email: '',
                contact: '',
                postal: '',
                address: '',
                city: '',
                country: ''
            },
            shipping: {
                first_name: '',
                last_name: '',
                postal: '',
                address: '',
                city: '',
                country: ''
            },
        }
    },
    mounted() {
        this.fetchAddress();
    },
    computed: {
        count() {
            return this.$store.state.count;
        }
    },
    methods: {
        fetchAddress() {
            this.loading = true;
            axios.get('/billinginformation/fetch')
                .then(({data}) => {
                    this.loading = false;
                    if (data.status) {
                        this.billing.first_name = data.user['first_name'];
                        this.billing.last_name = data.user['last_name'];
                        this.billing.email = data.user['email'];
                        this.billing.contact = data.user['phone'];
                        this.billing.postal = data.result['billing_postal'];
                        this.billing.address = data.result['billing_address'];
                        this.billing.city = data.result['billing_city'];
                        this.billing.country = data.result['billing_state'];

                        this.deliveryMethod = data.found;

                        if (this.deliveryMethod === false) {
                            this.different = false;
                        }
                    } else {
                        this.deliveryMethod = data.found;

                        if (this.deliveryMethod === false) {
                            this.different = false;
                        }
                    }
                })
                .catch((error) => {
                    this.loading = false;
                });
        },
        differentAddress() {
            this.different = !this.different;
        },
        onSubmit() {
            this.loading = true;

            let url = new URL(window.location.href);

            axios.post('/billing/store', {
                'billing': this.billing,
                'different': this.different,
                'shipping': this.shipping,
                'id': (url.pathname.split('/'))[2]
            })
            .then((response) => {
                this.loading = false;

                if (response.data.status) {
                    window.location = '/checkout/payment/' + response.data.id
                } else {
                    console.log("Error");
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
                }
            });
        },
        refreshCart() {
            this.$store.dispatch('refreshCart').then(() => {
            });
        }
    },
});