@extends('frontend.layouts.app')

@section('title', "Delivery Details")

@section('inline-style')
    <style>
        span.errors {
            color: #E83B46;
        }
        .d-flex.errors {
            margin-bottom: 20px;
        }
        .f-100 {
            flex: 1 0 100%;
        }
        .error-header {
            padding: 10px;
            color: #FFF;
            background-color: #E83B46;
        }
        .error-body {
            border: 1px solid #E83B46;
        }
        .error-body ul {
            margin-top: 1rem;
        }
        .error-body ul li {
            color: #E83B46;
        }
        #delivery {
            padding: 6.25rem 0;
            background-color: #F5F4F4;
        }
        #delivery .back {
            font-size: 1rem;
            color: #111821;
            cursor: pointer;
        }
        #delivery .back i {
            vertical-align: bottom;
            margin-right: 15px;
        }
        #delivery .hidden {
            opacity: 0;
        }
        #delivery .px-6 {
            padding: 0 5rem;
        }
        #delivery .steps span {
            font-family: 'Quicksand', sans-serif;
            font-size: 1rem;
            margin: 0 20px;
            color: #C2C1C1;
        }
        #delivery .steps span.active {
            color: #05AC89;
        }
        #delivery h1 {
            font-weight: bolder;
            margin-bottom: 3.125rem;
        }
        #delivery .f-50 {
            max-width: 50%;
            margin: 0 auto;
        }
        #delivery .f-50 input {
            padding: 20px 30px
        }
        #delivery .btn-payment {
            text-transform: uppercase;
            background-color: #FECE51;
            padding: 14px 40px;
            border-radius: 25px;
            cursor: pointer;
            display: block;
            margin: 50px auto 0 auto;
        }
        footer.mt-4 {
            margin-top: 0 !important;
        }
        @media (max-width: 1199px) {
            html {
                font-size: 14px;
            }
            #delivery .f-50 {
                max-width: 70%;
            }
        }
        @media (max-width: 991px) {
            #delivery .container .d-flex {
                flex-direction: column;
            }
        }
        @media (max-width: 767px) {
            #delivery .px-6 {
                padding: 0;
            }
            #delivery .steps span:nth-child(even) {
                margin: 0 5px;
            }
            #delivery .f-50 .col-6 {
                flex-basis: 100%;
                max-width: 100%;
            }
            #delivery .f-50 .col-3,
            #delivery .f-50 .col-9 {
                flex-basis: 50%;
                max-width: 50%;
            }
        }
        @media (max-width: 420px) {
            #delivery {
                padding: 1.5rem 0;
            }
            #delivery h3 {
                margin-top: 1rem;
                text-align: center;
            }
            #delivery .container .d-flex {
                margin: 15px 0 !important;
            }
            #delivery .hidden {
                display: none;
            }
            #delivery .steps span {
                display: block;
            }
            #delivery .steps span:nth-child(even) {
                display: none;
            }
            #delivery .f-50 {
                max-width: 95%;
            }
            #delivery .f-50 .col-3, #delivery .f-50 .col-9 {
                flex-basis: 100%;
                max-width: 100%;
            }
        }
    </style>
@endsection

@section('body', 'frontend delivery-details')

