@extends('frontend.layouts.app')

@section('title', "Cart")

@section('inline-style')
    <style>
        #cart {
            padding: 6.25rem 0;
            background-color: #F5F4F4;
        }

        #cart .back {
            font-size: 1rem;
            color: #111821;
            cursor: pointer;
        }

        #cart .back i {
            vertical-align: bottom;
            margin-right: 15px;
        }

        #cart .hidden {
            opacity: 0;
        }

        #cart .px-6 {
            padding: 0 5rem;
        }

        #cart .col-8 .col-12 {
            position: relative;
        }

        #cart .col-8 .col-12 a {
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 0;
        }

        #cart .col-8 .col-12 i {
            position: absolute;
            top: 0;
            right: 0;
            color: #CFCFCF;
        }

        #cart .total-title,
        #cart .total,
        #cart .quantity,
        #cart .package,
        #cart .sub-total,
        #cart span {
            font-family: 'Oxygen', sans-serif;
        }

        #cart .steps span {
            font-family: 'Quicksand', sans-serif;
            font-size: 1rem;
            margin: 0 20px;
            color: #C2C1C1;
        }

        #cart .steps span.active {
            color: #05AC89;
        }

        #cart .cart-wrapper {
            background-color: #FFF;
            margin: 1rem;
        }

        #cart .cart-wrapper > .col-12 > .row {
            padding: 2rem;
        }

        #cart .form-group,
        #cart .form-group select {
            display: inline-block;
            margin-bottom: 0;
        }

        #cart .form-group select {
            background-color: #EFEDEC;
            border: none;
            margin-right: 15px;
        }

        #cart .form-group select,
        #cart .recipient-form-group input {
            /*border-radius: 19px;*/
            border-radius: 0;
        }

        #cart .form-group label {
            margin-right: 20px;
        }

        #cart .form-group label,
        #cart .form-group select,
        #cart .sub-total {
            width: 100px;
            font-size: 1.125rem;
        }

        #cart p.sub-total {
            display: inline-block;
            margin-left: 20px;
        }

        #cart .recipient-form-group {
            width: 100%;
        }

        #cart .recipient-form-group span {
            font-size: 0.875rem;
            display: inline-block;
            color: #111821;
            padding-left: 1.4rem;
        }

        #cart .recipient-form-group input {
            background-color: #FAFAFA;
            padding: 8px 20px;
        }

        #cart .message-form-group {
            width: 100%;
        }

        #cart .message-form-group i {
            display: inline-block;
            font-size: 24px;
            color: #FECE51 !important;
            position: relative;
            top: 6px;
            right: initial;
            left: 17px;
            top: 33.5px !important;
        }

        #cart .message-form-group input {
            display: inline-block;
            margin-left: 10px;
            width: 95%;
            background-color: #FAFAFA;
            border-radius: 0;
        }

        #cart .packages {
            font-size: 0.875rem;
        }

        #cart .packages span {
            color: #9E9E9E;
        }

        #cart .packages i {
            margin: 0 10px;
            color: #FECE51;
            font-size: 22px;
        }

        #cart .total-title {
            font-weight: lighter;
            font-size: 1rem;
        }

        #cart .f-70 {
            max-width: 70%;
            flex-basis: 70%;
        }

        #cart .f-30 {
            max-width: 30%;
            flex-basis: 30%;
            margin-right: 75px;
        }

        #cart .border-top {
            border-top: 1px solid #F1F1F1;
        }

        #cart .total {
            font-weight: bold;
            font-size: 1rem;
        }

        #cart .total span {
            font-weight: lighter;
        }

        #cart .summary-wrapper {
            padding-right: 15px;
        }

        #cart h4.summary {
            font-weight: bold;
            padding-top: 50px;
            padding-bottom: 35px;
        }

        #cart .summary-wrapper {
        }

        #cart .summary-wrapper p {
            font-size: 1.125rem;
        }

        #cart .summary-wrapper p.shipping {
            margin-bottom: 30px;
        }

        #cart .summary-wrapper .total {
            font-size: 1.5rem;
            font-weight: bolder;
            padding: 30px 0 0 0;
            border-top: 1px solid #9E9E9E;
        }

        #cart .summary-wrapper .terms_privacy {
            font-size: 0.875rem;
            color: #111821;
            margin-top: 1rem;
        }

        #cart .summary-wrapper .terms_privacy a {
            font-weight: bold;
            text-decoration: underline;
            color: #111821;
        }

        #cart .summary-wrapper .btn-checkout {
            background-color: #FECE51;
            padding: 14px 35px;
            border-radius: 31px;
            color: #45474C;
            font-size: 1rem;
        }

        #cart .summary-wrapper .promo {
            margin: 0;
            padding: 11.5px 0;
        }

        #cart .summary-wrapper .currency {
            float: left;
            margin-left: 20px;
        }

        #cart .summary-wrapper .promo-input .col {
            position: relative;
        }

        #cart .summary-wrapper .promo-input input {
            background-color: #E4E8EA;
            border-radius: 0;
            color: #000;
            padding-right: 65px;
        }

        #cart .summary-wrapper .promo-input a.btn-check {
            background-color: transparent;
            border-radius: 0;
            border: none;
            color: #000;
            position: absolute;
            top: 0;
            right: 15px;
            padding: 7px;
        }

        footer.mt-4 {
            margin-top: 0 !important;
        }

        @media (max-width: 1199px) {
            #cart .f-30 {
                margin-right: 0;
            }
        }

        @media (max-width: 991px) {
            html {
                font-size: 14px;
            }

            #cart .container .d-flex {
                flex-direction: column;
            }

            #cart .container .d-flex .f-70 {
                max-width: 100%;
                flex-basis: 100%;
            }

            #cart .container .d-flex .f-30 {
                max-width: 100%;
                flex-basis: 100%;
                margin-right: 0;
            }
        }

        @media (max-width: 420px) {
            html {
                font-size: 13px;
            }

            #cart {
                padding: 1.5rem 0;
            }

            #cart .container {
                padding: 0 1rem;
            }

            #cart h3 {
                margin-top: 1rem;
                text-align: center;
            }

            #cart .hidden {
                display: none;
            }

            #cart .total {
                text-align: center;
            }

            #cart .container .d-flex.mt-5 {
                margin: 15px 0 !important;
            }

            #cart .cart-wrapper > .col-12 > .row {
                padding: 2rem 1rem;
            }

            #cart div.col-8 {
                flex: 0 0 100%;
                max-width: 100%;
                margin-top: 20px;
            }

            #cart .row.mb-5 {
                margin-bottom: 0 !important;
            }

            #cart .form-group label, #cart .form-group select, #cart .sub-total {
                width: 85px;
                margin: 0;
            }

            #cart .form-group {
                width: 100%;
            }

            #cart .form-group label {
                padding: 5px 0;
            }

            #cart .form-group #quantity {
                float: right;
            }

            #cart p.sub-total {
                display: block;
                margin: 1rem auto 0 auto;
                text-align: center;
            }

            #cart .recipient-form-group span {
                padding-left: 0;
            }

            #cart .message-form-group i {
                display: block;
                text-align: center;
            }

            #cart .message-form-group input {
                width: 100%;
                margin-top: 1rem;
                margin-left: 0;
            }

            #cart .summary-wrapper .row .col-sm-6 {
                width: 50%;
            }

            #cart .steps span {
                display: block;
            }

            #cart .steps span:nth-child(even) {
                display: none;
            }

            #cart .row.promo .col-sm-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            #cart .row.promo .col-sm-6:last-child {
                text-align: center !important;
            }

            #cart .row.promo .col-sm-6:last-child .btn-checkout {
                margin: 15px 0;
            }

            #cart .checkout {
                text-align: center;
            }

            #cart .summary-wrapper .row.total {
                text-align: left;
            }

            #cart .summary-wrapper .row.total p {
                font-size: 1.5rem !important;
            }

            footer.mt-4 {
                margin-top: 0 !important;
            }
        }
    </style>
