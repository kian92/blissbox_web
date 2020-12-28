@extends('frontend.layouts.app')

@section('title', 'Register')

@section('inline-style')
    <style>
        .errors {
            font-family: 'Oxygen', sans-serif;
            color: red;
            padding: 0.5rem 0;
        }
        #hero-banner {
            max-height: 300px;
            background-size: cover;
            overflow: hidden;
        }
        #register-wrapper {
            background-color: #FFF;
            z-index: 10;
            min-height: 500px;
        }
        #register-wrapper .container {
            position: relative;
            padding: 65px 75px;
            background-color: #FFF;
        }
        #register-wrapper .f-70 {
            flex-basis: 70%;
            max-width: 70%;
        }
        #register-wrapper input,
        #register-wrapper select {
            -webkit-border-radius: 0 !important;
            -moz-border-radius: 0 !important;
            border-radius: 0 !important;
            padding: 12px 30px;
            margin-top: 31px;
        }
        #register-wrapper span {
            display: inline-block;
            font-family: 'Oxygen', sans-serif;
        }
        #register-wrapper .or .or-container,
        #register-wrapper .social-container {
            max-width: 1100px;
            margin-top: 0;
            position: relative;
        }
        #register-wrapper .or .or-container div {
            text-transform: uppercase;
            position: absolute;
            top: -24px;
            left: 50%;
            width: 50px;
            height: 50px;
            border-radius: 25px;
            border: 1px solid #F0F0F0;
            padding: 12px;
            background-color: #FFF;
            font-family: 'Oxygen', sans-serif;
            font-weight: bolder;
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
            transform: translateX(-50%);
        }
        #register-wrapper .or .or-container span {
            height: 1px;
            width: 100%;
            background-color: #E0E0E0;
            position: absolute;
            left: 0;
        }
        #register-wrapper div.text-center {
            font-family: 'Oxygen', sans-serif;
        }
        #register-wrapper select.form-control:not([size]):not([multiple]) {
            height: 50px;
            border-radius: 0 !important;
            border: 1px solid #CED4DA;
            padding: 13px 30px;
        }
        #register-wrapper .social-container p {
            margin: 2.5rem 0;
            font-family: 'Oxygen', sans-serif;
        }
        #register-wrapper .justify-content-evenly {
            justify-content: space-evenly;
        }
        #register-wrapper .btn-social {
            padding: 12px 15px;
            width: 48%;
            border-radius: 26px;
            color: #FFF;
        }
        #register-wrapper .btn-social:first-child {
            background-color: #3B5998;
        }
        #register-wrapper .btn-social:last-child {
            background-color: #DF4A32;
        }
        #register-wrapper .form-check-label {
            margin-top: 20px;
        }
        #register-wrapper .form-check-label input {
            display: inline-block;
            margin-top: 5px;
            padding-right: 10px;
        }
        #register-wrapper .terms_privacy {
            font-size: 0.875rem;
            color: #111821;
            font-family: 'Oxygen', sans-serif;
            margin-top: 15px;
        }
        #register-wrapper .btn-register {
            padding: 13px 20px;
            border-radius: 25px;
            background-color: #FECE51;
            margin-right: 30px;
            cursor: pointer;
        }
        #register-wrapper .login {
            font-family: 'Oxygen', sans-serif;
            font-size: 0.875rem;
            color: #111821;
        }
        #register-wrapper .login a {
            color: #111821;
            font-weight: bolder;
            text-decoration: underline;
        }
        @media (max-width: 1199px) {
            #register-wrapper .f-70 {
                max-width: 100%;
                flex-basis: 100%;
            }
        }
        @media (max-width: 767px) {
            #register-wrapper *[class*='col-'] {
                flex-basis: 100%;
                max-width: 100%;
            }
            #register-wrapper input, #register-wrapper select {
                margin-top: 0.5rem !important;
            }
            #register-wrapper input#postal.form-control,
            #register-wrapper input#password.form-control {
                margin-top: 2.5rem !important;
            }
        }
        @media (max-width: 420px) {
            #register-wrapper {
                min-height: initial;
            }
            #register-wrapper .container {
                margin-top: 0;
                padding: 30px 15px;
            }
            #register-wrapper .col-12 .flex {
                text-align: center;
            }
            #register-wrapper .btn-register {
                margin-bottom: 20px;
            }
        }
    </style>
