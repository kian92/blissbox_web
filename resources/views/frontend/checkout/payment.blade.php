@extends('frontend.layouts.app')

@section('title', "Payment")

@section('inline-style')
    <style>
        .form-control span {
            width: 100%;
        }
        span.errors {
            /*display: block;*/
            width: 100%;
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
        #payment {
            padding: 6.25rem 0;
            background-color: #F5F4F4;
        }
        #payment .back {
            font-size: 1rem;
            color: #111821;
            cursor: pointer;
        }
        #payment .back i {
            vertical-align: bottom;
            margin-right: 15px;
        }
        #payment .hidden {
            opacity: 0;
        }
        #payment .px-6 {
            padding: 0 5rem;
        }
        #payment .steps span {
            font-family: 'Quicksand', sans-serif;
            font-size: 1rem;
            margin: 0 20px;
            color: #C2C1C1;
        }
        #payment .steps span.active {
            color: #05AC89;
        }
        #payment h1 {
            font-weight: bolder;
            margin-bottom: 3.125rem;
        }
        #payment .f-50 {
            max-width: 50%;
            margin: 0 auto;
        }
        #payment .f-50 input {
            padding: 20px 30px;
            margin-top: 31px;
            border-radius: 0 !important;
        }
        #payment .f-50 input.month,
        #payment .f-50 input.year {
            margin-top: 0;
            float: left;
            width: 50%;
        }
        #payment .btn-payment {
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
            #payment .f-50 {
                max-width: 100%;
            }
        }
        @media (max-width: 991px) {
            html {
                font-size: 14px;
            }

            #payment .container .d-flex {
                flex-direction: column;
            }
        }
        @media (max-width: 767px) {
            #payment .px-6 {
                padding: 0;
            }
            #payment .steps span:nth-child(even) {
                margin: 0 5px;
            }
            #payment .f-50 .col-6 {
                flex-basis: 100%;
                max-width: 100%;
            }
            #payment .f-50 .col-3,
            #payment .f-50 .col-9 {
                flex-basis: 50%;
                max-width: 50%;
            }
            #payment .col-2,
            #payment .col-4 {
                flex-basis: 100%;
                max-width: 100%;
            }
            #payment .col-2:nth-child(3),
            #payment .col-2:nth-child(4) {
                flex-basis: 50%;
                max-width: 50%;
            }
            #payment .col-2:nth-child(4) input {
                margin-top: 29px;
            }
            #payment label {
                margin-bottom: 1rem;
            }
        }
        @media (max-width: 420px) {
            #payment {
                padding: 1.5rem 0;
            }
            #payment h3 {
                margin-top: 1rem;
                text-align: center;
            }
            #payment .container .d-flex {
                margin: 15px 0 !important;
            }
            #payment .hidden {
                display: none;
            }
            #payment .steps span {
                display: block;
            }
            #payment .steps span:nth-child(even) {
                display: none;
            }
        }
        @media (max-width: 320px) {
            #payment .steps span {
                display: block;
            }
            #payment .steps span:nth-child(even) {
                display: none;
            }
            #payment h1 {
                display: none;
            }
            #payment h3 {
                text-align: center;
            }
            #payment .f-50 input {
                margin-top: 0;
            }
            #payment .container .d-flex.my-5 {
                margin: 15px 0 !important;
            }
            #payment .hidden {
                display: none;
            }
        }
        [v-cloak] { display:none; }
    </style>
@endsection

@section('body', 'frontend checkout')