@endsection

@section('body', 'frontend cart')

@section('content')
    <div id="cart">
        <div class="load-background" v-if="loading">
            <div class="load">
                <?xml version = "1.0" encoding = "UTF-8" standalone = "no"?>
                <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="100px" height="100px"
                     viewBox="0 0 128 128" xml:space="preserve"><g>
                        <path d="M64 0L40.08 21.9a10.98 10.98 0 0 0-5.05 8.75C34.37 44.85 64 60.63 64 60.63V0z"
                              fill="#ffb118"/>
                        <path d="M128 64l-21.88-23.9a10.97 10.97 0 0 0-8.75-5.05C83.17 34.4 67.4 64 67.4 64H128z"
                              fill="#80c141"/>
                        <path d="M63.7 69.73a110.97 110.97 0 0 1-5.04-20.54c-1.16-8.7.68-14.17.68-14.17h38.03s-4.3-.86-14.47 10.1c-3.06 3.3-19.2 24.58-19.2 24.58z"
                              fill="#cadc28"/>
                        <path d="M64 128l23.9-21.88a10.97 10.97 0 0 0 5.05-8.75C93.6 83.17 64 67.4 64 67.4V128z"
                              fill="#cf171f"/>
                        <path d="M58.27 63.7a110.97 110.97 0 0 1 20.54-5.04c8.7-1.16 14.17.68 14.17.68v38.03s.86-4.3-10.1-14.47c-3.3-3.06-24.58-19.2-24.58-19.2z"
                              fill="#ec1b21"/>
                        <path d="M0 64l21.88 23.9a10.97 10.97 0 0 0 8.75 5.05C44.83 93.6 60.6 64 60.6 64H0z"
                              fill="#018ed5"/>
                        <path d="M64.3 58.27a110.97 110.97 0 0 1 5.04 20.54c1.16 8.7-.68 14.17-.68 14.17H30.63s4.3.86 14.47-10.1c3.06-3.3 19.2-24.58 19.2-24.58z"
                              fill="#00bbf2"/>
                        <path d="M69.73 64.34a111.02 111.02 0 0 1-20.55 5.05c-8.7 1.14-14.15-.7-14.15-.7V30.65s-.86 4.3 10.1 14.5c3.3 3.05 24.6 19.2 24.6 19.2z"
                              fill="#f8f400"/>
                        <circle cx="64" cy="64" r="2.03"/>
                        <animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-360 64 64"
                                          dur="2700ms" repeatCount="indefinite"></animateTransform>
                    </g></svg>
            </div>
            <div class="load load-text">
                {{--<h5 class="center-align">Please do not refresh your browser when purchase.<br/><br/>--}}
                {{--It takes few minutes for us to process your payment and generating voucher</h5>--}}
            </div>
        </div>
        <div class="container px-6">
            <div class="d-flex aligns-item-center justify-content-between">
                <a onclick="history.go(-1);" class="back"><i class="material-icons">arrow_back</i>Continue Shopping</a>
                <h3 class="text-center">My Shopping Cart</h3>
                <p class="hidden"><i class="material-icons">arrow_back</i>Continue Shopping</p>
            </div>
            <div class="d-flex aligns-item-center justify-content-center mt-5">
                <div class="steps">
                    <span class="active">1. Cart</span>
                    <span>></span>
                    <span>2. Details</span>
                    <span>></span>
                    <span>3. Payment</span>
                    <span>></span>
                    <span>4. Completed</span>
                </div>
            </div>
            <div class="d-flex mt-5">
                <p class="total">
                    <span v-cloak>@{{ purchase.items.length }} items: Total SGD </span>
                    <template v-cloak>@{{ subtotal }}</template>
                </p>
            </div>
        </div>
        <div class="container">
            <div class="d-flex">
                <div class="f-70">
                    <template v-for="(item, index) in giftbox_types">
                        <cart-item
                                :giftbox="item"
                                :item="purchase.items"
                                :status="status"
                                @all="all"
                                @loading="showPreloader">
                        </cart-item>
                    </template>
                </div>
                <div class="f-30">
                    <div class="row m-3">
                        <div class="col-12">
                            <div class="summary-wrapper">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="summary">Order Summary</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Sub Total</p>
                                    </div>
                                    <div class="col-sm-6 text-right" v-cloak><span class="currency">SGD</span>
                                        @{{ subtotal }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="shipping">Shipping</p>
                                    </div>
                                    <div class="col-sm-6 text-right" v-cloak><span class="currency">SGD</span>
                                        @{{ deliveryCharge.toFixed(2) }}
                                    </div>
                                </div>
                                <div class="row total">
                                    <div class="col-sm-6">
                                        <p>Total</p>
                                    </div>
                                    <div class="col-sm-6 text-right" v-cloak><span class="currency">SGD</span>
                                        @{{ grandTotal }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="terms_privacy">By placing your order, you agree to Blissbox's
                                            <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="promo font-weight-bold">Have a Promo code?<br/><small v-if="!status">Login to enjoy your promotion code</small></p>
                                    </div>
                                </div>
                                <div class="row promo-input" v-if="status">
                                    <div class="col">
                                        <input type="text" class="form-control oxygen" id="coupon"
                                               v-model="purchase.couponCode" placeholder="Enter your promo code">
                                        <a v-on:click="coupon" class="btn btn-check text-uppercase">Check</a>
                                    </div>
                                </div>
                                <div class="row mt-4 checkout">
                                    <div class="col">
                                        <a v-on:click="order" class="btn btn-checkout">
                                            Secure Checkout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/frontend/cart.js') }}"></script>
@endsection
