import Vue from 'vue';
import axios from 'axios';
import materialize from 'materialize-css';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';
import moment from 'moment';

Vue.use(VeeValidate);

new Vue ({
    el: "#create",
    data() {
        return {
            loading: false,
            status: true,
            showInput: false,
            disable: true,
            create: {
                voucher: '',
                experience: '',
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                date: '',
                time: ''
            },
            experiences: [],
            message: '',
        }
    },
    created() {
        this.check = lodash.debounce(this.check, 2000);
    },
    mounted() {
        $('#createExperience').material_select();

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            min: true,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            min: true,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });

        $('.timepicker').pickatime({
            fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
            twelvehour: false, // Use AM/PM or 24-hour format
            donetext: 'OK', // text for done-button
            cleartext: 'Clear', // text for clear-button
            canceltext: 'Cancel', // Text for cancel-button
            autoclose: false, // automatic close timepicker
            ampmclickable: true, // make AM PM clickable
            aftershow: function(){} //Function for after opening timepicker
        });
    },
    methods: {
        store: function() {
            let vm = this;

            vm.create.experience = $('#createExperience').val();
            vm.create.date = $('#createDate').val();
            vm.create.time = $('#createTime').val();

            axios.post('/booking/store', vm.create)
                .then(function(response) {
                    vm.loading = false;
                    if (response.data.status) {
                        toastr.success(response.data.message);
                        $('.modal').modal('close');
                    } else {
                        toastr.error(response.data.message);
                    }
                })
                .catch(function(error) {
                    vm.loading = false;
                    if (error.response) {
                        // The request was made and the server responded with a status code
                        // that falls out of the range of 2xx
                        var errorMessage = error.response.data;

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
                    var errorMessage = error.response.data;

                    for (var name in errorMessage.errors) {
                        toastr.error(errorMessage.errors[name]);
                    }
                    console.log(error.config);
                });
        },
        check: function() {
            let vm = this;

            $('select').material_select('destroy');

            vm.message = "Validate Voucher ... ";

            axios.post('/voucher/user/check', {
                code: vm.create.voucher
            })
                .then(function(response) {
                    vm.loading = false;
                    if (!response.data.status) {
                        if (response.data.message) {
                            toastr.error(response.data.message);
                        }
                        if (response.data.code == 1) {
                            vm.showInput = true;
                        } else {
                            vm.showInput = false;
                        }
                        vm.disable = true;
                    } else {


                        if (response.data.info) {
                            toastr.success(response.data.message);
                            vm.showInput = false;
                            vm.disable = true;
                        } else {
                            toastr.success(response.data.message);
                            vm.showInput = true;
                        }

                        vm.message = "";
                        vm.experiences = vm.fetchExperience();
                    }

                    $('#createDate').close();
                    $('#createDate').pickadate({
                        max: moment().format(this.expiration_at, 'YYYY MM D')
                    })
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
        fetchExperience: function() {
            let vm = this;

            axios.get('/experience/fetch/validate/' + vm.create.voucher)
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
        displayMessage: function() {
            this.message = "Validating Voucher ... Please wait ...";
        }
    }
});