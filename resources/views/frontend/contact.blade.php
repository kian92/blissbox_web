@extends('frontend.layouts.app')

@section('title', 'Contact Us')

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
            transform: translate(-50%, -190%);
            color: #FFF;
        }
        #hero-banner img {
            min-height: 300px;
        }
        #contact {
            background-color: #FFF;
            z-index: 10;
        }
        #contact .container {
            position: relative;
            padding: 65px 75px;
            background-color: #FFF;
        }
        #contact .f-70 {
            flex-basis: 70%;
            max-width: 70%;
        }
        #contact input,
        #contact select,
        #contact textarea {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            padding: 12px 30px;
            margin-top: 31px;
        }
        #contact span {
            display: inline-block;
            font-family: 'Oxygen', sans-serif;
        }
        #contact div.text-center {
            font-family: 'Oxygen', sans-serif;
        }
        #contact select.form-control:not([size]):not([multiple]) {
            height: 50px;
            border-radius: 0 !important;
            border: 1px solid #CED4DA;
            padding: 13px 30px;
        }
        #contact .form-check-label input {
            display: inline-block;
            margin-top: 5px;
            padding-right: 10px;
        }
        #contact .btn-send {
            padding: 12px 50px;
            color: #45474C;
            border-radius: 25px;
            background-color: #FECE51;
            margin: 0 auto;
            display: block;
        }
        @media (max-width: 991px) {
            #hero-banner h1 {
                font-size: 2.5rem;
            }
        }
        @media (max-width: 767px) {
            #contact *[class*='col-'] {
                flex-basis: 100%;
                max-width: 100%;
            }
            #hero-banner h1 {
                transform: translate(-50%, -50%);
            }
            #contact .container {
                position: relative;
                margin-top: 0;
                padding: 25px;
                background-color: #FFF;
            }
        }
    </style>
@endsection

@section('body', 'frontend login')

@section('content')
    <div id="contact">
        <div class="load-background" v-if="loading">
            <div class="load">
                <?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="100px" height="100px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M64 0L40.08 21.9a10.98 10.98 0 0 0-5.05 8.75C34.37 44.85 64 60.63 64 60.63V0z" fill="#ffb118"/><path d="M128 64l-21.88-23.9a10.97 10.97 0 0 0-8.75-5.05C83.17 34.4 67.4 64 67.4 64H128z" fill="#80c141"/><path d="M63.7 69.73a110.97 110.97 0 0 1-5.04-20.54c-1.16-8.7.68-14.17.68-14.17h38.03s-4.3-.86-14.47 10.1c-3.06 3.3-19.2 24.58-19.2 24.58z" fill="#cadc28"/><path d="M64 128l23.9-21.88a10.97 10.97 0 0 0 5.05-8.75C93.6 83.17 64 67.4 64 67.4V128z" fill="#cf171f"/><path d="M58.27 63.7a110.97 110.97 0 0 1 20.54-5.04c8.7-1.16 14.17.68 14.17.68v38.03s.86-4.3-10.1-14.47c-3.3-3.06-24.58-19.2-24.58-19.2z" fill="#ec1b21"/><path d="M0 64l21.88 23.9a10.97 10.97 0 0 0 8.75 5.05C44.83 93.6 60.6 64 60.6 64H0z" fill="#018ed5"/><path d="M64.3 58.27a110.97 110.97 0 0 1 5.04 20.54c1.16 8.7-.68 14.17-.68 14.17H30.63s4.3.86 14.47-10.1c3.06-3.3 19.2-24.58 19.2-24.58z" fill="#00bbf2"/><path d="M69.73 64.34a111.02 111.02 0 0 1-20.55 5.05c-8.7 1.14-14.15-.7-14.15-.7V30.65s-.86 4.3 10.1 14.5c3.3 3.05 24.6 19.2 24.6 19.2z" fill="#f8f400"/><circle cx="64" cy="64" r="2.03"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-360 64 64" dur="2700ms" repeatCount="indefinite"></animateTransform></g></svg>
            </div>
            <div class="load load-text" v-cloak>
                {{--<h5 class="center-align">Please do not refresh your browser when purchase.<br/><br/>--}}
                {{--It takes few minutes for us to process your payment and generating voucher</h5>--}}
            </div>
        </div>
        <section id="hero-banner">
            <div class="d-flex">
                <div class="captions">
                    <img src="{{ asset('images/frontend/hero-banner.png') }}" class="img-fluid" alt="Emotion As Gift" />
                    <h1 class="font-weight-bold">Contact Us</h1>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="f-70">
                        <div class="text-center">Send us en email to address your issue</div>
                        <form v-on:submit.prevent="submit">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control mt-2" v-validate="'required'" name="first name" id="first_name" placeholder="First Name *" v-model="contact.first_name">
                                        <span v-show="errors.has('first name')" class="errors">@{{ errors.first('first name') }}</span>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control mt-2" id="last_name" name="last name" placeholder="Last Name *" v-validate="'required'" v-model="contact.last_name">
                                        <span v-cloak v-show="errors.has('last name')" class="errors">@{{ errors.first('last name') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail *" v-validate="'required'" v-model="contact.email">
                                        <span v-cloak v-show="errors.has('email')" class="errors">@{{ errors.first('email') }}</span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Singapore (+65)</option>
                                            <option>Malaysia (+60)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone *" v-validate="'required'" v-model="contact.phone">
                                        <span v-cloak v-show="errors.has('phone')" class="errors">@{{ errors.first('phone') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject *" v-validate="'required'" v-model="contact.subject">
                                        <span v-cloak v-show="errors.has('subject')" class="errors">@{{ errors.first('subject') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Type your message here *" v-validate="'required'" v-model="contact.message"></textarea>
                                        <span v-cloak v-show="errors.has('message')" class="errors">@{{ errors.first('message') }}</span>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-send text-uppercase mt-3">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/frontend/contact.js') }}"></script>
@endsection
