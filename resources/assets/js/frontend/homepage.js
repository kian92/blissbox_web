import 'bootstrap';
import Vue from 'vue';
import owlCarousel from 'owl.carousel';
import axios from 'axios';
import swal from 'sweetalert2';
import { store } from './bus.js';

Vue.component('cart-count', {
    template: `<span class="badge badge-secondary" v-cloak>{{ count }}</span>`,
    computed: {
        count() {
            return this.$store.state.count;
        }
    },
});

const universes = new Vue({
    el: '#app',
    store: store,
    data() {
        return {
            loading: false,
            search: {
                universe: 'Any',
                keyword: '',
                no: 1,
            },
            feeds: [],
            subscribe: '',
            message: 'Loading resources ...',
        }
    },
    mounted() {
        this.refreshCart();
        this.instagram();
        if(localStorage.getItem('popState') != 'shown'){
            $('#newsletterModal').modal('show');
            localStorage.setItem('popState','shown')
        }
        $('.multitheme-owl-carousel').owlCarousel({
            lazyLoad: true,
            loop: true,
            margin: 25,
            nav: false,
            responsive: {
                320 :{
                    items: 1
                },
                767:{
                    stagePadding: 100,
                    items: 2
                },
                997:{
                    items: 2
                },
                1200:{
                    items: 3
                }
            }
        });
        $('.carousel').carousel({
            interval: 3000
        })
    },
    methods: {
        submitsubscribe() {
            this.loading = true;

            if(this.subscribe) {
                axios.post('/newsletter', {
                    'email': this.subscribe
                })
                    .then(({data}) => {
                        this.loading = false;
                        if (data.status) {
                            swal("", data.message, "success");
                            $('.modal').modal('close');
                            this.subscribe = '';
                        } else {
                            swal("", data.message, "error");
                        }
                    })
                    .catch(function(error) {
                    });
            } else {
                this.loading = false;
                swal("", "Email cannot be empty", "error");
            }
        },
        instagram() {
            axios.get('/instagram/feeds')
                .then(({data}) => {
                    if (data.status) {
                        this.feeds = data.result
                    }
                })
                .catch(function(error) {
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
        refreshCart() {
            this.$store.dispatch('refreshCart').then(() => {
            });
        }
    }
});