import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';

Vue.use(VeeValidate);

new Vue({
	el: "#activate",
	data() {
		return {
			loading: false,
			code: '',
			pin: '',
		}
	},
	methods: {
		activateWebVoucher: function() {
			let vm = this;
			vm.loading = true;
			axios.post('/voucher/register', {
				code: vm.code,
				pin: vm.pin
			})
			.then(function (response) {
			    vm.loading = false;
			    if (response.data.status) {
			    	toastr.success("Your voucher has been activated.");
			    	vm.code = '';
			    	vm.pin = '';
			    } else {
			    	toastr.error(response.data.message);
			    }
			})
			.catch(function (error) {
			    vm.loading = false;
                if (error.response.status < 500) {
                    for (var name in error.response.data.errors) {
                        toastr.error(error.response.data.errors[name]);
                    }
                } else {
                    toastr.error(error.response.data.message);
                }
			});
		},
	}
});