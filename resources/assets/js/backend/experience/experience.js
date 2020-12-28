import Vue from 'vue';
import axios from 'axios';
import swal from "sweetalert2";
Vue.component('collapsible', require('../../components/experience/Collapsible.vue'));

new Vue({
	el: '#giftbox-experience',
	data() {
		return {
			loading: false,
			searchQuery: '',
			experiences: []
		}
	},
	mounted() {
		this.all();
	},
	methods: {
		all: function() {
			let vm = this;
            let url = new URL(window.location.href);

			vm.loading = true;
			
			axios.get('/giftbox/experience/' + (url.pathname.split('/'))[3])
			    .then(function(response) {
			        vm.loading = false;
			        if (response.data.status) {
			            vm.experiences = response.data.result;
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
	}
});