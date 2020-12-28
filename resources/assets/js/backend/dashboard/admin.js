import Vue from 'vue';
import Axios from 'axios';

new Vue({
    el: '#dashboard',
    data() {
        return {
            purchaseOrders: {
                items: [],
                currentPage: 1,
                next: '',
                prev: ''
            }
        }
    },
    mounted() {
        this.orders();
    },
    methods: {
        orders() {
            this.loading = true;
            
            Axios.get('/dashboard/orders?page=' + this.purchaseOrders.currentPage)
                .then(({data}) => {
                    if (data.status) {
                        this.purchaseOrders.items = data.orders.data

                        if (data.orders.next_page_url) {
                            this.purchaseOrders.next = data.orders.next_page_url
                        } else {
                            this.purchaseOrders.next = ''
                        }
                        if (data.orders.prev_page_url) {
                            this.purchaseOrders.prev = data.orders.prev_page_url
                        } else {
                            this.purchaseOrders.prev = ''
                        }
                    } else {
                        
                    }
                    this.loading = false;
                })
                .catch((error) => {
                   this.loading = false
                });
        },
        prev(value) {
            this.purchaseOrders.currentPage = value
            this.orders()
        },
        next(value) {
            this.purchaseOrders.currentPage = value
            this.orders()
        },
    }
})