import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';

Vue.use(VeeValidate);

new Vue({
    el: '#edit',
    data() {
        return {
            loading: false,
            items: [],
            universes: [],
            edit: {
                universe: '',
                initial: '',
                name: '',
                price: '',
                description: '',
            },
            id: '',
            thumbnail: ''
        }
    },
    mounted() {
        this.show();
    },
    methods: {
        show: function() {
            let vm = this;
            let url = new URL(window.location.href);

            vm.loading = true;

            axios.get('/giftbox/fetch/' + (url.pathname.split('/'))[2])
                .then(function(response) {
                    vm.loading = false;
                    if (response.data.status) {
                        vm.universes = response.data.universes;
                        vm.id = response.data.giftbox.id;
                        vm.image = response.data.giftbox.thumbnail;
                        vm.edit.initial = response.data.giftbox.initial;
                        vm.edit.name = response.data.giftbox.name;
                        vm.edit.price = (response.data.giftbox.price / 100).toFixed(2);
                        vm.edit.description = response.data.giftbox.description;

                        vm.$nextTick(() => {
                            $('select').material_select();
                        })

                    } else {
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
        },
        update: function(id) {
            let vm = this;
            vm.loading = true;

            axios.defaults.headers.common["X-CSRF-TOKEN"] = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

            // Store everything into FormData
            let formData = new FormData();

            for (var value in vm.edit) {
                if (vm.edit.hasOwnProperty(value)) {
                    formData.append(value, vm.edit[value]);
                }
            }

            formData.append('universe', document.getElementById('universe').value);

            if (document.getElementById('thumbnail').files[0]) {
                formData.append('thumbnail', document.getElementById('thumbnail').files[0]);
            }

            axios.post('/giftbox/update/' + id, formData)
                .then(function(response) {
                    vm.loading = false;
                    if (response.data.status) {
                        toastr.success("Update Successfully");
                        window.location.href = '/giftbox';
                    } else {
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
});