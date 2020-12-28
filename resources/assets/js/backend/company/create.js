import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';

const dictionary = {
	en: {
		custom: {

			companyName: {
				required: 'The company name field is required.'
			},

			registrationNo: {
				required: 'The registration number field is required.'
			},

			postalCode: {
				required: 'The postal code field is required.'
			},

			operationTime: {
				required: 'The opening hour field is required.'
			},

			contactName: {
				required: 'The contact name field is required.'
			},

			contactDesignation: {
				required: 'The contact designation field is required.'
			},

			contactMobile: {
				required: 'The contact mobile field is required.'
			},

			contactEmail: {
				required: 'The contact email field is required.',
				email: 'The contact email field must be a valid email.'
			},

			confirmPassword: {
				required: 'The confirm password field is required.',
				min: 'The confirm password field must be at least 6 characters.',
				confirmed: 'The confirm confirmation does not match.'
			},

			accountNo: {
				required: 'The account number field is required.',
			},

			swiftCode: {
				required: 'The SWIFT code field is required.',
			},

			contactEmail: {
				required: 'The contact email field is required.',
				email: 'The contact email field must be a valid email.'
			},
		}
	}
}

VeeValidate.Validator.updateDictionary(dictionary);

Vue.use(VeeValidate);

Vue.component('business-hour', require('../../components/company/Input.vue'));

new Vue({
	el: '#create',
	data() {
		return {
			loading: false,
			days: [
				'Monday', 
				'Tuesday', 
				'Wednesday', 
				'Thursday', 
				'Friday', 
				'Saturday',
				'Sunday',
			],
			create: {
				initial: '',
				companyName: '',
				registrationNo: '',
				natureOfBusiness: '',
				country: '',
				registeredAddress: '',
				postalCode: '',
				website: '',
				businessType: '',
				businessHours: [{
					from: '',
					to: '',
					shiftFrom: '',
					shiftTo: ''
				},
				{
					from: '',
					to: '',
					shiftFrom: '',
					shiftTo: ''
				},
				{
					from: '',
					to: '',
					shiftFrom: '',
					shiftTo: ''
				},
				{
					from: '',
					to: '',
					shiftFrom: '',
					shiftTo: ''
				},
				{
					from: '',
					to: '',
					shiftFrom: '',
					shiftTo: ''
				},
				{
					from: '',
					to: '',
					shiftFrom: '',
					shiftTo: ''
				},
				{
					from: '',
					to: '',
					shiftFrom: '',
					shiftTo: ''
				}],
				title: '',
				firstName: '',
				lastName: '',
				designation: '',
				mobile: '',
				fax: '',
				email: '',
				password: '',
				bank: '',
				branch: '',
				accountNo: '',
				swiftCode: '',
				paypal: '',
				other: ''
			},
			checked: true,
			shiftChecked: false,
			showInput: true,
			showShift: false,
			businessType: 'hour'
		}
	},
	methods: {
		store: function() {

			let vm = this;
			vm.loading = true;

			axios.defaults.headers.common['X-CSRF-TOKEN'] = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content');

            vm.create.title = document.getElementById('title').value;
            vm.create.natureOfBusiness = document.getElementById('natureOfBusiness').value;
            vm.create.country = document.getElementById('country').value;
            vm.create.businessType = vm.businessType;

    		axios.post('/company/create', vm.create)
            .then(function (response) {
            	vm.loading = false;
            	
                if (response.data.status === true) {
                    toastr.success('Company created.');
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
                console.log(error.config);
            });
		},
	}
});