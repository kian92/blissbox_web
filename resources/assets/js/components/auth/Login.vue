<template>
    <div id="login" class="modal">
        <div class="modal-content">
            <h4 class="center-align">Login</h4>
            <form v-on:submit.prevent="login">
            	<div class="row">
                    <div class="input-field col s12">
                        <input type="email" name="email" id="email" v-validate="'required|email'" v-model="input.email">
                        <label for="email">Email</label>
                        <span v-cloak v-show="errors.has('email')" class="error">{{ errors.first('email') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="password" id="password" v-validate="'required|min:6'" v-model="input.password">
                        <label for="password">Password</label>
                        <span v-cloak v-show="errors.has('password')" class="error">{{ errors.first('password') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 right-align">
                        <a href="/register" class="btn waves-effect waves-light" name="submit">Register
                        </a>
                        <button class="btn waves-effect waves-light" type="submit" name="submit">Login
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
	import VeeValidate from 'vee-validate';
	import toastr from 'toastr';

	Vue.use(VeeValidate);

	export default {
		data() {
			return {
				input: {
					email: '',
					password: '',
				},
			}
		},
		methods: {
			login: function() {

                let vm = this;
                vm.$emit('loading', true);
                
				axios.defaults.headers.common['X-CSRF-TOKEN'] = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content');

				axios.post('/login', vm.input)
				.then(function (response) {
                    vm.$emit('loading', false);
			    	location.reload();
				})
				.catch(function (error) {
                    vm.$emit('loading', false);
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
	}
</script>