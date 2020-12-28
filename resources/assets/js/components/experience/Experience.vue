<template>
    <div class="input-field col s12">
		<input type="checkbox" class="filled-in" v-bind:id="local['title']" v-model="show" />
		<label v-bind:for="local['title']">{{ local['title'] }}</label>
		<span class="requirements" v-if="show">
			<input type="text" v-bind:name="local['title']" v-bind:id="local['title']" v-validate="'required'" v-model="local['value']">
		</span>
	</div>
</template>
<script>
    import Vue from 'vue';
    import axios from 'axios';
	var VeeValidate = require('vee-validate');

	Vue.use(VeeValidate);

	export default {
		props: {
			value: {
				type: Object
			}
		},
		data() {
			return {
				show: false,
			}
		},
		computed: {
			local: {
				get() {
					return this.value;
				},
				set(value) {
					console.log(value);
					this.$emit('input', value);
				}
			}
		},
		methods: {
			requirements: function() {
				this.$emit('experience', );
			}
		}
	}
</script>