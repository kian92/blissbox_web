@extends('frontend.layouts.app')

@section('title', 'My Blissbox Account')

@section('inline-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .container-content {
            max-width: 1140px;
        }
        #hero-banner {
            max-height: 300px;
            background: rgba(0, 0, 0, 0.5) url("/images/frontend/universes/multitheme.png") no-repeat center center;
            background-size: cover;
            overflow: hidden;
        }
        #hero-banner .d-flex {
            max-height: 300px;
        }
        #hero-banner .captions {
            position: relative;
        }
        #hero-banner h1 {
            font-size: 3.125rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #FFF;
        }
        #hero-banner img {
            min-height: 300px;
        }
        footer.mt-4 {
            margin-top: 0 !important;
        }
        #event {
            background-color: #FFF;
            z-index: 10;
        }
        #event h1 {
            font-family: 'Quicksand', sans-serif;
            font-size: 3.125rem;
            font-weight: bolder;
        }
        #event span {
            color: #FECE51;
        }
        #faq .container {
            position: relative;
            margin-top: -100px;
            padding: 0 75px 50px 75px;
            background-color: #FFF;
        }
        #faq .f-40 {
            flex-basis: 40%;
            padding: 15px;
            margin-top: 51px;
        }
        #faq .f-40 ul {
            list-style: none;
            padding-left: 0;
        }
        #faq .f-40 ul li a {
            font-size: 1.25rem;
            color: #A163A9;
            font-weight: bold;
            margin: 10px 0;
            display: inline-block;
            text-decoration: none;
        }
        #faq .f-60 {
            flex-basis: 60%;
            padding: 15px;
        }
        #faq  .f-50:last-child {
            font-family: 'Oxygen', sans-serif;
        }
        #faq .card {
            border: none;
            border-radius: 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }
        #faq .card:first-child {
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }
        #faq .card-header {
            padding-left: 0;
            background-color: transparent;
        }
        #faq .card-header:first-child {
            border: none;
        }
        #faq .card-header a {
            font-family: 'Oxygen', sans-serif;
            font-size: 1.125rem;
            color: #111821;
        }
        #faq .card-header a:hover {
            text-decoration: none;
        }
        #newsletter .f-50 {
            flex-basis: 50%;
        }
        #newsletter {
            font-family: 'Oxygen', sans-serif;
        }
        #newsletter .justify-content-evenly {
            justify-content: space-evenly;
        }
        #newsletter .form-group {
            position: relative;
            border: 1px solid #FFF;
            border-radius: 25px;
            padding: 0 20px;
            background-color: rgb(255, 255, 255);
        }
        #newsletter .form-group {
            width: 60%;
        }
        #newsletter .form-group:focus {
            background-color: transparent;
        }
        #newsletter .form-group input {
            background-color: transparent;
            border: none;
            position: relative;
            z-index: 2;
        }
        #newsletter .btn-register {
            height: 40px;
            background-color: #FECE51;
            padding: 0 25px;
            border-radius: 25px;
        }
        #newsletter .btn-register {
            margin-left: 20px;
        }
        #newsletter h2 {
            font-size: 3.125rem;
            word-break: break-word;
            font-weight: bolder;
        }
        #newsletter h2,
        #newsletter h3 {
            font-family: "Oxygen", sans-serif;
        }
        #newsletter {
            background-color: #EFEDEC;
        }
        @media (max-width: 1179px) {
            html {
                font-size: 14px;
            }
        }
        @media (max-width: 767px) {
            html {
                font-size: 12px;
            }
            #hero-banner {
                max-height: 150px;
            }
            #hero-banner img {
                min-height: 150px;
            }
            #hero-banner h1 {
                font-size: 2.75rem;
                text-align: center;
            }
            #faq .container,
            #faq .container-content {
                padding: 0 !important;
                margin-top: 0 !important;
            }
            #faq .d-flex {
                flex-wrap: wrap;
            }
            #faq .f-30 {
                flex: 1 0 100%;
                max-width: 100%;
                text-align: center;
            }
            #faq .card-header {
                text-align: center;
            }
            #contact-us .container-content {
                text-align: center;
            }
            #newsletter .form-group {
                width: 100%;
            }
            #newsletter .f-50 {
                flex-basis: 100%;
                flex-wrap: wrap;
            }
        }
        @media (max-width: 679px) {
            #faq .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            .container-content {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
        }
        @media (max-width: 420px) {
            #hero-banner h1 {
                font-size: 2rem;
            }
            #faq .d-flex {
                flex-direction: column;
            }
            #faq .f-40,
            #faq .f-60 {
                flex: 1 0 100%;
            }
            #faq .f-40 {
                margin-top: 2vh;
            }
            #faq .f-60 h3 {
                margin-top: 2vh !important;
                text-align: center;
            }
            #faq .f-40 ul li {
                text-align: center;
            }
            #faq .card-header {
                text-align: center;
            }
        }
    </style>