@endsection

@section('body', 'frontend register')

@section('content')
    <div id="register">
        <section id="hero-banner">
            <div class="d-flex">
                <div class="captions">
                    <img src="{{ asset('images/frontend/registration.jpg') }}" class="img-fluid" alt="Emotion As Gift" />
                </div>
            </div>
        </section>
        <section id="register-wrapper">
            <div class="container">
                <!--
                <div class="social-container container p-0">
                    <div>
                        <p class="text-center">Create an account using social media</p>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <button class="btn btn-social">Sign Up With Facebook</button>
                        <button class="btn btn-social">Sign Up With Google</button>
                    </div>
                </div>
                <div class="d-flex justify-content-center or">
                    <div class="container or-container">
                        <span>
                            <div>OR</div>
                        </span>
                    </div>
                </div>
                -->
                <div class="d-flex justify-content-center">
                    <div class="f-70">
                        <div class="text-center">Create an account with your email address</div>
                        <form method="POST" action="{{ route('register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <select class="form-control mt-2" name="title">
                                            <option>Mr</option>
                                            <option>Mrs</option>
                                            <option>Ms</option>
                                            <option>Miss</option>
                                            <option>Dr</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('title'))
                                        <div class="errors">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="first_name" class="form-control mt-2" id="first_name" placeholder="First Name *" value="{{ old('first_name') }}">
                                        @if ($errors->has('first_name'))
                                            <div class="errors">
                                                {{ $errors->first('first_name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="last_name" class="form-control mt-2" id="last_name" placeholder="Last Name *" value="{{ old('last_name') }}">
                                        @if ($errors->has('last_name'))
                                            <div class="errors">
                                                {{ $errors->first('last_name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail *" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <div class="errors">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <select class="form-control" name="country">
                                            <option value="65">Singapore (+65)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone *" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <div class="errors">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 mb-1">Date of Birth:</div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <input type="text" name="date" class="form-control mt-0" id="date" placeholder="Date *" value="{{ old('date') }}">
                                        @if ($errors->has('date'))
                                            <div class="errors">
                                                {{ $errors->first('date') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <select name="month" class="form-control mt-0">
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        @if ($errors->has('month'))
                                            <div class="errors">
                                                {{ $errors->first('month') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" name="year" class="form-control mt-0" id="year" placeholder="Year *" value="{{ old('year') }}">
                                        @if ($errors->has('year'))
                                            <div class="errors">
                                                {{ $errors->first('year') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" name="postal_code" class="form-control" id="postal" placeholder="Postal *" value="{{ old('postal_code') }}">
                                        @if ($errors->has('postal_code'))
                                            <div class="errors">
                                                {{ $errors->first('postal_code') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Address *" value="{{ old('address') }}">
                                        @if ($errors->has('address'))
                                            <div class="errors">
                                                {{ $errors->first('address') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password *">
                                        @if ($errors->has('password'))
                                            <div class="errors">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password *">
                                        @if ($errors->has('confirm_password'))
                                            <div class="errors">
                                                {{ $errors->first('confirm_password') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            {{--<input class="form-check-input" type="checkbox" name="share" value="agree">--}}
                                            Share my registration data with Blissbox’ content providers for marketing purposes.
                                            @if ($errors->has('share'))
                                                <div class="errors">
                                                    {{ $errors->first('share') }}
                                                </div>
                                            @endif
                                        </label>
                                    </div>
                                    <span class="terms_privacy">By clicking on “Create Account”, you agree to Blissbox's <a href={{ url('terms') }}>Terms & Conditions</a> and <a href={{ url('privacy') }}>Privacy Policy</a>.</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="flex">
                                        <button type="submit" class="btn btn-register btn-register-signup">Create Account</button>
                                        <span class="login">Already have an account? <a href="{{ url('/login') }}">Log in</a></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/frontend/auth/register.js') }}"></script>
@endsection
