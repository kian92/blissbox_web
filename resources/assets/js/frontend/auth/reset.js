import 'bootstrap';
import Vue from 'vue';
import axios from 'axios';
import VeeValidate from 'vee-validate';

const reset = new Vue({
   el: "#reset",
   data() {
       return {
           email: ''
       }
   },
    methods: {
       onSubmit: function() {
           axios.post('/password/email', {
               email: this.email
           })
               .then(response => {

               })
               .catch(error => {

               });
       }
    }
});