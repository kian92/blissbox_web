import 'bootstrap';
import Vue from 'vue';
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

new Vue({
    el: '#login',
    data() {
        return {
        	loading: false,
            status: document.querySelector('meta[name="user-status"]').getAttribute('content'),
            login: {
        	    email: '',
                password: ''
            },
            errorMessages: []
        }
    }
});
