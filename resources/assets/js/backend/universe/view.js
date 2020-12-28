import Vue from 'vue';
import axios from 'axios';
import toastr from 'toastr';
import Hashids from 'hashids';

Vue.component('collection', require('../../components/universe/administrator/Collection.vue'));

const app = new Vue({
	el: '#view',
	data() {
		return {
			loading: false,
            items: []
		}
	},
    mounted() {
        this.all();
    },
    methods: {
	    all: function() {
	        let vm = this;
	        vm.loading = true;
	        axios.get('/universe/all')
	            .then(function(response) {
	                vm.loading = false;
                    vm.items = response.data.universes;
	            })
	            .catch(function(error) {
                    vm.loading = false;
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
});