@extends('frontend.layouts.app')

@section('title', 'Forget Password')

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
    </style>
@endsection

@section('body', 'frontend login')

@section('content')
    <div id="reset">
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
                    <div class="d-flex">
                        <div class="f-50">
                            <form v-on:submit.prevent="onSubmit">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <span class="oxygen lighter">Forget Password</span>
                                <div class="row">
                                    <div class="col">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" v-model="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-login float-right">Reset My Password</button>
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/frontend/auth/reset.js') }}"></script>
@endsection
