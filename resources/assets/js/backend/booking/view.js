import Vue from 'vue';
import axios from 'axios';
import materialize from 'materialize-css';
import VeeValidate from 'vee-validate';
import lodash from 'lodash';
import toastr from 'toastr';

var moment = require('moment');

Vue.component('card', require('../../components/booking/Card.vue'));
Vue.component('all', require('../../components/booking/All.vue'));

new Vue({
    el: '#view',
    data() {
        return {
            loading: false,
            items: [],
            experiences: [],
            check: {
                date: '',
                experience: '',
            },
            status: false,
            initial: true
        }
    },
    mounted() {
        this.fetchExperience();
        this.fetchBooking();

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });

        $(document).ready(function() {
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
        });

        $('select').material_select();
    },
    methods: {
        fetchBooking: function(value) {
            let vm = this;
            vm.loading = true;

            if (value == false) {
                vm.initial = false;

                vm.check.experience = $('#experience').val();
                vm.check.date = $('#date').val();
                vm.check.time = $('#time').val();
            } else {
                vm.initial = true;
            }

            axios.post('/booking/fetch', vm.check)
                .then(function(response) {
                    vm.loading = false;
                    if (response.data.status) {
                        vm.items = response.data.result;
                        console.log(vm.items);
                    } else {
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
        fetchExperience: function() {
            let vm = this;
            vm.loading = true;

            axios.get('/experience/fetch')
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
        modal: function() {
            $('#booking').modal('open');
        },
        changeInitial: function() {
            this.initial = false;
        },
    }
});