import Vue from 'vue';

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

const nav = new Vue({
    el: '#nav',
    store: store,
    data() {
        return {
            status: document.querySelector('meta[name="user-status"]').getAttribute('content'),
        }
    },
});