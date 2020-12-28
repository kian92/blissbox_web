import Vue from 'vue';
import Axios from 'axios';
import VueObserveVisibility from 'vue-observe-visibility'
import InstantSearch from 'vue-instantsearch';

Vue.component('collapsible', require('../../components/company/Collapsible.vue'));

Vue.use(InstantSearch);
Vue.use(VueObserveVisibility);

const app = new Vue({
	el: '#view',
	data() {
		return {
			loading: false,
			companies: [],
            page: 1
		}
	},
	mounted() {
		this.all();
	},
	methods: {
		all() {
            let vm = this;
            vm.loading = true;
            
            Axios.get('/company/all')
            .then(function (response) {
                vm.loading = false;
                vm.companies = response.data.companies;
            })
            .catch(function (error) {
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
        loadMore(isVisible) {
            if(isVisible) {
                this.page++;
                console.log(this.page);
            }
        }
	}
});