import 'bootstrap';
import Vue from 'vue';
import VeeValidate from 'vee-validate';

import { store } from '../bus.js';

const dictionary = {
	en: {
		custom: {

			firstName: {
				required: 'The first name field is required.'
			},

			lastName: {
				required: 'The last name field is required.'
			},

			confirmPassword: {
				required: 'The confirm password field is required.',
				min: 'The confirm password field must be at least 6 characters.',
				confirmed: 'The confirm confirmation does not match.'
			},

            postalCode: {
                required: 'The postal code field is required.'
            },

		}
	}
}

// Update VeeValidate dictionary
VeeValidate.Validator.updateDictionary(dictionary);

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
        count: function() {
            return this.$store.state.count;
        }
    },
});

const app = new Vue({
    data() {
        return {
            loading: false
        }
    },
	store: store
}).$mount('#app');