@extends('backend.layouts.app')

@section('title', 'Create Company')

@section('inline-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    #app {
        width: calc(100% - 300px);
        position: relative;
        left: 300px;
        top: 0;
    }
    .error {
        color: #FF5252 ; 
    }
    .valign-wrapper {
        height: 100%;
        flex-direction: column;
    }
    .overlay-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 900;
        background-color: rgba(254, 206, 81, 0.5);
    }
    h4 {
        text-transform: uppercase;
        font-weight: bold;
        margin-top: 50px;
        margin-bottom: 0;
        color: #FECE51;
    }
    .dayLabel {
        height: 70px;
        margin-top: 40px;
        font-size: 20px;
    }
    .status {
        margin-top: 10px;
    }
    .shiftTime {
        margin-top: 10px;
    }
    .timeslot input[type=text]:not(.browser-default) {
        margin-bottom: 0;
    }
    .timeslot:first-child {
        margin-bottom: 0;
    }
    textarea.materialize-textarea {
        padding: .8rem 0 1.6rem 0 !important;
    }
    @media only screen and (max-width: 992px) {
        .valign-wrapper {
            flex: 0 0 80%;
        }
        .days {
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            height: auto;
        }
        .shiftTime {
            margin-bottom: 10px;
        }
    }
</style>
@endsection

@section('body', 'backend company-create')

