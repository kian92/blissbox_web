<template>
    <div class="row cart-wrapper">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-4">
                    <img v-bind:src="'storage/giftboxes/' + giftbox.thumbnail" v-bind:alt="giftbox.name"
                         class="img-fluid"/>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <h4>{{ giftbox.name }}</h4>
                            <a v-on:click="destroy(giftbox.giftbox_id)">
                                <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="quantity col-12">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <select class="form-control" id="quantity" v-model="giftbox.totalItem" v-on:change="update(giftbox.id)">
                                    <!-- List All Universe -->
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <p class="sub-total font-weight-bold">
                                SGD {{ (giftbox.totalItem * giftbox.price / 100).toFixed(2) }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <template v-for="(i, index) in item">
                                <template v-if="giftbox.giftbox_id == i.giftbox_id">
                                    <cart-details :item="i" :status="status" @all="$emit('all')" @loading="$emit('loading')"></cart-details>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue';
    import axios from 'axios';
    import toastr from 'toastr';
    import swal from 'sweetalert2';
    import CartDetails from './Details';

    export default {
        props: [
            'giftbox',
            'item',
            'status'
        ],
        components: {
            CartDetails
        },
        computed: {
            total: () => {
                var sum = 0;
                if (this.giftbox) {
                    if (!this.status) {
                        sum = this.giftbox.price * this.giftbox.quantity / 100;
                    } else {
                        sum = this.giftbox.price * this.giftbox.quantity / 100;
                    }
                }
                return sum.toFixed(2);
            },
        },
        methods: {
            update() {
                this.$emit('loading', true);

                if (!this.status) {
                        axios.post('/cart/session/update/' + this.giftbox.giftbox_id, {
                            quantity: this.giftbox.totalItem
                        })
                            .then((response) => {
                                this.$emit('all');
                                this.$emit('refresh');
                                this.$emit('loading', false);
                            })
                            .catch((error) => {
                                this.$emit('loading', false);
                            });
                } else {
                        axios.put('/cart/update/' + this.giftbox.giftbox_id, {
                            quantity: this.giftbox.totalItem
                        })
                            .then((response) => {
                                this.$emit('loading', false);
                                this.$emit('all');
                                this.$emit('refresh');
                            })
                            .catch((error) => {
                                this.$emit('loading', false);
                            });
                }
            },
            destroy(id) {
                this.$emit('loading', true);
                if (!this.status) {
                    axios.post('/cart/session/destroy', {
                        'id': id
                    })
                        .then((response) => {
                            if (response.data.status) {
                                swal("", data.response.message, "success");
                            } else {
                                swal("", data.response.message, "error");
                            }
                            this.$emit('all');
                            this.$emit('refresh');

                            this.$emit('loading', false);
                        })
                        .catch((error) => {
                            this.$emit('loading', false);
                            this.$emit('all');
                            this.$emit('refresh');
                        });
                } else {
                    axios.post('/cart/destroy', {
                        'id': this.giftbox.giftbox_id
                    })
                        .then((response) => {
                            this.$emit('loading', false);
                            if (response.data.status) {
                                swal("", data.response.message, "success");
                            } else {
                                swal("", data.response.message, "error");
                            }
                            this.$emit('all');
                            this.$emit('refresh');
                        })
                        .catch((error) => {
                            this.$emit('loading', false);
                            this.$emit('all');
                        });
                }
            },
        }
    }
</script>
<style scoped>
    .icon,
    .message {
        float: left;
        padding: 10px;
        box-sizing: content-box;
    }
    .icon {
        width: 20px;
    }
    .message {
        width: calc(100% - 60px);
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