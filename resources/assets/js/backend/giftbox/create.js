import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';

Vue.use(VeeValidate);

new Vue ({
    el: '#create',
    data() {
        return {
            loading: false,
            create: {
                universe: '',
                initial: '',
                name: '',
                price: '',
                description: '',
            },
            referenceCode: '',
            thumbnail: ''
        }
    },
    computed: {
      calculateSuccessFee: function() {
          this.create.successFee = (this.create.amount * 0.3).toFixed(2);
          return this.create.successFee;
      }
    },
    methods: {
        store: function() {
            let vm = this;

            vm.loading = true;

            axios.defaults.headers.common["X-CSRF-TOKEN"] = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

            this.create.universe = document.getElementById('universe').value;

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

            axios.post('/giftbox/create', formData)
                .then(function (response) {
                    vm.loading = false;
                    toastr.success('Giftbox Created.');
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
        },
    }
});