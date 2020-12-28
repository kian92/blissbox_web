import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';

Vue.component('collapsible', require('../../components/history/Collapsible.vue'))

new Vue({
	el: '#history',
	data() {
		return {
			loading: false,
			items: [],
			giftboxes: [],
		}
	},
	mounted() {
		this.getItems();
	},
	methods: {
		getItems: function() {
			let vm = this;
			vm.loading = true;
			axios.post('/purchase/history')
			.then(function (response) {
				vm.loading = false;
				if (response.data.status === true) {
					vm.items = response.data.result;
				}
			})
			.catch(function (error) {
                // vm.loading = false;
                // var errorMessage = error.response.data;
			    // for (var name in errorMessage) {
			    //     if (errorMessage.hasOwnProperty(name)) {
			    //         toastr.error(errorMessage[name]);
			    //     }
			    // }
			});
		}
	}
})