import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';

Vue.component('card', require('../../components/dashboard/Card.vue'));

new Vue({
	el: '#dashboard',
	data() {
		return {
			giftboxes: [],
			loading: true
		}
	},
	mounted() {
		this.all();
	},
	methods: {
		all: function() {
			let vm = this;
			vm.loading = true;
			axios.get('/dashboard/user')
			.then(function (response) {
				vm.loading = false;
				if (response.data.status) {
					vm.giftboxes = response.data.result;
				}
			})
			.catch(function (error) {
				vm.loading = false;
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
		},
        showPreloader: function(status) {
            this.loading = status;
        },
	}
})