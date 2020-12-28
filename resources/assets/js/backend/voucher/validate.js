import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';
import materialize from 'materialize-css';

Vue.use(VeeValidate);

Vue.component('experience', require('../../components/experience/Modal.vue'));

new Vue({
	el: '#validate',
	data() {
		return {
			loading: false,
			code: '',
			pin: '',
			information: '',
			experiences: []
		}
	},
	mounted() {

	},
	methods: {
		checkVoucher: function() {
			let vm = this;
			vm.loading = true;

			vm.information = '';

			axios.post('/voucher/validate', {
				code: vm.code,
				pin: vm.pin
			})
			.then(function (response) {
				vm.loading = false;
				if (response.data.status) {

				    vm.fetchExperience();
					vm.information = response.data.result;

                    switch(vm.information.status) {
                        case 3:
                            vm.information.status = "Ready to use";
                            break;
                        default:
                            vm.information.status = 'Booked an Experience';
                            break;
                    }
				} else {
					toastr.error("This voucher is not valid");
				}
			})
			.catch(function (error) {
                vm.loading = false;
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
			});
		},
		redemption: function() {
            $('#redemption').modal('open');
        },
        fetchExperience: function() {
            let vm = this;
            vm.loading = true;

            axios.get('/experience/fetch/validate/' + vm.code)
                .then(function(response) {
                    vm.loading = false;
                    if (response.data.status) {
                        vm.experiences = response.data.result;
                        vm.$nextTick(function() {
                            $('select').material_select();
                        });
                    }
                })
                .catch(function(error) {
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
	}
});