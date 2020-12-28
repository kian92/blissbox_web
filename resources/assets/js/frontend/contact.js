import 'bootstrap';
import Vue from 'vue';
import axios from 'axios';
import swal from 'sweetalert2';
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

new Vue({
    el: '#contact',
    data() {
        return {
            loading: false,
            contact: {
                title: '',
                first_name: '',
                last_name: '',
                email: '',
                contact: '',
                subject: '',
                message: ''
            }
        }
    },
    methods: {
        submit() {
            this.loading = true;

            this.$validator.validateAll().then(() => {
                // send your data to the backend.
                axios.post('/contact', this.contact)
                    .then(({data}) => {
                        this.loading = false;
                        if (data.status) {
                            window.location = data.redirect;
                        }
                    })
                    .catch((error) => {
                        this.loading = false;
                        if (error.response) {
                            // The request was made and the server responded with a status code
                            // that falls out of the range of 2xx
                            console.log(error.response);
                            if (error.response.status < 500) {

                            } else {
                            }
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
            }).catch(() => {
                // client side errors.
            });
            

        }
    }
});