<template>
	<div>
		<div class="row timeslot">
		    <div class="col s12 m3 days">{{ day }}</div>
		    <div class="col s12 m3">
		        <input type="checkbox" v-bind:id="day" v-bind:data-day="day" checked="checked" class="day" value="Closed" v-on:click="displayTime(checked)" />
		        <label class="status" v-bind:for="day">{{ checked ? "Opened" : "Closed" }}</label>
		    </div>
		    <div class="col s12 m3 timewrapper" v-if="showInput">
				<input type="text" class="autocomplete operatingFrom" placeholder="From (10:30 AM)" v-model="businessHour[index].from">
				<span v-if="showShift">
				</span>
			</div>
			<div class="col s12 m3 timewrapper" v-if="showInput">
				<input type="text" class="autocomplete operatingTo" placeholder="To (10:30 PM)" v-model="businessHour[index].to">
			</div>
	    </div>
	    <div class="row timeslot">
	    	<div class="col s12 m3 offset-m3">
		        <input type="checkbox" v-bind:id="day + 'shift'" v-bind:data-index="day + 'shift'" value="Closed" v-on:click="displayShift(shiftChecked)" />
		        <label v-bind:for="day + 'shift'" class="shiftTime">Shift</label>
	    	</div>
	    	<div class="col s12 m3" v-if="showShift">
	    		<input type="text" class="autocomplete shiftFrom" placeholder="Shift From (10:30 AM)" v-model="businessHour[index].shiftFrom">
	    	</div>
	    	<div class="col s12 m3" v-if="showShift">
				<input type="text" class="autocomplete shiftTo" placeholder="Shift To (10:30 PM)" v-model="businessHour[index].shiftTo">
	    	</div>
	    </div>
    </div>
</template>
<script>
    import Vue from 'vue';
    import axios from 'axios';

	export default {
		props: {
		    index: Number,
			day: String,
		    value: {
		      	type: Array,
	    	},
	    },
		data() {
			return {
				checked: true,
				shiftChecked: false,
				showInput: true,
				showShift: false,
			}
		},
		computed: {
			businessHour: {
				get() {
					return this.value;
				},
				set(value) {
					this.$emit('input', value);
				}
			},
		},
		methods: {
			displayTime: function() {
				let vm = this;
	            this.checked = !this.checked;
	            if (this.checked === true) {
	            	this.showInput = true;
	            } else {
	            	this.showInput = false;
	            }
	        },
	        displayShift: function() {
	        	let vm = this;
				this.shiftChecked = !this.shiftChecked;

	            if (this.shiftChecked === true) {
	            	this.showShift = true;
	            } else {
	            	this.showShift = false;
	            }
	        },
		}
	}
</script>