@section('content')
<div class="valign-wrapper">
    <div class="container" id="create">
        <div class="overlay-background" v-if="loading">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>
        <div class="row">
            <form class="col s12" v-on:submit.prevent="store">
                <div class="row">
                    <div class="col s12">
                        <h4 class="center-align">Company Information</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        {{ csrf_field() }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                    	<input type="text" name="companyName" id="companyName" v-validate="'required'" v-model="create.companyName">
                        <label>Company Name</label>
                        <span v-cloak v-show="errors.has('companyName')" class="error">@{{ errors.first('companyName') }}</span>
                    </div>
                    <div class="input-field col s12 m12">
                    	<input type="text" name="registrationNo" id="registrationNo" v-validate="'required'" v-model="create.registrationNo">
                        <label>Registration Number</label>
                        <span v-cloak v-show="errors.has('registrationNo')" class="error">@{{ errors.first('registrationNo') }}</span>
                    </div>
                </div>
                <div class="row">
                	<div class="input-field col m6 s12">
                		<select name="natureOfBusiness" id="natureOfBusiness">
                            <option value="Retailer">Retailer</option>
                            <option value="Educational Institutions">Educational Institutions</option>
                            <option value="Information Technology Services">Information Technology Services</option>
                            <option value="Adventure Services Providers">Adventure Services Providers</option>
                            <option value="Simulators Services">Simulators Services</option>
                            <option value="Hotels / Boarding / Lodging">Hotels / Boarding / Lodging</option>
                            <option value="Restaurants / Bar">Restaurants / Bar</option>
                            <option value="Catering Services">Catering Services</option>
                            <option value="Tour and Travel Services">Tour and Travel Services</option>
                            <option value="Vehicle Rental Services">Vehicle Rental Services</option>
                            <option value="Health Clinics / Fitness Centres">Health Clinics / Fitness Centres</option>
                            <option value="Beauty Treatment Centres / Parlours">Beauty Treatment Centres / Parlours</option>
                            <option value="Training and Placement Service Centre">Training and Placement Service Centre</option>
                            <option value="Coaching classes/ Training Institutes">Coaching classes/ Training Institutes</option>
                            <option value="Gymkhana, Club or Association">Gymkhana, Club or Association</option>
                            <option value="Others">Others</option>
                		</select>
                	</div>
                    <div class="input-field col m6 s12">
                        <select name="country" id="country">
                            <option value="Indonesia">Indonesia</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Singapore" selected="selected">Singapore</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="postalCode" id="postalCode" v-validate="'required'" v-model="create.postalCode">
                        <label for="postalCode">Postal Code</label>
                        <span v-cloak v-show="errors.has('postalCode')" class="error">@{{ errors.first('postalCode') }}</span>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" name="website" id="website" v-validate="'url'" v-model="create.website">
                        <label for="website">Website</label>
                        <span v-cloak v-show="errors.has('website')" class="error">@{{ errors.first('website') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="registerAddress" class="materialize-textarea" v-model="create.registeredAddress" ></textarea>
                        <label for="registerAddress">Registered Address</label>
                    </div>
                </div>

                <h4 class="center-align" style="margin-bottom: 50px">Operating Hour</h4>
                <div class="row">
                    <div class="col s12 offset-m4 m4 align-center">
                        <input name="operating" type="radio" id="hour" checked="checked" value="hour" v-model="businessType" />
                        <label for="hour">Business Hour</label>
                    </div>
                    <div class="col s12 m4 align-center">
                        <input name="operating" type="radio" id="appointment" checked="checked" value="appointment" v-model="businessType"/>
                        <label for="appointment">Based on Appointment or Showtime</label>
                    </div>
                </div>
                <div v-if="businessType == 'hour'">
                    <div v-for="(day, index) in days">
                        <business-hour :day="day" :index="index" v-model="create.businessHours"></business-hour>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <h4 class="center-align">Contact Person</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m2">
                        <select name="title" id="title">
                            <option value="mr" selected>Mr.</option>
                            <option value="miss">Miss.</option>
                            <option value="mrs">Mrs.</option>
                            <option value="ms">Ms.</option>
                            <option value="dr">Dr.</option>
                        </select>
                        <label>Title</label>
                    </div>
                    <div class="input-field col s12 m5">
                        <input type="text" name="firstName" id="firstName" v-validate="'required'" v-model="create.firstName">
                        <label for="firstName">First Name</label>
                        <span v-cloak v-show="errors.has('firstName')" class="error">@{{ errors.first('firstName') }}</span>
                    </div>
                    <div class="input-field col s12 m5">
                        <input type="text" name="lastName" id="lastName" v-model="create.lastName">
                        <label for="lastName">Last Name</label>
                        <span v-cloak v-show="errors.has('lastName')" class="error">@{{ errors.first('lastName') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <input type="text" name="mobile" id="mobile" v-validate="'required|numeric'" v-model="create.mobile">
                        <label for="mobile">Mobile</label>
                        <span v-cloak v-show="errors.has('mobile')" class="error">@{{ errors.first('mobile') }}</span>
                    </div>
                    <div class="input-field col m6 s12">
                        <input type="text" name="designation" id="designation" v-validate="'required'" v-model="create.designation">
                        <label for="designation">Designation</label>
                        <span v-cloak v-show="errors.has('designation')" class="error">@{{ errors.first('designation') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="email" name="email" id="email" v-validate="'required|email'" v-model="create.email">
                        <label for="email">Email</label>
                        <span v-cloak v-show="errors.has('email')" class="error">@{{ errors.first('email') }}</span>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" name="fax" id="fax" v-validate="'numeric'" v-model="create.fax">
                        <label for="fax">Fax</label>
                        <span v-cloak v-show="errors.has('fax')" class="error">@{{ errors.first('fax') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <input type="password" name="password" id="password" v-validate="'required|min:6'" v-model="create.password">
                        <label for="password">Password</label>
                        <span v-cloak v-show="errors.has('password')" class="error">@{{ errors.first('password') }}</span>
                    </div>
                    <div class="input-field col m6 s12">
                        <input type="password" name="confirmPassword" id="confirmPassword" v-validate="'required|min:6|confirmed:password'" v-model="create.confirmPassword">
                        <label for="confirmPassword">Confirm Password</label>
                        <span v-cloak v-show="errors.has('confirmPassword')" class="error">@{{ errors.first('confirmPassword') }}</span>
                    </div>
                </div>

                <h4 class="center-align" style="margin-bottom: 50px">Payment Details</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="bank" id="bank" v-validate="'required'" v-model="create.bank">
                        <label for="bank">Bank Name</label>
                        <span v-cloak v-show="errors.has('bank')" class="error">@{{ errors.first('bank') }}</span>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" name="branch" id="branch" v-model="create.branch">
                        <label for="branch">Branch</label>
                        <span v-cloak v-show="errors.has('branch')" class="error">@{{ errors.first('branch') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <input type="text" name="accountNo" id="accountNo" v-model="create.accountNo">
                        <label for="accountNo">Account Number</label>
                        <span v-cloak v-show="errors.has('accountNo')" class="error">@{{ errors.first('accountNo') }}</span>
                    </div>
                    <div class="input-field col s12 m4">
                        <input type="text" name="swiftCode" id="swiftCode" v-model="create.swiftCode">
                        <label for="swiftCode">SWIFT Code</label>
                        <span v-cloak v-show="errors.has('swiftCode')" class="error">@{{ errors.first('swiftCode') }}</span>
                    </div>
                    <div class="input-field col s12 m4">
                        <input type="email" name="paypal" id="paypal" v-validate="'email'" v-model="create.paypal">
                        <label for="paypal">Paypal Account</label>
                        <span v-cloak v-show="errors.has('paypal')" class="error">@{{ errors.first('paypal') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="other" class="materialize-textarea" v-model="create.other" ></textarea>
                        <label for="other">Other</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 right-align">
                        <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('inline-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/backend/company/create.js') }}"></script>
<script>
$('select').material_select();
</script>
@endsection