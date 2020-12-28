@extends('frontend.layouts.app')

@section('title', 'About Us')

@section('inline-style')
    <style>

        /**
         *   Beginning of Default Setting
         */

        .container-content {
            max-width: 1140px;
            padding: 0;
        }

        #hero-banner {
            max-height: 300px;
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

        /**
         * End of Default Setting
         */

        #about {
            background-color: #FFF;
            z-index: 10;
        }

        #about h1 {
            font-family: 'Quicksand', sans-serif;
            font-size: 3.125rem;
            font-weight: bolder;
        }
        #about span {
            color: #FECE51;
        }
        #about .container {
            position: relative;
            padding: 65px 75px;
            background-color: #FFF;
        }
        #value {
            background-color: #F7F6F6;
        }
        #value > .container,
        #value > .container .container {
            margin-top: 0;
            background-color: #F7F6F6;
        }
        #value > .container {
            /*padding: 0 0 65px 0;*/
        }
        #value ul {
            padding-left: 0;
            justify-content: space-evenly;
            text-align: center;
        }
        #value ul li {
            text-decoration: none;
            list-style-type: none;
            padding: 2rem;
            flex: 1 0 20%;
        }
        #value ul li div {
            margin-bottom: 2rem;
        }
        #value ul li i {
            padding: 15px;
            border-radius: 30px;
            border: 1px dotted #05AC89;
            color: #05AC89;
        }
        #value ul li i.fa::before {
            font-size: 24px;
        }
        @media (max-width: 1179px) {
            html {
                font-size: 14px;
            }
        }
        @media (max-width: 767px) {
            /**
             *   Beginning of Default Setting
             */
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

            #about .container,
            #about .container-content {
                padding: 0 !important;
                margin-top: 0 !important;
            }

            #value ul li {
                flex: 1 0 33.333333333%;
            }

            /**
             *   End of Default Setting
             */
        }
        @media (max-width: 550px) {
            #value ul li {
                flex: 1 0 50%;
            }
        }

        @media (max-width: 420px) {
            #hero-banner h1 {
                font-size: 2rem;
            }
            #value ul li {
                flex: 1 0 100%;
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
        {{--<section id="hero-banner">--}}
            {{--<div class="d-flex">--}}
                {{--<div class="captions">--}}
                    {{--<img src="{{ asset('images/frontend/hero-banner.png') }}" class="img-fluid" alt="Emotion As Gift" />--}}
                    {{--<h1 class="font-weight-bold">We are Blissbox</h1>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        <section id="about">
            <div class="container">
                <h1 class="font-weight-bold text-center">Revolutionize the Way We <span>Gift</span></h1>

                <div class="row my-5">
                    <div class="col">
                        <img src="{{ asset('/images/frontend/about/about-1.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col">
                        <img src="{{ asset('/images/frontend/about/about-2.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col">
                        <img src="{{ asset('/images/frontend/about/about-3.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col">
                        <img src="{{ asset('/images/frontend/about/about-4.jpg') }}" class="img-fluid">
                    </div>
                </div>

                <div>
                    <div class="container container-content mt-0 p-0">
                        <p class="oxygen mb-0">We are a Singapore-based leading provider of adventure days and
                            experience gifts. We aim to bring unique and exciting ways for you
                            to give gifts and live incredible moments with those you cherish.
                            We work with more than 3000 partners across all different
                            expertise and industries with which we widen your world and
                            enrich your life.</p>
                        <br/>
                        <p class="oxygen mb-0">We do the hard work, so you don’t have to!
                            We don’t do ordinary stuff ! What Blissbox really provides are
                            moments and memories to keep for many years to come. Our
                            gifts innovate themselves and that is the gift that keeps giving.
                            Prepare your camera and let’s dive in!</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="value" class="p-3">
            <div class="container">
                <h1 class="text-center font-weight-bold">Our Values</h1>
                <div class="container container-content" style="padding: 0;">
                    <div>
                        <ul class="d-flex flex-wrap">
                            <li class="font-weight-bold text-center">
                                <div>
                                    <i class="material-icons">thumb_up</i>
                                </div>
                                Customer satisfaction oriented
                            </li>
                            <li class="font-weight-bold text-center">
                                <div>
                                    <i class="material-icons">trending_up</i>
                                </div>
                                Long term thinking rather than short term results
                            </li>
                            <li class="font-weight-bold text-center">
                                <div>
                                    <i class="fa fa-rocket" aria-hidden="true"></i>
                                </div>
                                Innovate and invent new solutions
                            </li>
                            <li class="font-weight-bold text-center">
                                <div>
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </div>
                                Strong judgement and instinct
                            </li>
                            <li class="font-weight-bold text-center">
                                <div>
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                </div>
                                Curiosity
                            </li>
                            <li class="font-weight-bold text-center">
                                <div>
                                    <i class="material-icons">hearing</i>
                                </div>
                                Always listening to people and gain their trust
                            </li>
                            <li class="font-weight-bold text-center">
                                <div>
                                    <i class="fa fa-rocket" aria-hidden="true"></i>
                                </div>
                                Think big
                            </li>
                            <li class="font-weight-bold text-center">
                                <div>
                                    <i class="material-icons">group_add</i>
                                </div>
                                Hire the best - “A” game players
                            </li>
                            <li class="font-weight-bold text-center">
                                <div>
                                    <i class="material-icons">check_box</i>
                                </div>
                                High quality rather than big quantity
                            </li>
                            <li class="font-weight-bold text-center">
                                <div>
                                    <i class="material-icons">group</i>
                                </div>
                                True family - supporting each other
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container container-content">
                <p class="oxygen font-weight-bold text-center p-5 m-0">
                    We don’t do ordinary stuff! What Blissbox provides are memorable opportunities to live moments and take lovely memories of them for many years to come. Ours are gifts that keep innovate themselves.
                </p>
            </div>
        </section>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/frontend/about.js') }}"></script>
@endsection