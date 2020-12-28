<template>
    <div class="cart-details">
        <div class="row my-3 packages">
            <div class="col-sm-6">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" v-bind:name="`digital_${_uid}`" value="e-voucher" v-model="type" v-on:click="updatePackage('e-voucher')">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        e-Box<span> (Sent by e-mail)</span>
                    </label>
                </div>
            </div>
            <div class="col-sm-6" v-if="item.hasBox === 1">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" v-bind:name="`physical_${_uid}`" value="blissbox"
                               v-model="type" v-on:click="updatePackage('blissbox')">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        Blissbox<span> (Home Delivery) <br/><small>Additional shipping cost applies</small></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="form-group recipient-form-group" v-if="type === 'e-voucher'">
                    <input type="email" class="form-control" id="recipient" name="recipient" placeholder="Recipient email address" v-on:blur="updateRecipients()" v-model="recipient" v-validate="'required|email'">
                    <span v-show="errors.has('recipient')" class="help is-danger">{{ errors.first('recipient') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group message-form-group">
                    <!--<div class="icon">-->
                        <!--<i class="material-icons">card_giftcard</i>-->
                    <!--</div>-->

                    <input class="form-control" type="text" name="to" v-model="to" placeholder="Recipient name" v-on:blur="updateRecipientName(item.id)">

                    <div class="message">
                        <textarea class="form-control" rows="3" id="message" placeholder="Add a gift message (optional)" v-model="giftmessage" v-on:blur="updateGiftMessage(item.id)"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue';
    import Axios from 'axios';
    import VeeValidate from 'vee-validate';

    Vue.use(VeeValidate);

    export default {
        props: [
            'item',
            'index',
            'status'
        ],
        data() {
            return {
                showInput: false,
                recipient: '',
                to: '',
                type: '',
                giftmessage: '',
            };
        },
        mounted() {
            if (typeof this.item.package !== "undefined") {
                if (this.item.package === null || this.item.package !== 'blissbox') {
                    this.type = 'e-voucher';
                } else {
                    this.type = this.item.package;
                }
            }

            if (typeof this.item.recipients !== "undefined") {
                if (this.item.recipients != null) {
                    this.recipient = this.item.recipients;
                }
            }

            if (typeof this.item.to !== "undefined") {
                if (this.item.to != null) {
                    this.to = this.item.to;
                }
            }

            if (typeof this.item.message !== "undefined") {
                if (this.item.message != null) {
                    this.giftmessage = this.item.message;
                }
            }
        },
        methods: {
            updatePackage(value) {
                this.type = value;
                if (!this.status) {
                    Axios.post('/cart/session/update/package', {
                        id: this.item.id,
                        type: this.type
                    })
                        .then((response) => {
                            this.$emit('all');
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                } else {
                    Axios.post('/cart/update/package', {
                        id: this.item.id,
                        type: this.type
                    })
                        .then((response) => {
                            this.$emit('all');
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            },
            updateRecipients() {
                if (!this.status) {
                    Axios.post('/cart/session/update/recipient', {
                        id: this.item.id,
                        recipient: this.recipient
                    })
                        .then((response) => {
                            this.$emit('all');
                            console.log(response);
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                } else {
                    Axios.post('/cart/update/recipient', {
                        id: this.item.id,
                        recipient: this.recipient
                    })
                        .then((response) => {
                            console.log(response);
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            },
            updateRecipientName() {
                if (!this.status) {
                    Axios.post('/cart/session/update/to', {
                        id: this.item.id,
                        to: this.to
                    })
                        .then((response) => {
                            console.log(response);
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                } else {
                    Axios.post('/cart/update/to', {
                        id: this.item.id,
                        to: this.to
                    })
                        .then((response) => {
                            console.log(response);
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }

            },
            updateGiftMessage: function() {
                console.log(this.item.id);
                if (!this.status) {
                    Axios.post('/cart/session/update/giftmessage', {
                        id: this.item.id,
                        message: this.giftmessage
                    })
                        .then((response) => {
                            console.log(response);
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                } else {
                    Axios.post('/cart/update/giftmessage', {
                        id: this.item.id,
                        message: this.giftmessage
                    })
                        .then((response) => {
                            console.log(response);
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            },
        }
    }
</script>
<style>
    .icon,
    .message {
        float: left;
        box-sizing: content-box;
    }
    .icon {
        width: 20px;
    }
    .message {
        /*width: calc(100% - 60px);*/
        width: 100%;
    }
    .cart-details {
        border-top: 1px solid #F1F1F1;
        padding-top: 10px;
    }
    .is-danger {
        color: #ff0033 !important;
    }
    textarea {
        resize: none;
        border-radius: 0 !important;
        background-color: #FAFAFA !important;
        padding: 8px 20px !important;
        margin-bottom: 10px;
        font-size: 14px;
    }
    #cart .message-form-group input {
        margin-left: 0;
        width: 100%;
        padding: 8px 20px;
    }
    @media (max-width: 420px) {
        .icon,
        .message {
            display: block;
            float: none;
        }
        .icon {
            margin: 0 auto;
        }
        .message {
            width: calc(100%);
        }
    }
</style>