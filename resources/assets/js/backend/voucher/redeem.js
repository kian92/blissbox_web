import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';

Vue.use(VeeValidate);

new Vue({
	el: '#redeem',
	data() {
		return {
			loading: false,
			code: '',
			pin: '',
		}
	},
	methods: {
		redeemVoucher: function() {
			let vm = this;
			vm.loading = true;
			axios.post('/voucher/redeem', {
				code: vm.code,
				pin: vm.pin
			})
			.then(function (response) {
				vm.loading = false;
				if (response.data.status) {
					toastr.success("This voucher is belonging to <Who>");
				} else {
					toastr.error("This voucher is not valid");
				}
			})
			.catch(function (error) {
				vm.loading = false;
				if (error.response.status == 500) {
			        toastr.error(error.response.statusText);
			    } else if (error.response.status == 422) {
			        var errorMessage = error.response.data;
			        for (var name in errorMessage) {
			            if (errorMessage.hasOwnProperty(name)) {
			                toastr.error(errorMessage[name]);
			            }
			        }
			    }
			});
		}
	}
})