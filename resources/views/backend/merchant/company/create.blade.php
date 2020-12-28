@extends('layouts.app')

@section('title', 'Create New Company')

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
        margin-top: 20px;
    }
    [v-cloak] {
        display: none;
    }
    form {
        background-color: rgba(255, 255, 255, 0.6);
        padding: 0 30px !important;
    }
    h4 {
        text-transform: uppercase;
        font-weight: bold;
        margin-top: 50px;
        margin-bottom: 0;
        color: #FECE51;
    }
    @media only screen and (max-width : 600px) {
        .valign-wrapper {
        }
        .valign-wrapper > #register {
            flex: 0 0 80%;
        }
    }
</style>
@endsection

@section('content')
<div class="valign-wrapper">
    <div class="container" id="create">
        <div class="row">
            <form class="col s12" method="POST" action="{{ route('register') }}">
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
                			<option value="manufacturer">Manufacturer</option>
                			<option value="reseller">Reseller(includes Wholesalers)</option>
                			<option value="retailer">Retailer</option>
                			<option value="importer">Importer</option>
                			<option value="exporter">Exporter</option>
                			<option value="educational">Educational Institutions</option>
                			<option value="banking">Banking Institutions</option>
                			<option value="insurance">Insurance Services</option>
                			<option value="financial">Other Financial Institutions</option>
                			<option value="IT-services">Information Technology Services</option>
                			<option value="ITE-services">Information Technology Enabled Services</option>
                			<option value="security">Security and Detective Agencies</option>
                			<option value="courier">Courier Services</option>
                			<option value="manpower">Manpower providers / Labour Contractors</option>
                			<option value="media">Media and event management Companies</option>
                			<option value="consultancy">Consultancy Firms / Agencies</option>
                			<option value="housekeeping">House Keeping Services</option>
                			<option value="advertising">Advertising Agency</option>
                			<option value="hotel">Hotels / Boarding / Lodging</option>
                			<option value="restaurants">Restaurants / Bar</option>
                			<option value="catering">Catering Services</option>
                			<option value="tour">Tour and Travel Services</option>
                			<option value="vehicle">Vehicle Rental Services</option>
                			<option value="transport">Transport, Freight / Cargo Services</option>
                			<option value="hospitals">Hospitals or Nursing  Homes</option>
                			<option value="clinic">Health Clinics / Fitness Centres</option>
                			<option value="beauty">Beauty Treatment Centres / Parlours</option>
                			<option value="training">Training and Placement Service Centre</option>
                			<option value="services">Service Centres / Maintenance Agencies</option>
                			<option value="market-research">Market Research Agencies</option>
                			<option value="market-service">Marketing Services / Agencies</option>
                			<option value="coaching">Coaching classes/ Training Institutes</option>
                			<option value="gym">Gymkhana, Club or Association</option>
                			<option value="construction">Construction Agencies  / Contractors</option>
                			<option value="cable">Cable /DTH services</option>
                			<option value="printing">Printing Press / Printing Agencies</option>
                			<option value="film">Film / TV Serial Production Agency</option>
                			<option value="business">Business Centres</option>
                			<option value="pest-control">Pest Control Services</option>
                			<option value="telecommunication">Telecommunication Services</option>
                			<option value="electricity">Electricity Generation, Transmission and Distribution</option>
                			<option value="mandap">Mandap / Decoration / Shamiana Services</option>
                			<option value="commission">Commission Agent</option>
                			<option value="others">Others</option>
                			<option value="governament">Governament</option>
                		</select>
                	</div>
                    <div class="input-field col m6 s12">
                        <select name="country" id="country">
                            <option value="4">Afghanistan</option>
                            <option value="248">Åland Islands</option>
                            <option value="8">Albania</option>
                            <option value="12">Algeria</option>
                            <option value="16">American Samoa</option>
                            <option value="20">Andorra</option>
                            <option value="24">Angola</option>
                            <option value="660">Anguilla</option>
                            <option value="10">Antarctica</option>
                            <option value="28">Antigua and Barbuda</option>
                            <option value="32">Argentina</option>
                            <option value="51">Armenia</option>
                            <option value="533">Aruba</option>
                            <option value="36">Australia</option>
                            <option value="40">Austria</option>
                            <option value="31">Azerbaijan</option>
                            <option value="44">Bahamas</option>
                            <option value="48">Bahrain</option>
                            <option value="50">Bangladesh</option>
                            <option value="52">Barbados</option>
                            <option value="112">Belarus</option>
                            <option value="56">Belgium</option>
                            <option value="84">Belize</option>
                            <option value="204">Benin</option>
                            <option value="60">Bermuda</option>
                            <option value="64">Bhutan</option>
                            <option value="68">Bolivia, Plurinational State of</option>
                            <option value="535">Bonaire, Sint Eustatius and Saba</option>
                            <option value="70">Bosnia and Herzegovina</option>
                            <option value="72">Botswana</option>
                            <option value="74">Bouvet Island</option>
                            <option value="76">Brazil</option>
                            <option value="86">British Indian Ocean Territory</option>
                            <option value="96">Brunei Darussalam</option>
                            <option value="100">Bulgaria</option>
                            <option value="854">Burkina Faso</option>
                            <option value="108">Burundi</option>
                            <option value="116">Cambodia</option>
                            <option value="120">Cameroon</option>
                            <option value="124">Canada</option>
                            <option value="132">Cape Verde</option>
                            <option value="136">Cayman Islands</option>
                            <option value="140">Central African Republic</option>
                            <option value="148">Chad</option>
                            <option value="152">Chile</option>
                            <option value="156">China</option>
                            <option value="162">Christmas Island</option>
                            <option value="166">Cocos (Keeling) Islands</option>
                            <option value="170">Colombia</option>
                            <option value="174">Comoros</option>
                            <option value="178">Congo</option>
                            <option value="180">Congo, the Democratic Republic of the</option>
                            <option value="184">Cook Islands</option>
                            <option value="188">Costa Rica</option>
                            <option value="384">Côte d'Ivoire</option>
                            <option value="191">Croatia</option>
                            <option value="192">Cuba</option>
                            <option value="531">Curaçao</option>
                            <option value="196">Cyprus</option>
                            <option value="203">Czech Republic</option>
                            <option value="208">Denmark</option>
                            <option value="262">Djibouti</option>
                            <option value="212">Dominica</option>
                            <option value="214">Dominican Republic</option>
                            <option value="218">Ecuador</option>
                            <option value="818">Egypt</option>
                            <option value="222">El Salvador</option>
                            <option value="226">Equatorial Guinea</option>
                            <option value="232">Eritrea</option>
                            <option value="233">Estonia</option>
                            <option value="231">Ethiopia</option>
                            <option value="238">Falkland Islands (Malvinas)</option>
                            <option value="234">Faroe Islands</option>
                            <option value="242">Fiji</option>
                            <option value="246">Finland</option>
                            <option value="250">France</option>
                            <option value="254">French Guiana</option>
                            <option value="258">French Polynesia</option>
                            <option value="260">French Southern Territories</option>
                            <option value="266">Gabon</option>
                            <option value="270">Gambia</option>
                            <option value="268">Georgia</option>
                            <option value="276">Germany</option>
                            <option value="288">Ghana</option>
                            <option value="292">Gibraltar</option>
                            <option value="300">Greece</option>
                            <option value="304">Greenland</option>
                            <option value="308">Grenada</option>
                            <option value="312">Guadeloupe</option>
                            <option value="316">Guam</option>
                            <option value="320">Guatemala</option>
                            <option value="831">Guernsey</option>
                            <option value="324">Guinea</option>
                            <option value="624">Guinea-Bissau</option>
                            <option value="328">Guyana</option>
                            <option value="332">Haiti</option>
                            <option value="334">Heard Island and McDonald Islands</option>
                            <option value="336">Holy See (Vatican City State)</option>
                            <option value="340">Honduras</option>
                            <option value="344">Hong Kong</option>
                            <option value="348">Hungary</option>
                            <option value="352">Iceland</option>
                            <option value="356">India</option>
                            <option value="360">Indonesia</option>
                            <option value="364">Iran, Islamic Republic of</option>
                            <option value="368">Iraq</option>
                            <option value="372">Ireland</option>
                            <option value="833">Isle of Man</option>
                            <option value="376">Israel</option>
                            <option value="380">Italy</option>
                            <option value="388">Jamaica</option>
                            <option value="392">Japan</option>
                            <option value="832">Jersey</option>
                            <option value="400">Jordan</option>
                            <option value="398">Kazakhstan</option>
                            <option value="404">Kenya</option>
                            <option value="296">Kiribati</option>
                            <option value="408">Korea, Democratic People's Republic of</option>
                            <option value="410">Korea, Republic of</option>
                            <option value="414">Kuwait</option>
                            <option value="417">Kyrgyzstan</option>
                            <option value="418">Lao People's Democratic Republic</option>
                            <option value="428">Latvia</option>
                            <option value="422">Lebanon</option>
                            <option value="426">Lesotho</option>
                            <option value="430">Liberia</option>
                            <option value="434">Libya</option>
                            <option value="438">Liechtenstein</option>
                            <option value="440">Lithuania</option>
                            <option value="442">Luxembourg</option>
                            <option value="446">Macao</option>
                            <option value="807">Macedonia, the former Yugoslav Republic of</option>
                            <option value="450">Madagascar</option>
                            <option value="454">Malawi</option>
                            <option value="458">Malaysia</option>
                            <option value="462">Maldives</option>
                            <option value="466">Mali</option>
                            <option value="470">Malta</option>
                            <option value="584">Marshall Islands</option>
                            <option value="474">Martinique</option>
                            <option value="478">Mauritania</option>
                            <option value="480">Mauritius</option>
                            <option value="175">Mayotte</option>
                            <option value="484">Mexico</option>
                            <option value="583">Micronesia, Federated States of</option>
                            <option value="498">Moldova, Republic of</option>
                            <option value="492">Monaco</option>
                            <option value="496">Mongolia</option>
                            <option value="499">Montenegro</option>
                            <option value="500">Montserrat</option>
                            <option value="504">Morocco</option>
                            <option value="508">Mozambique</option>
                            <option value="104">Myanmar</option>
                            <option value="516">Namibia</option>
                            <option value="520">Nauru</option>
                            <option value="524">Nepal</option>
                            <option value="528">Netherlands</option>
                            <option value="540">New Caledonia</option>
                            <option value="554">New Zealand</option>
                            <option value="558">Nicaragua</option>
                            <option value="562">Niger</option>
                            <option value="566">Nigeria</option>
                            <option value="570">Niue</option>
                            <option value="574">Norfolk Island</option>
                            <option value="580">Northern Mariana Islands</option>
                            <option value="578">Norway</option>
                            <option value="512">Oman</option>
                            <option value="586">Pakistan</option>
                            <option value="585">Palau</option>
                            <option value="275">Palestinian Territory, Occupied</option>
                            <option value="591">Panama</option>
                            <option value="598">Papua New Guinea</option>
                            <option value="600">Paraguay</option>
                            <option value="604">Peru</option>
                            <option value="608">Philippines</option>
                            <option value="612">Pitcairn</option>
                            <option value="616">Poland</option>
                            <option value="620">Portugal</option>
                            <option value="630">Puerto Rico</option>
                            <option value="634">Qatar</option>
                            <option value="638">Réunion</option>
                            <option value="642">Romania</option>
                            <option value="643">Russian Federation</option>
                            <option value="646">Rwanda</option>
                            <option value="652">Saint Barthélemy</option>
                            <option value="654">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="659">Saint Kitts and Nevis</option>
                            <option value="662">Saint Lucia</option>
                            <option value="663">Saint Martin (French part)</option>
                            <option value="666">Saint Pierre and Miquelon</option>
                            <option value="670">Saint Vincent and the Grenadines</option>
                            <option value="882">Samoa</option>
                            <option value="674">San Marino</option>
                            <option value="678">Sao Tome and Principe</option>
                            <option value="682">Saudi Arabia</option>
                            <option value="686">Senegal</option>
                            <option value="688">Serbia</option>
                            <option value="690">Seychelles</option>
                            <option value="694">Sierra Leone</option>
                            <option value="702">Singapore</option>
                            <option value="534">Sint Maarten (Dutch part)</option>
                            <option value="703">Slovakia</option>
                            <option value="705">Slovenia</option>
                            <option value="90">Solomon Islands</option>
                            <option value="706">Somalia</option>
                            <option value="710">South Africa</option>
                            <option value="239">South Georgia and the South Sandwich Islands</option>
                            <option value="728">South Sudan</option>
                            <option value="724">Spain</option>
                            <option value="144">Sri Lanka</option>
                            <option value="729">Sudan</option>
                            <option value="740">Suriname</option>
                            <option value="744">Svalbard and Jan Mayen</option>
                            <option value="748">Swaziland</option>
                            <option value="752">Sweden</option>
                            <option value="756">Switzerland</option>
                            <option value="760">Syrian Arab Republic</option>
                            <option value="158">Taiwan, Province of China</option>
                            <option value="762">Tajikistan</option>
                            <option value="834">Tanzania, United Republic of</option>
                            <option value="764">Thailand</option>
                            <option value="626">Timor-Leste</option>
                            <option value="768">Togo</option>
                            <option value="772">Tokelau</option>
                            <option value="776">Tonga</option>
                            <option value="780">Trinidad and Tobago</option>
                            <option value="788">Tunisia</option>
                            <option value="792">Turkey</option>
                            <option value="795">Turkmenistan</option>
                            <option value="796">Turks and Caicos Islands</option>
                            <option value="798">Tuvalu</option>
                            <option value="800">Uganda</option>
                            <option value="804">Ukraine</option>
                            <option value="784">United Arab Emirates</option>
                            <option value="826">United Kingdom</option>
                            <option value="840">United States</option>
                            <option value="581">United States Minor Outlying Islands</option>
                            <option value="858">Uruguay</option>
                            <option value="860">Uzbekistan</option>
                            <option value="548">Vanuatu</option>
                            <option value="862">Venezuela, Bolivarian Republic of</option>
                            <option value="704">Viet Nam</option>
                            <option value="92">Virgin Islands, British</option>
                            <option value="850">Virgin Islands, U.S.</option>
                            <option value="876">Wallis and Futuna</option>
                            <option value="732">Western Sahara</option>
                            <option value="887">Yemen</option>
                            <option value="894">Zambia</option>
                            <option value="716">Zimbabwe</option>
                        </select>
                    </div>
                </div>
                <div class="row">
					 <div class="input-field col s12">
			          	<textarea id="registerAddress" class="materialize-textarea" v-model="create.registeredAddress" ></textarea>
			          	<label for="registerAddress">Registered Address</label>
			        </div>
			    </div>
			    <div class="row">
                    <div class="input-field col m6 s12">
                        <input type="text" name="openingHour" class="timepicker" id="openingHour" v-validate="'required'" v-model="create.openingHour">
                        <label for="openingHour">Opening Hour</label>
                        <span v-cloak v-show="errors.has('openingHour')" class="error">@{{ errors.first('openingHour') }}</span>
                    </div>
                    <div class="input-field col m6 s12">
						    <select multiple="true" name="openingDay" v-model="create.operationDays">
                                <option value="" disabled selected>Choose operation day</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
						    </select>
						    <label>Operation Days</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <h4 class="center-align">Contact Person Information</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <input type="text" name="contactName" id="contactName" v-validate="'required'" v-model="create.contactName">
                        <label for="contactName">Contact Person Name</label>
                        <span v-cloak v-show="errors.has('contactName')" class="error">@{{ errors.first('contactName') }}</span>
                    </div>
                    <div class="input-field col m6 s12">
                        <input type="email" name="contactDesignation" id="contactDesignation" v-validate="'required'" v-model="create.contactDesignation">
                        <label for="contactDesignation">Contact Person Designation</label>
                        <span v-cloak v-show="errors.has('contactDesignation')" class="error">@{{ errors.first('contactDesignation') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <input type="text" name="contactMobile" id="contactMobile" v-validate="'required|numeric'" v-model="create.contactMobile">
                        <label for="contactMobile">Contact Person Mobile</label>
                        <span v-cloak v-show="errors.has('contactMobile')" class="error">@{{ errors.first('contactMobile') }}</span>
                    </div>
                    <div class="input-field col m6 s12">
                        <input type="email" name="contactEmail" id="contactEmail" v-validate="'required|email'" v-model="create.contactEmail">
                        <label for="contactEmail">Contact Person Email</label>
                        <span v-cloak v-show="errors.has('contactEmail')" class="error">@{{ errors.first('contactEmail') }}</span>
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
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/backend/company/create.js') }}"></script>
<script>
$('select').material_select();
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
});
</script>
@endsection