@section('content')
    <div id="payment">
        <div class="load-background" v-if="loading">
            <div class="load">
                <?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="100px" height="100px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M64 0L40.08 21.9a10.98 10.98 0 0 0-5.05 8.75C34.37 44.85 64 60.63 64 60.63V0z" fill="#ffb118"/><path d="M128 64l-21.88-23.9a10.97 10.97 0 0 0-8.75-5.05C83.17 34.4 67.4 64 67.4 64H128z" fill="#80c141"/><path d="M63.7 69.73a110.97 110.97 0 0 1-5.04-20.54c-1.16-8.7.68-14.17.68-14.17h38.03s-4.3-.86-14.47 10.1c-3.06 3.3-19.2 24.58-19.2 24.58z" fill="#cadc28"/><path d="M64 128l23.9-21.88a10.97 10.97 0 0 0 5.05-8.75C93.6 83.17 64 67.4 64 67.4V128z" fill="#cf171f"/><path d="M58.27 63.7a110.97 110.97 0 0 1 20.54-5.04c8.7-1.16 14.17.68 14.17.68v38.03s.86-4.3-10.1-14.47c-3.3-3.06-24.58-19.2-24.58-19.2z" fill="#ec1b21"/><path d="M0 64l21.88 23.9a10.97 10.97 0 0 0 8.75 5.05C44.83 93.6 60.6 64 60.6 64H0z" fill="#018ed5"/><path d="M64.3 58.27a110.97 110.97 0 0 1 5.04 20.54c1.16 8.7-.68 14.17-.68 14.17H30.63s4.3.86 14.47-10.1c3.06-3.3 19.2-24.58 19.2-24.58z" fill="#00bbf2"/><path d="M69.73 64.34a111.02 111.02 0 0 1-20.55 5.05c-8.7 1.14-14.15-.7-14.15-.7V30.65s-.86 4.3 10.1 14.5c3.3 3.05 24.6 19.2 24.6 19.2z" fill="#f8f400"/><circle cx="64" cy="64" r="2.03"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-360 64 64" dur="2700ms" repeatCount="indefinite"></animateTransform></g></svg>
            </div>
            <div class="load load-text" v-cloak>
                <h5 v-cloak>@{{ loadingMessage }}</h5>
                {{--<h5 class="center-align">Please do not refresh your browser when purchase.<br/><br/>--}}
                {{--It takes few minutes for us to process your payment and generating voucher</h5>--}}
            </div>
        </div>
        <div class="container px-6">
            <div class="d-flex aligns-item-center justify-content-between">
                <a onclick="history.go(-1);" class="back"><i class="material-icons">arrow_back</i>Back to Details</a>
                <h3 class="text-center">My Payment Details</h3>
                <p class="hidden"><i class="material-icons">arrow_back</i>Continue Shopping</p>
            </div>
            <div class="d-flex aligns-item-center justify-content-center my-5">
                <div class="steps">
                    <span class="active">1. Cart</span>
                    <span class="active">></span>
                    <span class="active">2. Details</span>
                    <span class="active">></span>
                    <span class="active">3. Payment</span>
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
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="full_name" name="card holder name" placeholder="Cardholder's Name *" v-model="card.name" v-validate="'required|alpha_spaces'">
                                <span v-cloak v-show="errors.has('card holder name')" class="errors">@{{ errors.first('card holder name') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="card"  name="card number" placeholder="Card Number *" maxlength="16" v-model="card.number" v-validate="'required|numeric'">
                                <span v-show="errors.has('card number')" class="errors" v-cloak>@{{ errors.first('card number') }}</span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="cvc" id="cvc" placeholder="CVC *" v-model="card.cvc" v-validate="'required|numeric'">
                                <span v-cloak v-show="errors.has('cvc')" class="errors">@{{ errors.first('cvc') }}</span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <label for="month">Expiration Date</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control month" name="month" id="month" placeholder="01" v-model="card.month" v-validate="'required|numeric'">
                                        <input type="text" class="form-control year" name="year" id="year" placeholder="2017" v-model="card.year" v-validate="'required|numeric'">
                                        <span v-cloak v-show="errors.has('month')" class="errors">@{{ errors.first('month') }}</span>
                                        <span v-cloak v-show="errors.has('year')" class="errors">@{{ errors.first('year') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-payment">Proceed Payment</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/frontend/payment.js') }}"></script>
@endsection
