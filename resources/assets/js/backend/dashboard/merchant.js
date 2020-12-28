import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import materialize from 'materialize-css';
import lodash from 'lodash';
import toastr from 'toastr';

Vue.component('row', require('../../components/dashboard/Row.vue'));
Vue.use(VeeValidate);

new Vue({
	el: '#dashboard',
	data() {
		return {
			loading: false,
			redeems: [],
			booking: [],
			upcoming: [],
		}
	},
	mounted() {
		this.all();

        $(document).ready(function() {
            $('.collapsible').collapsible();
        });
	},
	methods: {
		all: function() {
			let vm = this;
            axios.get('/dashboard/merchant/all')
			.then(function (response) {
                if (response.data.status) {
                	vm.booking = response.data.booking;
					vm.redeems = response.data.redeemed;
					vm.upcoming = response.data.upcoming;
				} else {
                    if (!response.data.booking) {
                        vm.booking = [];
                    }
                    vm.redeems = response.data.redeemed;
                    vm.upcoming = response.data.upcoming;
                }
			})
			.catch(function (error) {

			})
		},
	}
});