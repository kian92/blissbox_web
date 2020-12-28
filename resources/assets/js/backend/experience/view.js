import Vue from 'vue';
import Axios from 'axios';
import VueObserveVisibility from 'vue-observe-visibility'
import InstantSearch from 'vue-instantsearch';

Vue.use(InstantSearch);
Vue.use(VueObserveVisibility);

new Vue({
	el: '#experience',
	data() {
		return {
			loading: false,
			experiences: []
		}
	},
	mounted() {
		this.all();
	},
	methods: {
		all: function() {
			let vm = this;
			Axios.get('experience/all')
			.then(function (response) {
				vm.loading = true;
				if (response.data.status) {
					vm.loading = false;
					vm.experiences = response.data.experiences;
				}			
			})
			.catch(function (error) {
				vm.loading = false;
				var errorMessage = error.response.data;
			    for (var name in errorMessage) {
			        if (errorMessage.hasOwnProperty(name)) {
			            toastr.error(errorMessage[name]);
			        }
			    }
			});
		}
	}
})