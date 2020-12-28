<style>
.row {
    margin-bottom: 0;
}
</style>
<template>
    <li>
        <div class="collapsible-header" v-on:click="viewItem()">
            <div class="row">
                <div class="col s12 m4">
                    <b>Total:</b>
                    SGD {{ (total).toFixed(2) }}
                </div>
                <div class="col s12 m4">
                    <b>Paid by:</b>
                    {{ item["pay_by"] }}
                </div>
                <div class="col s12 m4">
                    <b>Purchased at:</b>
                    {{ item["purchased_at"] }}
                </div>
            </div>
        </div>
        <div class="collapsible-body">
            <div class="overlay-background" v-if="loading">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <ul>
                <li>
                    <table>
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Prices</th>
                                <th>Quantity</th>
                                <th>Package</th>
                                <!--<th>Send To</th>-->
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="giftbox in giftboxes">
                                <td><img v-bind:src="'/storage/giftboxes/' + giftbox['thumbnail']" alt="giftbox" class="" width="50" /></td>
                                <td>
                                    SGD {{ (giftbox['total'] / giftbox['quantity'] / 100).toFixed(2) }}
                                </td>
                                <td>{{ giftbox['quantity'] }}</td>
                                <td style="text-transform: capitalize">{{ giftbox["package"] }}</td>
                                <!--
                                <td>
                                    <ul v-if="giftbox['send_to']">
                                        <li v-for="beneficiary in giftbox['send_to']">
                                            1 for friend: <p>{{ beneficiary }}</p>
                                        </li>
                                    </ul>
                                    <div v-else>
                                        Personal
                                    </div>
                                </td>
                                -->
                            </tr>
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
    </li>
</template>
<script>
    import Vue from 'vue';
    import axios from 'axios';

export default {
	props: [
	    'item',
	],
    data() {
        return {
            loading: false,
            items: [],
            giftboxes: [],
            package: false
        }
    },
    mounted() {
        this.giftboxes = JSON.parse(this.item.items);

        for (var i = 0; i < this.giftboxes.length; i++) {
            if (this.giftboxes[i]['package'] == 'blissbox') {
                this.package = true;
            }
        }

	    $('.collapsible').collapsible();
    },
    computed: {
	    total: function() {
	        if (this.package) {
                return (this.item['total'] / 100) + 7;
            } else {
	            return (this.item['total'] / 100);
            }
        }
    },
    methods: {
        viewItem: function(id) {
            let vm = this;
            vm.loading = true;
            axios.get('/purchase/history/order/' + id)
            .then(function (response) {
                vm.loading = false;
                if (response.data.status) {
                    vm.items = response.data.result;
                }
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
        }
    }
}
</script>