<template>
    <div id="booking" class="modal">
        <form v-on:submit.prevent="store">
            <div class="modal-content">
                <h4 class="center-align">Create New Booking</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="voucher" id="voucher" v-validate="'required'" v-on:input="check" v-on:keydown="displayMessage" v-model="create.voucher">
                        <label>Voucher</label>
                        <span>{{ message }}</span>
                        <br/>
                        <span v-cloak v-show="errors.has('voucher')" class="error">{{ errors.first('voucher') }}</span>
                    </div>
                </div>
                <div v-if="status">
                    <div class="row">
                        <div class="input-field col s12">
                            <select id="createExperience">
                                <option v-bind:value="experience.id" v-for="experience in experiences">{{
                                    experience.name }}</option>
                            </select>
                            <label>Experience</label>
                        </div>
                    </div>
                    <div class="row" v-if="showInput">
                        <div class="input-field col s12 m6">
                            <input type="text" name="first_name" id="first_name" v-model="create.first_name">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="text" name="last_name" id="last_name" v-model="create.last_name">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row" v-if="showInput">
                        <div class="input-field col s12 m6">
                            <input type="text" name="email" id="email" v-validate="'email'" v-model="create.email">
                            <label>Email Address</label>
                            <span v-cloak v-show="errors.has('email')" class="error">{{ errors.first('email') }}</span>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="text" name="phone" id="text" v-validate="'numeric'" v-model="create.phone">
                            <label>Contact Number</label>
                            <span v-cloak v-show="errors.has('phone')" class="error">{{ errors.first('phone') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input name="reservation_date" type="text" class="datepicker" id="createDate">
                            <label for="reservation_date">Pick a Date</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input name="reservation_time" type="text" class="timepicker" id="createTime">
                            <label for="reservation_time">Pick a Time</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="waves-effect waves-light btn">Submit</button>
            </div>
        </form>
    </div>
</template>
<script>
    import Vue from 'vue';
    import axios from 'axios';
    import VeeValidate from 'vee-validate';
    import lodash from 'lodash';
    import toastr from 'toastr';
    import moment from 'moment';

    Vue.use(VeeValidate);

    export default {
        data() {
            return {
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
            $('#createExperience').material_select('destroy');
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year,
                min: true,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: false // Close upon selecting a date,
            });
        },
        methods: {
            store: function() {
                let vm = this;
                vm.loading = true;

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
                        vm.$emit('loading', false);
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

                vm.message = "Validate Voucher ... ";
                
                axios.post('/voucher/user/check', {
                        code: vm.create.voucher
                    })
                    .then(function(response) {
                        vm.$emit('loading', false);
                        if (!response.data.status) {
                            toastr.error(response.data.message);
                            if (response.data.code == 1) {
                                vm.showInput = true;
                            } else {
                                vm.showInput = false;
                            }
                            vm.disable = true;
                        } else {
                            vm.showInput = false;
                            vm.disable = true;
                        }
                        vm.message = "";
                        vm.experiences = vm.fetchExperience();

                        $('#createDate').close();
                        $('#createDate').pickadate({
                            max: moment().format(this.expiration_at, 'YYYY MM D')
                        })
                    })
                    .catch(function(error) {
                        vm.$emit('loading', false);
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
    }
</script>
<style>
    .modal.open {
        max-height: 100%;
    }
    .modal-content {
        min-height: 400px;
    }
    .overlay-background {
        z-index: 5000;
    }
</style>