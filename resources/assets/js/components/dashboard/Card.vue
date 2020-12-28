<template>
    <div class="card sticky-action">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator responsive-img" v-bind:src="'/storage/giftboxes/' + item.giftbox.thumbnail" alt="item.name">
        </div>
        <div class="card-content white-text">
            <span class="card-title activator grey-text text-darken-4">
            {{ item.giftbox.name }}
            <i class="material-icons right">more_vert</i></span>
            <div class="row">
                <div class="col s12">Expiration Date <br/> {{

                    expiration_at }} </div>
            </div>
            <div class="row">
                <div class="col s12">Voucher Reference Code <br/> {{ item.code }} </div>
            </div>
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">{{ item.giftbox.name }}<i class="material-icons right">close</i></span>
            <p>{{ item.giftbox.description }}</p>
        </div>
        <div class="card-action">
            <p><a v-bind:href="'giftbox/experience/' + item.giftbox_id">View All Experience</a></p>
            <p><a v-on:click="showInput = !showInput;">Transfer Ownership</a></p>
            <div class="row" v-if="showInput">
                <div class="input-field col s12">
                    <input id="email" type="email" v-validate="'required|email'" v-on:keyup.enter="send" v-model="email">
                    <label for="email" class="active">Beneficiary Email</label>
                    <button class="btn right-align" v-on:click="send">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue';
    import axios from 'axios';
    import moment from 'moment';
    import toastr from 'toastr';
    import VeeValidate from 'vee-validate';
    import Hashids from 'hashids';

    Vue.use(VeeValidate);

    export default {
        props: [
            'item'
        ],
        data() {
            return {
                expiration_at: '',
                showInput: false,
                email: ''
            }
        },
        mounted() {
            let hashids = new Hashids();
            this.item.giftbox_id = hashids.encode(this.item.giftbox_id);
            this.expiration_at = moment(this.item.expiration_at).format('MMMM DD, YYYY');
        },
        methods: {
            send: function() {
                let vm = this;
                vm.$emit('loading', true);

                axios.post('/voucher/ownsership', {
                    email: vm.email,
                    id: vm.item.id,
                    code: vm.item.code
                })
                    .then(function(response) {
                        vm.$emit('loading', false);
                        if (response.data.status) {
                            toastr.success(response.data.message);
                        } else {
                            toastr.success(response.data.error);
                        }
                    })
                    .catch(function(error) {
                        vm.$emit('loading', false);
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
    }
</script>
<style>
    .card-action > p {
        display: inline-block;
        width: 48%;
    }
    .card-action > p > a {
        cursor: pointer;
    }
</style>