@section('content')
    <div id="delivery">
        <div class="load-background" v-if="loading">
            <div class="load">
                <?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="100px" height="100px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M64 0L40.08 21.9a10.98 10.98 0 0 0-5.05 8.75C34.37 44.85 64 60.63 64 60.63V0z" fill="#ffb118"/><path d="M128 64l-21.88-23.9a10.97 10.97 0 0 0-8.75-5.05C83.17 34.4 67.4 64 67.4 64H128z" fill="#80c141"/><path d="M63.7 69.73a110.97 110.97 0 0 1-5.04-20.54c-1.16-8.7.68-14.17.68-14.17h38.03s-4.3-.86-14.47 10.1c-3.06 3.3-19.2 24.58-19.2 24.58z" fill="#cadc28"/><path d="M64 128l23.9-21.88a10.97 10.97 0 0 0 5.05-8.75C93.6 83.17 64 67.4 64 67.4V128z" fill="#cf171f"/><path d="M58.27 63.7a110.97 110.97 0 0 1 20.54-5.04c8.7-1.16 14.17.68 14.17.68v38.03s.86-4.3-10.1-14.47c-3.3-3.06-24.58-19.2-24.58-19.2z" fill="#ec1b21"/><path d="M0 64l21.88 23.9a10.97 10.97 0 0 0 8.75 5.05C44.83 93.6 60.6 64 60.6 64H0z" fill="#018ed5"/><path d="M64.3 58.27a110.97 110.97 0 0 1 5.04 20.54c1.16 8.7-.68 14.17-.68 14.17H30.63s4.3.86 14.47-10.1c3.06-3.3 19.2-24.58 19.2-24.58z" fill="#00bbf2"/><path d="M69.73 64.34a111.02 111.02 0 0 1-20.55 5.05c-8.7 1.14-14.15-.7-14.15-.7V30.65s-.86 4.3 10.1 14.5c3.3 3.05 24.6 19.2 24.6 19.2z" fill="#f8f400"/><circle cx="64" cy="64" r="2.03"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-360 64 64" dur="2700ms" repeatCount="indefinite"></animateTransform></g></svg>
            </div>
            <div class="load load-text">
                <h5>Loading information ...</h5>
            </div>
        </div>
        <div class="container px-6">
            <div class="d-flex aligns-item-center justify-content-between">
                <a onclick="history.go(-1);" class="back"><i class="material-icons">arrow_back</i>Continue Shopping</a>
                <h3 class="text-center">My Billing Details</h3>
                <p class="hidden"><i class="material-icons">arrow_back</i>Continue Shopping</p>
            </div>
            <div class="d-flex aligns-item-center justify-content-center my-5">
                <div class="steps">
                    <span class="active">1. Cart</span>
                    <span class="active">></span>
                    <span class="active">2. Details</span>
                    <span>></span>
                    <span>3. Payment</span>
                    <span>></span>
                    <span>4. Completed</span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="f-50">
                <form v-on:submit.prevent="onSubmit">
                    <div class="d-flex errors" v-if="serverside_errors.length > 0">
                        <div class="f-100">
                            <div class="error-header" v-cloak>
                                Please fill in the mandatory field:
                            </div>
                            <div class="error-body" v-cloak>
                                <ul>
                                    <li v-for="error in serverside_errors">
                                        @{{ error }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name *" v-model="billing.first_name" v-validate="'required'">
                                <span v-cloak v-show="errors.has('first_name')" class="errors">@{{ errors.first('first_name') }}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name *" v-model="billing.last_name" v-validate="'required'">
                                <span v-cloak v-show="errors.has('last_name')" class="errors">@{{ errors.first('last_name') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail *" v-model="billing.email" v-validate="'required|email'">
                                <span v-cloak v-show="errors.has('email')" class="errors">@{{ errors.first('email') }}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact Number *" v-model="billing.contact" v-validate="'required|numeric'">
                                <span v-cloak v-show="errors.has('contact')" class="errors">@{{ errors.first('contact') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="postal" name="postal" placeholder="Postal Code *" v-model="billing.postal" v-validate="'required'">
                                <span v-cloak v-show="errors.has('postal')" class="errors">@{{ errors.first('postal') }}</span>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address *" v-model="billing.address" v-validate="'required'">
                                <span v-cloak v-show="errors.has('address')" class="errors">@{{ errors.first('address') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City *" v-model="billing.city" v-validate="'required'">
                                <span v-cloak v-show="errors.has('city')" class="errors">@{{ errors.first('city') }}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="country" name="country" placeholder="Country" v-model="billing.country" v-validate="'required'">
                                <span v-cloak v-show="errors.has('country')" class="errors">@{{ errors.first('country') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-check" v-if="deliveryMethod">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" v-on:click="differentAddress">
                            Ship to billing address
                        </label>
                    </div>

                    <div v-if="different">
                        <h1 class="text-center mt-5">Shipping Details</h1>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="first_name" name="receiver_first_name" placeholder="First Name" v-model="shipping.first_name" v-validate="'required'">
                                    <span v-cloak v-show="errors.has('receiver_first_name')" class="errors">@{{ errors.first('receiver_first_name') }}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="last_name" name="receiver_last_name" placeholder="Last Name" v-model="shipping.last_name" v-validate="'required'">
                                    <span v-cloak v-show="errors.has('receiver_last_name')" class="errors">@{{ errors.first('receiver_last_name') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="postal" name="receiver_postal" placeholder="Postal Code" v-model="shipping.postal" v-validate="'required'">
                                    <span v-cloak v-show="errors.has('receiver_postal')" class="errors">@{{ errors.first('receiver_postal') }}</span>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="address" name="receiver_address" placeholder="Address" v-model="shipping.address" v-validate="'required'">
                                    <span v-cloak v-show="errors.has('receiver_address')" class="errors">@{{ errors.first('receiver_address') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="city" name="receiver_city" placeholder="City" v-model="shipping.city" v-validate="'required'">
                                    <span v-cloak v-show="errors.has('receiver_city')" class="errors">@{{ errors.first('receiver_city') }}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="country" name="receiver_country" placeholder="Country *" v-model="shipping.country" v-validate="'required'">
                                    <span v-cloak v-show="errors.has('receiver_country')" class="errors">@{{ errors.first('receiver_country') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-payment">Proceed to Payment</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/frontend/delivery.js') }}"></script>
@endsection
