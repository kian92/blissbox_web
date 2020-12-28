@extends('frontend.layouts.app')

@section('title', 'How It Works')

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
            min-height: 300px;
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
        #how {
            background-color: #FFF;
            z-index: 10;
        }
        #how h1 {
            font-family: 'Quicksand', sans-serif;
            font-size: 3.125rem;
            font-weight: bolder;
        }
        #how .steps {
            position: relative;
            flex: 1 0 50%;
            overflow: hidden;
        }
        #how .container {
            position: relative;
            padding: 65px 75px;
            border-top: 1px solid #F1F1F1;
            background-color: #FFF;
        }
        #how .container-content {
            margin: 0 auto;
        }
        #how .row {
            color: #FFF;
            width: 100%;
            height: 100%;
            font-size: 2rem;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            margin: 0;
            font-size: 1rem;
        }
        #how span {
            height: 100%;
            color: #FECE51;
            display: inline-block;
            text-align: center;
        }
        @media (max-width: 1199px) {
            html {
                font-size:14px;
            }
            .d-flex .steps {
                flex-basis: 50%;
            }
        }
        @media (max-width: 991px) {
            #hero-banner h1 {
                font-size: 2.5rem;
            }
        }
    </style>
@endsection

@section('body', 'frontend universe')

@section('content')
    <div id="how">
        <div class="load-background" v-if="loading">
            <div class="load">
                <?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="100px" height="100px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M64 0L40.08 21.9a10.98 10.98 0 0 0-5.05 8.75C34.37 44.85 64 60.63 64 60.63V0z" fill="#ffb118"/><path d="M128 64l-21.88-23.9a10.97 10.97 0 0 0-8.75-5.05C83.17 34.4 67.4 64 67.4 64H128z" fill="#80c141"/><path d="M63.7 69.73a110.97 110.97 0 0 1-5.04-20.54c-1.16-8.7.68-14.17.68-14.17h38.03s-4.3-.86-14.47 10.1c-3.06 3.3-19.2 24.58-19.2 24.58z" fill="#cadc28"/><path d="M64 128l23.9-21.88a10.97 10.97 0 0 0 5.05-8.75C93.6 83.17 64 67.4 64 67.4V128z" fill="#cf171f"/><path d="M58.27 63.7a110.97 110.97 0 0 1 20.54-5.04c8.7-1.16 14.17.68 14.17.68v38.03s.86-4.3-10.1-14.47c-3.3-3.06-24.58-19.2-24.58-19.2z" fill="#ec1b21"/><path d="M0 64l21.88 23.9a10.97 10.97 0 0 0 8.75 5.05C44.83 93.6 60.6 64 60.6 64H0z" fill="#018ed5"/><path d="M64.3 58.27a110.97 110.97 0 0 1 5.04 20.54c1.16 8.7-.68 14.17-.68 14.17H30.63s4.3.86 14.47-10.1c3.06-3.3 19.2-24.58 19.2-24.58z" fill="#00bbf2"/><path d="M69.73 64.34a111.02 111.02 0 0 1-20.55 5.05c-8.7 1.14-14.15-.7-14.15-.7V30.65s-.86 4.3 10.1 14.5c3.3 3.05 24.6 19.2 24.6 19.2z" fill="#f8f400"/><circle cx="64" cy="64" r="2.03"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-360 64 64" dur="2700ms" repeatCount="indefinite"></animateTransform></g></svg>
            </div>
            <div class="load load-text">
                {{--<h5 class="center-align">Please do not refresh your browser when purchase.<br/><br/>--}}
                {{--It takes few minutes for us to process your payment and generating voucher</h5>--}}
            </div>
        </div>
        {{--<section id="hero-banner">--}}
            {{--<div class="d-flex">--}}
                {{--<div class="captions">--}}
                    {{--<img src="{{ asset('images/frontend/hero-banner.png') }}" class="img-fluid" alt="Emotion As Gift" />--}}
                    {{--<h1 class="font-weight-bold">How It Works</h1>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        <section id="how">
            <div class="container">
                <div class="container-content">
                    <div class="d-flex flex-wrap flex-column">
                        <!--
                        <div class="steps">
                            <img src="{{ asset('images/frontend/how-it-works/1.jpg') }}" alt="How It Works" class="img-fluid" />
                            <div class="row">
                                <div class="col-1">
                                    <span>&#9312;</span>
                                </div>
                                <div class="col-11">
                                    Kate has received a Blissbox.
                                </div>
                            </div>
                        </div>
                        <div class="steps">
                            <img src="{{ asset('images/frontend/how-it-works/2.png') }}" alt="How It Works" class="img-fluid" />
                            <div class="row">
                                <div class="col-1">
                                    <span>&#9313;</span>
                                </div>
                                <div class="col-11">
                                    Kate is reading the giftcard from her friend.
                                </div>
                            </div>
                        </div>
                        <div class="steps">
                            <img src="{{ asset('images/frontend/how-it-works/3.jpg') }}" alt="How It Works" class="img-fluid" />
                            <div class="row">
                                <div class="col-1">
                                    <span>&#9314;</span>
                                </div>
                                <div class="col-11">
                                    Kate browsing through the booklet with a list of experiences
                                </div>
                            </div>
                        </div>
                        <div class="steps">
                            <img src="{{ asset('images/frontend/how-it-works/4.jpg') }}" alt="How It Works" class="img-fluid" />
                            <div class="row">
                                <div class="col-1">
                                    <span>&#9315;</span>
                                </div>
                                <div class="col-11">
                                    Kate on the phone to make a reservation.
                                </div>
                            </div>
                        </div>
                        <div class="steps">
                            <img src="{{ asset('images/frontend/how-it-works/5.jpg') }}" alt="How It Works" class="img-fluid" />
                            <div class="row">
                                <div class="col-1">
                                    <span>&#9316;</span>
                                </div>
                                <div class="col-11">
                                    Kate redeeming an experience with the voucher provided.
                                </div>
                            </div>
                        </div>
                        <div class="steps">
                            <img src="{{ asset('images/frontend/how-it-works/6.jpg') }}" alt="How It Works" class="img-fluid" />
                            <div class="row">
                                <div class="col-1">
                                    <span>&#9317;</span>
                                </div>
                                <div class="col-11">
                                    Kate enjoying the experience.
                                </div>
                            </div>
                        </div>
                        <div class="steps">
                            <img src="{{ asset('images/frontend/how-it-works/7.jpg') }}" alt="How It Works" class="img-fluid" />
                            <div class="row">
                                <div class="col-1">
                                    <span>&#9318;</span>
                                </div>
                                <div class="col-11">
                                    Kate enjoyed the experience and decided to purchase it from the <a href="https://www.blissbox.asia/" style="color: #FECE51">Blissbox Website</a>.
                                </div>
                            </div>
                        </div>
                        -->
                        <h1 class="text-center">How It Works</h1>
                        <ol>
                            <li>
                                <p style="font-weight: bold; font-size: 20px;">REGISTER</p>
                                <p>
                                    Head over to <a href="{{ url('/') }}">www.blissbox.asia</a> and create your account. Then, activate your experience by keying in the reference CODE and PIN provided.
                                </p>
                            </li>
                            <li>
                                <p style="font-weight: bold; font-size: 20px;">EXPLORE</p>
                                <p>
                                    Select from a curated variety of experiences featured in this booklet and choose ONE experience
                                    which suits your preferences
                                </p>
                            </li>
                            <li>
                                <p style="font-weight: bold; font-size: 20px;">BOOK</p>
                                <p>
                                    After you have selected the desired experience, book directly with the partner using the contact details provided.
                                </p>
                            </li>
                            <li>
                                <p style="font-weight: bold; font-size: 20px;">ENJOY</p>
                                <p>
                                    On the day of your booking, bring along your voucher or e-voucher and hand it over to the
                                    partner allowing him to complete the redemption
                                </p>
                            </li>
                        </ol>
                        <p>Next extra help?</p>
                        <p>Drop us an email at <a href="mailto:support@blissbox.asia">support@blissbox.asia</a> and one of our friendly customer service personnel will get back to you.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/frontend/common.js') }}"></script>
@endsection