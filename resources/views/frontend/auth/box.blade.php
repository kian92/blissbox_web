@extends('frontend.layouts.app')

@section('title', 'Login')

@section('inline-style')
    <style>
        <!-- Default Template -->
        .oxygen {
            font-family: 'Oxygen', sans-serif;
        }
        #hero-banner {
            max-height: 300px;
            background-size: cover;
            overflow: hidden;
        }
        #i-have-blissbox {
            background-color: #FFF;
            z-index: 10;
            min-height: 500px;
        }
        #i-have-blissbox .container {
            position: relative;
            margin-top: -100px;
            padding: 65px 75px;
            background-color: #FFF;
        }
        #i-have-blissbox .container .inner-container {
            max-width: 1100px;
            margin: 0 auto;
        }
        #i-have-blissbox input {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            padding: 12px 30px;
            margin-top: 31px;
            background-color: #FAFAFA;
        }
        #i-have-blissbox .d-flex .f-50 {
            max-width: 50%;
            flex-basis: 50%;
        }
        #i-have-blissbox .d-flex .f-50:first-child {
            border-right: 1px solid #E0E0E0;
        }
        #i-have-blissbox .btn-login,
        #i-have-blissbox .btn-register {
            margin-top: 1rem;
            padding: 13px 40px;
            border-radius: 25px;
            background-color: #FECE51;
            color: #45474C;
        }
        #i-have-blissbox .extra a {
            font-weight: bolder;
            color: #111821;
            text-decoration: underline;
        }
        @media (max-width: 767px) {
            #i-have-blissbox .d-flex {
                flex-direction: column;
            }
            #i-have-blissbox .d-flex .f-50 {
                flex-basis: 100%;
                max-width: 100%;
            }
            #i-have-blissbox .d-flex .f-50:first-child {
                border-right: none;
                border-bottom: 1px solid #E0E0E0;
                padding-bottom: 3rem;
            }
            #i-have-blissbox .d-flex .f-50:last-child {
                padding-top: 3rem;
            }
        }
        @media (max-width: 420px) {
            #i-have-blissbox .container {
                position: relative;
                margin-top: 0;
                padding: 65px 15px;
                background-color: #FFF;
            }
        }
    </style>
@endsection

@section('body', 'frontend login')

@section('content')
    <div id="blissbox">
        <section id="hero-banner">
            <div class="d-flex">
                <div class="captions">
                    <img src="{{ asset('images/frontend/i-have-blissbox.jpg') }}" class="img-fluid" alt="Emotion As Gift" />
                </div>
            </div>
        </section>
        <section id="i-have-blissbox">
            <div class="container">
                <div class="d-flex justify-content-center aligns-item-center">
                    <div class="f-50 text-center">
                        <p class="oxygen font-weight-bold">Don't have an account?</p>
                        <p class="oxygen">Create an account to register your Blissbox.</p>
                        <a href="{{ url('/register') }}" class="btn btn-register text-uppercase">Create my account</a>
                    </div>
                    <div class="f-50 text-center">
                        <p class="oxygen font-weight-bold">I already have an account</p>
                        <p class="oxygen">Log in to register your Blissbox</p>
                        <a href="{{ url('/login') }}" class="btn btn-login text-uppercase">Log In</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/frontend/universe.js') }}"></script>
@endsection
