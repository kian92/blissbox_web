import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';

const dictionary = {
    en: {
        custom: {
            confirmPassword: {
                required: 'The confirm password field is required.',
                min: 'The confirm password field must be at least 6 characters.',
                confirmed: 'The confirm confirmation does not match.'
            },

        }
    }
}

VeeValidate.Validator.updateDictionary(dictionary);

Vue.use(VeeValidate);

new Vue({
    el: "#password",
    data() {
        return {
            loading: false,
            change: {
                password: '',
                confirmPassword: ''
            }
        }
    },
    methods: {
        changePassword: function() {
            let vm = this;
            vm.loading = true;

            var formData = new FormData();

            for (var value in this.change) {
                if (this.change.hasOwnProperty(value)) {
                    formData.append(value, this.change[value])
                }
            }

            axios.post('/password/change', formData)
                .then(function(response) {
                    vm.loading = false;
                    if (response.data.status) {
                        toastr.success(response.data.message);
                        vm.change.password = '';
                        vm.change.confirmPassword = '';
                    } else {
                        toastr.error(response.data.message);
                    }
                })
                .catch(function(error) {
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
        }
    }
})