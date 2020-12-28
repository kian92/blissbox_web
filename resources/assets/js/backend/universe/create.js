import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import toastr from 'toastr';

Vue.use(VeeValidate);

new Vue({
    el: "#create",
    data() {
        return {
            loading: false,
            create: {
                initial: '',
                name: '',
                description: '',
            },
            universes: null,
            image: ''
        }
    },
    methods: {
        store: function() {
            let vm = this;

            axios.defaults.headers.common["X-CSRF-TOKEN"] = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

            // Store everything into FormData
            let formData = new FormData();

            for (var value in this.create) {
                if (this.create.hasOwnProperty(value)) {
                    formData.append(value, this.create[value]);
                }
            }

            if (document.getElementById('thumbnail').files[0]) {
                formData.append('thumbnail', document.getElementById('thumbnail').files[0]);
            }

            axios.post('/universe/create', formData)
                .then(function (response) {
                    toastr.success('Universe created.');
                    window.location.href = '/universe';
                })
                .catch(function(error) {
                    vm.$emit('loading', false);
                    if (error.response) {
                        // The request was made and the server responded with a status code
                        // that falls out of the range of 2xx
                        var errorMessage = error.response.data;
                        console.log(errorMessage.errors['delivers.receiver']);
                        for (var name in errorMessage.errors) {
                            toastr.error(errorMessage.errors[name]);
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