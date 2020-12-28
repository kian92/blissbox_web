@extends('frontend.layouts.app')

@section('title', 'Activation Success - Login')

@section('inline-style')
    <style>
        <!-- Default Template -->
        .oxygen {
            font-family: 'Oxygen', sans-serif;
        }
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
        #login-wrapper {
            background-color: #FFF;
            z-index: 10;
            min-height: 500px;
        }
        #login-wrapper .container {
            position: relative;
            margin-top: -100px;
            padding: 65px 75px;
            background-color: #FFF;
        }
        #login-wrapper .container .inner-container {
            max-width: 1100px;
        }
        #login-wrapper input {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            padding: 12px 30px;
            margin-top: 31px;
            background-color: #FAFAFA;
        }
        #login-wrapper .d-flex .f-50 {
            max-width: 50%;
            flex-basis: 50%;
        }
        #login-wrapper .btn-login {
            margin-top: 1rem;
            padding: 13px 40px;
            border-radius: 25px;
            background-color: #FECE51;
            cursor: pointer;
        }
        #login-wrapper .extra a {
            font-weight: bolder;
            color: #111821;
            text-decoration: underline;
        }
        @media (max-width: 1199px) {
            #login-wrapper .extra .col-4 {
                max-width: 100%;
                flex-basis: 100%;
            }
            #login-wrapper .extra .col-8 {
                max-width: 100%;
                flex-basis: 100%;
            }
            #login-wrapper .extra .col-8 span {
                float: left !important;
            }
        }
        @media (max-width: 991px) {
            html {
                font-size: 14px !important;
            }
            #login-wrapper .d-flex {
                flex-direction: column;
            }
            #login-wrapper .d-flex .f-50 {
                max-width: 100%;
                flex-basis: 100%;
            }
        }
        @media (max-width: 420px) {
            #login-wrapper {
                min-height: initial;
            }
            #login-wrapper .container {
                margin-top: 0;
                padding: 30px 15px;
            }
        }
    </style>
@endsection

@section('body', 'frontend login')

@section('content')
    <div id="login">
        <section id="hero-banner">
            <div class="d-flex">
                <div class="captions">
                    <img src="{{ asset('images/frontend/login.jpg') }}" class="img-fluid" alt="Emotion As Gift" />
                </div>
            </div>
        </section>
        <section id="login-wrapper">
            <div class="container">
                <div class="inner-container">
                <h2 class="text-center">Thank you for activating your account.</h2>
                    
                    <div class="d-flex">
                        <div class="f-50">
                            <form method="POST" action="{{ route('login') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <span class="oxygen lighter">Log in manually</span>
                                <div class="row">
                                    <div class="col">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" v-model="login.email">
                                        @if ($errors->has('email'))
                                        <div class="errors">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" v-model="login.password">
                                        @if ($errors->has('password'))
                                            <div class="errors">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-login float-right">Log In</button>
                                    </div>
                                </div>
                                <div class="row mt-5 extra">
                                    <div class="col-4">
                                        <a href="{{ route("password.request") }}" class="oxygen">Forget Password?</a>
                                    </div>
                                    <div class="col-8">
                                        <span class="oxygen float-right">Don't have an account? <a href="{{ url('/register') }}">Create account now</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="f-50">

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('inline-script')
<script src="{{ asset('js/frontend/auth/login.js') }}"></script>
@endsection
