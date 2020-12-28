@extends('frontend.layouts.app')

@section('title', "Payment")

@section('inline-style')
    <style>
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
        }
        #payment .f-50 input.month {
            margin-top: 0;
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
            #payment .col-2 {
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
    </style>
@endsection

@section('body', 'frontend checkout')

@section('content')
    <div id="payment">
        <div class="container px-6">
            <div class="d-flex aligns-item-center justify-content-center">
                <h3 class="text-center">Checkout</h3>
            </div>
            <div class="d-flex aligns-item-center justify-content-center my-5">
                <div class="steps">
                    <span class="active">1. Cart</span>
                    <span class="active">></span>
                    <span class="active">2. Details</span>
                    <span class="active">></span>
                    <span class="active">3. Payment</span>
                    <span class="active">></span>
                    <span class="active">4. Completed</span>
                </div>
            </div>
        </div>
        <h1 class="text-center">Purchase Successful</h1>

        <div class="container">
            <div class="d-flex justify-content-center text-center">
                Thank you for purchasing with us.
                <br/>
            </div>
        </div>
        <div class="container">
            <div class="f-50">

            </div>
        </div>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/frontend/common.js') }}"></script>
@endsection
