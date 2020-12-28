import 'materialize-css/dist/js/materialize.min.js'
import Vue from 'vue';
import axios from 'axios';
import toastr from 'toastr';

Vue.component('experience', require('../../components/experience/Experience.vue'));

new Vue({
	el: '#create',
	mounted() {
        this.getUniverses();
        this.getCompanies();
        $('#universe').on('change', (e) => this.getGiftboxes(e)).material_select();
    },
	data() {
		return {
			loading: false,
			create: {
				name: '',
				pax: '',
				code: '',
				duration: '',
				company: '',
				universe: '',
				giftbox: '',
				reservationEmail: '',
				reservationContact: '',
				address: '',
				information: '',
				requirements: {
					minAge: {
						title: 'Minimum Age',
						value: null,
					},
					minHeight: {
						title: 'Minimum Height',
						value: null,
					},
					maxHeight: {
						title: 'Maximum Height',
						value: null,
					},
					minWeight: {
						title: 'Minimum Weight',
						value: null,
					},
					maxWeight: {
						title: 'Maximum Weight',
						value: null,
					},
					adapted: {
						title: 'Adapted for the disabled',
						value: null,
					},
				},
				services: {
					video: {
						title: 'Video',
						value: null,
					},
					parking: {
						title: 'Parking',
						value: null,
					},
					swimmingPool: {
						title: 'Swimming Pool',
						value: null,
					},
					petsAllowed: {
						title: 'Pets Allowed',
						value: null,
					},
					cafe: {
						title: 'Cafe',
						value: null,
					},
					photos: {
						title: 'Photos',
						value: null,
					},
				}
			},
			universes: [],
			giftboxes: [],
            companies: [],
		}
	},
	methods: {
		getUniverses: function() {
			let vm = this;
			vm.loading = true;

			axios.get('/universe/all')
			    .then(function(response) {
			        vm.loading = false;
                    vm.universes = response.data.universes;

                    vm.$nextTick(function() {
                        $('#universe').material_select('destroy');
                        $('#universe').material_select();
                    });
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
        getCompanies: function() {
		    let vm = this;
		    vm.loading = true;

		    axios.get('/company/all')
		        .then(function(response) {
		            vm.loading = false;
		            if (response.data.status) {
                        vm.companies = response.data.companies;

                        vm.$nextTick(function() {
                            $('#company').material_select('destroy');
                            $('#company').material_select();
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
		getGiftboxes: function(event) {
			let vm = this;
			vm.loading = true;
			axios.get('/giftbox/parent/' + event.target.value)
            .then(function (response) {
                vm.loading = false;
                if (response.data.status === true) {
	                vm.giftboxes = response.data.result;
	                vm.$nextTick(function() {
	                	$('#giftbox').material_select();
	                });
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
		store: function() {
			let vm = this;
			let formData = new FormData();

			vm.loading = true;

			for (var value in vm.create) {
				if (vm.create.hasOwnProperty(value)) {
					formData.append(value, vm.create[value]);
				}
			}

			formData.append('company', document.getElementById('company').value);
			formData.append('universe', document.getElementById('universe').value);
			formData.append('giftbox', document.getElementById('giftbox').value);
			formData.append('thumbnail', document.getElementById('thumbnail').files[0]);
			formData.append('requirements', JSON.stringify(vm.create.requirements));
			formData.append('services', JSON.stringify(vm.create.services));

			axios.post('/experience/create', formData)
				.then(function (response) {
					vm.loading = false;

					if (response.data.status) {
						toastr.success("Success")
					} else {
						toastr.alert("Fail")
					}

				})
				.catch(function (error) {
                    vm.loading = false;
                    if (error.response) {
                        // The request was made and the server responded with a status code
                        // that falls out of the range of 2xx
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
		}
	}
})