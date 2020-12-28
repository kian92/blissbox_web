import 'bootstrap';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';
import Vue from 'vue';
import axios from 'axios';
import swal from 'sweetalert2';
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

const universe = new Vue({
    el: '#app',
    store: store,
    data() {
        return {
            loading: false,
            universe: [],
            giftboxes: [],
            experiences: [],
            total_review: [],
            total_user: [],
            modal: {
                thumbnail: '',
                name: '',
                information: '',
                giftboxes: ''
            },
            subscribe: '',
            status: document.querySelector('meta[name="user-status"]').getAttribute('content'),
        }
    },
    computed: {
        count: function() {
            return this.$store.state.count;
        }
    },
    mounted() {
        this.fetch();

        $('.universe-owl-carousel').owlCarousel({
            lazyLoad: true,
            loop: true,
            margin: 25,
            nav: false,
            responsive: {
                500 :{
                    margin: 20,
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
    },
    methods: {
        fetch: function() {
            let url = new URL(window.location.href);
            this.loading = true;

            axios.get('/universe/' + (url.pathname.split('/'))[1])
                .then(response => {
                    this.loading = false;

                    if (response.data.status) {
                        this.universe = response.data.universe;
                        this.giftboxes = response.data.giftboxes;
                        this.experiences = response.data.experiences;
                        this.giftbox_experience = response.data.giftbox_experience;
                        this.total_review = response.data.total_review;
                        this.total_user = response.data.total_user;
                    } else {
                        this.universe = response.data.universe;
                        this.experiences = response.data.experiences;
                        this.giftbox_experience = response.data.giftbox_experience;
                        this.total_review = response.data.total_review;
                        this.total_user = response.data.total_user;
                    }

                    Vue.nextTick(function () {
                        $('.giftboxes-owl-carousel').owlCarousel({
                            margin: 25,
                            autoplay: true,
                            nav: false,
                            responsive:{
                                320: {
                                    items: 1
                                },
                                420 :{
                                    items: 1
                                },
                                550: {
                                    items: 2
                                },
                                767 :{
                                    items: 2
                                },
                                997 :{
                                    items: 3
                                },
                                1200: {
                                    items: 4
                                }
                            }
                        });

                        $('.experiences-owl-carousel').owlCarousel({
                            lazyLoad: true,
                            margin: 10,
                            nav: true,
                            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                            autoplay: true,
                            loop: true,
                            responsive: {
                                320 :{
                                    items: 1
                                },
                                550: {
                                    items: 2
                                },
                                767:{
                                    items: 2
                                },
                                997:{
                                    items: 3
                                },
                                1200: {
                                    items: 3
                                },
                                1366: {
                                    margin: 25,
                                    items: 4
                                },
                                1920: {
                                    margin: 100,
                                    items: 4
                                }
                            }
                        });
                    });
                })
                .catch(error => {
                    this.loading = false;
                });
        },
        showModal: function(thumbnail, name, information, giftboxes) {
            this.modal.thumbnail = thumbnail;
            this.modal.name = name;

            information = (information.replace(/;\s*$/, "")).split(";");
            this.modal.information = information;
            this.modal.giftboxes = giftboxes;

            $('#experienceModal').modal('show');
        },
        addToCart: function (thumbnail, name, id, price) {
            let vm = this;
            vm.loading = true;

            if (!this.status) {
                let vm = this;
                vm.loading = true;

                axios.post('/cart/session', {
                    thumbnail: thumbnail,
                    id: id,
                    name: name,
                    quantity: 1,
                    price: price
                })
                    .then(function (response) {
                        vm.loading = false;
                        if (response.data.status) {
                            vm.refreshCart();

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
                                    window.location = "/cart";
                                }
                            });
                        } else {
                            swal("", response.data.message, "error");
                        }
                    })
                    .catch(function (error) {
                        vm.loading = false;
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
                    .then(function (response) {
                        vm.loading = false;
                        if (response.data.status) {
                            vm.refreshCart();
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
                    .catch(function (error) {
                        vm.loading = false;
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
                    });
            }
        },
        submitsubscribe: function() {
            let vm = this;
            vm.loading = true;

            if (vm.subscribe) {
                axios.post('/newsletter', {
                    'email': vm.subscribe
                })
                    .then(function(response) {
                        vm.loading = false;
                        if (response.data.status) {
                            swal("", response.data.message, "success");
                            $('.modal').modal('close');
                            vm.subscribe = '';
                        } else {
                            swal("", response.data.message, "error");
                        }
                    })
                    .catch(function(error) {
                    });
            } else {
                vm.loading = false;
                swal("", "Email cannot be empty", "error");
            }
        },
        refreshCart() {
            this.$store.dispatch('refreshCart').then(() => {
            });
        }
    }
});