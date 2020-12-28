@extends('frontend.layouts.app')

@section('title', 'FAQ')

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
        #faq {
            background-color: #FFF;
            z-index: 10;
        }
        #faq h1 {
            font-family: 'Quicksand', sans-serif;
            font-size: 3.125rem;
            font-weight: bolder;
        }
        #faq span {
            color: #FECE51;
        }
        #faq .container,
        #contact-us .container {
            position: relative;
            padding: 65px 75px;
            background-color: #FFF;
        }
        #faq .f-30 {
            flex-basis: 33.3333333%;
            padding: 15px;
        }
        #faq h3 {
            margin-bottom: 50px;
        }
        #faq ul {
            padding-left: 0;
            list-style: none;
        }
        #faq ul li {
            margin: 10px 0;
        }
        #faq ul li a {
            text-decoration: none;
            font-family: Oxygen, sans-serif;
            color: rgba(17, 24, 33, 0.5);
            -ms-word-break: break-all;
            word-break: break-all;
        }
        #faq ul li a.view-all {
            color: #A163A9;
            text-decoration: underline;
        }
        #contact-us .container-content {
            border-top: 1px solid #E0E0E0;
            padding-bottom: 0;
        }
        #contact-us p {
            display: inline-block;
        }
        #contact-us .btn-contact {
            background-color: #FECE51;
            padding: 10px 30px;
            border-radius: 50px;
            color: #FFF;
            text-decoration: none;
            margin-left: 20px;
        }
        #newsletter .f-50 {
            flex-basis: 50%;
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
        @media (max-width: 991px) {
            .container-content {
                padding-left: 0 !important;
                padding-right: 0 !important;
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
            #faq h1 {
                margin: 30px 0;
            }
            #faq .container,
            #faq .container-content {
                padding: 0 !important;
                margin-top: 0 !important;
            }
            #contact-us .container {
                margin-top: 0;
                padding: 15px !important;
            }
            #contact-us .container-content {
                padding-bottom: 0 !important;
            }
            #faq .d-flex {
                flex-wrap: wrap;
            }
            #faq .f-30 {
                flex: 1 0 100%;
                max-width: 100%;
                text-align: center;
            }
            #faq h3 {
                margin-bottom: 20px;
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
        @media (max-width: 420px) {
            #hero-banner h1 {
                font-size: 2rem !important;
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
                    <h1 class="font-weight-bold">We are Blissbox</h1>
                </div>
            </div>
        </section>
        <section id="faq">
            <div class="container">
                <h1 class="font-weight-bold text-center">Suggested Topics</h1>
                <div class="container container-content">
                    <div class="d-flex">
                        <div class="f-30">
                            <h3>FAQs</h3>
                            <ul>
                                <li><a href="{{ url('faq/faq') }}">What is Blissbox gift box?</a></li>
                                <li><a href="{{ url('faq/faq') }}">What is an e-box and how to use it?</a></li>
                                <li><a href="{{ url('faq/faq') }}">Where can I find Blissbox gift boxes?</a></li>
                                <li><a href="{{ url('faq/faq') }}" class="view-all">View All</a></li>
                            </ul>
                        </div>
                        <div class="f-30">
                            <h3>Order and Payment</h3>
                            <ul>
                                <li><a href="{{ url('faq/order') }}">How to benefit from my promo code?</a></li>
                                <li><a href="{{ url('faq/order') }}">Can I cancel or modify my order?</a></li>
                                <li><a href="{{ url('faq/order') }}">What are the different payment methods?</a></li>
                                <li><a href="{{ url('faq/order') }}" class="view-all">View All</a></li>
                            </ul>
                        </div>
                        <div class="f-30">
                            <h3>Shipping Information</h3>
                            <ul>
                                <li><a href="{{ url('faq/shipping') }}">What are the different shipping methods?</a></li>
                                <li><a href="{{ url('faq/shipping') }}">I ordered an e-box, when will I receive it?</a></li>
                                <li><a href="{{ url('faq/shipping') }}">How to follow the delivery of my order?</a></li>
                                <li><a href="{{ url('faq/shipping') }}" class="view-all">View All</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="f-30">
                            <h3>Register My Blissbox</h3>
                            <ul>
                                <li><a href="{{ url('faq/register') }}">How do I proceed to register?</a></li>
                                <li><a href="{{ url('faq/register') }}">How long are the Blissbox gift box valid?</a></li>
                                <li><a href="{{ url('faq/register') }}">What is the loss and theft guarantee?</a></li>
                                <li><a href="{{ url('faq/register') }}" class="view-all">View All</a></li>
                            </ul>
                        </div>
                        <div class="f-30">
                            <h3>Exchange My Gift Box</h3>
                            <ul>
                                <li><a href="{{ url('faq/exchange') }}">Can I exchange my gift box?</a></li>
                                <li><a href="{{ url('faq/exchange') }}">My gift box has expired, can I still exchange?</a></li>
                                {{--<li><a href="{{ url('faq/exchange') }}">How to exchange my gift box?</a></li>--}}
                                <li><a href="{{ url('faq/exchange') }}" class="view-all">View All</a></li>
                            </ul>
                        </div>
                        <div class="f-30">
                            <h3>My Blissbox Account</h3>
                            <ul>
                                <li><a href="{{ url('faq/blissbox') }}">How and why create an account?</a></li>
                                <li><a href="{{ url('faq/blissbox') }}">I’ve lost my password.</a></li>
                                <li><a href="{{ url('faq/blissbox') }}">How to unsubscribe from the newsletter?</a></li>
                                <li><a href="{{ url('faq/blissbox') }}" class="view-all">View All</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact-us">
            <div class="container">
                <div class="container container-content">
                    <p>Still have question?</p><a href="{{ url('contact') }}" class="btn btn-contact">Contact Us</a>
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
                        <button type="submit" class="btn btn-register">I'm Registering</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/frontend/about.js') }}"></script>
@endsection