@endsection

@section('body', 'frontend universe')

@section('content')
    <div id="about">
        <div class="load-background" v-if="loading">
            <div class="load">
                <?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="100px" height="100px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M64 0L40.08 21.9a10.98 10.98 0 0 0-5.05 8.75C34.37 44.85 64 60.63 64 60.63V0z" fill="#ffb118"/><path d="M128 64l-21.88-23.9a10.97 10.97 0 0 0-8.75-5.05C83.17 34.4 67.4 64 67.4 64H128z" fill="#80c141"/><path d="M63.7 69.73a110.97 110.97 0 0 1-5.04-20.54c-1.16-8.7.68-14.17.68-14.17h38.03s-4.3-.86-14.47 10.1c-3.06 3.3-19.2 24.58-19.2 24.58z" fill="#cadc28"/><path d="M64 128l23.9-21.88a10.97 10.97 0 0 0 5.05-8.75C93.6 83.17 64 67.4 64 67.4V128z" fill="#cf171f"/><path d="M58.27 63.7a110.97 110.97 0 0 1 20.54-5.04c8.7-1.16 14.17.68 14.17.68v38.03s.86-4.3-10.1-14.47c-3.3-3.06-24.58-19.2-24.58-19.2z" fill="#ec1b21"/><path d="M0 64l21.88 23.9a10.97 10.97 0 0 0 8.75 5.05C44.83 93.6 60.6 64 60.6 64H0z" fill="#018ed5"/><path d="M64.3 58.27a110.97 110.97 0 0 1 5.04 20.54c1.16 8.7-.68 14.17-.68 14.17H30.63s4.3.86 14.47-10.1c3.06-3.3 19.2-24.58 19.2-24.58z" fill="#00bbf2"/><path d="M69.73 64.34a111.02 111.02 0 0 1-20.55 5.05c-8.7 1.14-14.15-.7-14.15-.7V30.65s-.86 4.3 10.1 14.5c3.3 3.05 24.6 19.2 24.6 19.2z" fill="#f8f400"/><circle cx="64" cy="64" r="2.03"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-360 64 64" dur="2700ms" repeatCount="indefinite"></animateTransform></g></svg>
            </div>
            <div class="load load-text">
                {{--<h5 class="center-align">Please do not refresh your browser when purchase.<br/><br/>--}}
                {{--It takes few minutes for us to process your payment and generating voucher</h5>--}}
            </div>
        </div>
        <section id="hero-banner">
            <div class="d-flex">
                <div class="captions">
                    <img src="{{ asset('images/frontend/hero-banner.png') }}" class="img-fluid" alt="Emotion As Gift" />
                    <h1 class="font-weight-bold">My Blissbox Account</h1>
                </div>
            </div>
        </section>
        <section id="faq">
            <div class="container">
                <div class="container container-content">
                    <div class="d-flex">
                        <div class="f-40">
                            <ul>
                                <li><a href="{{ url('faq/faq') }}">Frequently Asked Questions</a></li>
                                <li><a href="{{ url('faq/order') }}">Order and Payment</a></li>
                                <li><a href="{{ url('faq/shipping') }}">Shipping Information</a></li>
                                <li><a href="{{ url('faq/register') }}">Register My Blissbox</a></li>
                                <li><a href="{{ url('/faq/exchange') }}">Exchange My Gift Box</a></li>
                                <li><a href="{{ url('/faq/blissbox') }}">My Blissbox Account</a></li>
                            </ul>
                        </div>
                        <div class="f-60">
                            <h3 class="my-5">My Blissbox Account</h3>

                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                How and why create an account?
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <ol>
                                                <li>To register please proceed to the following page, <a href="{{ url('/register') }}">https://www.blissbox.asia/register/</a></li>
                                                <li>Registering will allow you to benefit from our theft or loss guarantee</li>
                                                <li>Registering allows you to explore all the options from our panel of experiences</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                I’ve lost my password.
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            To recover your password please click on password forgotten button on the following page, , <a href="{{ url('/password/reset') }}">https://www.blissbox.asia/register/</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                How to unsubscribe from the newsletter?
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            To unsubscribe from our newsletter, please send an email to support@blissbox.asia
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="newsletter" class="p-5">
            <div class="d-flex my-7 align-item-center flex-column text-center">
                <h2>Join the Blissbox Community and Get Even More Benefits!</h2>
                <h3 class="mt-5">Enjoy hot deals and exclusive offers</h3>
                <div class="d-flex justify-content-center align-self-stretch mt-4">
                    <form v-on:submit.prevent="submitsubscribe" class="d-flex flex-row justify-content-center f-50">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" v-model="subscribe" placeholder="Your Email Address">
                        </div>
                        <button type="submit" class="btn btn-register btn-register-nl">I'm Registering</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/frontend/about.js') }}"></script>
@endsection