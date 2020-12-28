import 'bootstrap';
import Vue from 'vue';
import axios from 'axios';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';
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

const about = new Vue({
    el: '#app',
    store: store,
    data() {
        return {
            loading: false,
            subscribe: '',
        }
    },
    mounted() {
        $('.about-owl-carousel').owlCarousel({
            lazyLoad: true,
            loop: true,
            margin: 25,
            stagePadding: 150,
            nav: false,
            responsive: {
                320 :{
                    stagePadding: 0,
                    items: 1
                },
                767:{
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
        submitsubscribe: function() {
            let vm = this;
            vm.loading = true;

            if (vm.subscribe) {
                axios.post('/newsletter', {
                    'email': vm.subscribe
                })
                    .then((response) => {
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
                        vm.loading = false;
                    });
            } else {
                vm.loading = false;
                swal("", "Email cannot be empty", "error");
            }
        },
    }
});