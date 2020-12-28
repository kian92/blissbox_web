<template>
    <li>
        <div class="collapsible-header main-header">
            <div class="valign-wrapper">
                <div class="wrapper img-wrapper" v-if="experience.thumbnail">
                    <img v-bind:src="'/storage/experiences/' + experience.thumbnail" v-bind:alt="experience.name" class="responsive-img" />
                </div>
                <div class="wrapper img-wrapper" v-else>
                    <img src="/images/no_image.png" v-bind:alt="experience.name" class="responsive-img" />
                </div>
                <div class="wrapper title">
                    {{ experience.name }}
                </div>
            </div>
        </div>
        <div class="collapsible-body">
            <div class="row">
                <div class="col s12 m4">
                    Description
                </div>
                <div class="col s12 m8">
                    {{ experience.information }}
                </div>
            </div>
            <div class="row">
                <div class="col s12 m4">
                    Product Code
                </div>
                <div class="col s12 m8">
                    {{ experience.code }}
                </div>
            </div>
            <div class="row">
                <div class="col s12 m4">
                    Pax
                </div>
                <div class="col s12 m8">
                    {{ experience.pax }} person(s)
                </div>
            </div>
            <div class="row">
                <div class="col s12 m4">
                    Duration
                </div>
                <div class="col s12 m8">
                    {{ experience.duration }}
                </div>
            </div>
            <div class="row">
                <div class="col s12 m4">
                    Address
                </div>
                <div class="col s12 m8">
                    {{ experience.address }}
                </div>
            </div>
            <div class="row">
                <div class="col s12 m4">
                    Website
                </div>
                <div class="col s12 m8">
                    {{ experience.company.website }}
                </div>
            </div>
            <div class="row">
                <div class="col s12 m4">
                    Reservation Details
                </div>
                <div class="col s12 m8">
                    <span><a v-bind:href="'mailto:' + experience.reservation_email">{{ experience.email }}</a></span>
                    <br/><br/>
                    <span>{{ experience.phone }}</span>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col s12">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">alarm</i>Operating Hour</div>
                            <div class="collapsible-body" v-if="experience.company.business_type != 'appointment'">
                                <table class="bordered responsive-table">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>From</th>
                                            <th>To</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(business_hour, index) in business_hours">
                                            <!--<td>{{ days }}</td>-->
                                            <td>{{ days[index] }}</td>
                                            <td>{{ business_hour.from }}</td>
                                            <td>{{ business_hour.to }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="collapsible-body" v-else>
                                Please check the website or merchant for booking time
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">block</i>Requirements</div>
                            <div class="collapsible-body">
                                <table class="bordered responsive-table">
                                    <template>
                                        <tr v-for="requirement in requirements">
                                            <template v-if="requirement.value">
                                            <td>{{ requirement.title }}</td>
                                            <td>{{ requirement.value }}</td>
                                            </template>
                                        </tr>
                                    </template>
                                </table>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">star</i>Services</div>
                            <div class="collapsible-body">
                                <div class="row" v-for="service in services">
                                    <template v-if="service.value">
                                    <div class="col s12 m4 title-column">
                                        {{ service.title }}
                                    </div>
                                    <div class="col s12 m8 value-column" v-if="service.value">
                                        {{ service.value }}
                                    </div>
                                    <div class="col s12 m8 value-column" v-else>
                                        N/A
                                    </div>
                                    </template>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
</template>
<script>
    import Vue from 'vue';
    import axios from 'axios';

export default {
	props: [
		'experience'
	],
	data() {
		return {
			requirements: [],
            services: [],
            business_hours: [],
			days: [
				'Monday',
				'Tuesday',
				'Wednesday',
				'Thursday',
				'Friday',
				'Saturday',
				'Sunday'
			],
            from: [],
            to: [],
            shiftFrom: [],
            shiftTo: []
		}
	},
    mounted() {
        $('.collapsible').collapsible();
        this.requirements = JSON.parse(this.experience.requirements);
        this.business_hours = JSON.parse(this.experience.company.business_hours);
        this.services = JSON.parse(this.experience.services);
    },
    methods: {
	    company: function() {
	        let vm = this;
	        vm.loading = true;
	        
	        axios.get('/')
	            .then(function(response) {
	                vm.loading = false;
	                if (response.data.status) {
	                    
	                } else {
	                    
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
        }
    }
}
</script>