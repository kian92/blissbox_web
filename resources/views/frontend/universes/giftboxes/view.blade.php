@extends('frontend.layouts.app')

@section('title', "Enjoy Gifting")

@section('inline-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        html {
            font-size: 16px;
        }
        #giftbox-detail {
            padding-bottom: 3rem;
        }
        #hero-banner {
            min-height: 300px;
            background: rgba(0, 0, 0, 0.5) url("/images/frontend/universes/multitheme.jpg") no-repeat center center;
            background-size: cover;
        }
        #giftbox {
            background-color: #FFF;
            z-index: 10;
        }
        #giftbox h1,
        #explore-experiences h1 {
            font-family: 'Quicksand', sans-serif;
            font-size: 3.125rem;
            font-weight: bolder;
        }
        #explore-experiences h1 {
            margin-bottom: 2rem;
        }
        #explore-experiences p {
            font-family: Oxygen, sans-serif;
        }
        #giftbox .container {
            position: relative;
            padding: 65px 75px;
            background-color: #FFF;
        }
        #giftbox .f-50,
        #explore-experiences .f-50 {
            flex-basis: 50%;
            max-width: 50%;
        }
        #giftbox .title,
        #amazing-experiences .title {
            font-size: 1.45rem;
            font-weight: bold;
            margin: 2rem 0;
        }
        #giftbox .img-showcase {
            width: 300px;
            justify-content: center;
            align-items: center;
        }
        #giftbox h5 {
            font-family: 'Oxygen', sans-serif;
            display: block;
            font-weight: bold;
            letter-spacing: 3px;
            color: rgba(0, 0, 0, 0.7);
        }
        #giftbox .description {
            font-size: 0.875rem;
        }
        #amazing-experiences .title {
            margin: 3rem 0;
        }
        #giftbox .price,
        #amazing-experiences .price {
            font-family: 'Oxygen', sans-serif;
            font-weight: bolder;
            font-size: 1.5625rem;
            margin: 40px 0;
        }
        #giftbox .review i,
        #amazing-experiences .review i {
            font-size: 0.875rem;
            color: #F4821E;
        }
        #giftbox .review a i {
            cursor: pointer;
        }
        #giftbox .btn-favourite i.favourite {
            color: #F50057;
        }
        #giftbox .review span {
            font-size: 0.875rem;
        }
        #giftbox .btn-cart {
            text-transform: uppercase;
            padding: 14px 30px;
            background-color: #FECE51;
            border-radius: 31px;
            color: #FFF;
            text-decoration: none;
            margin-right: 25px;
        }
        #giftbox .btn-favourite {
            position: relative;
            margin-right: 25px;
            cursor: pointer;
        }
        #giftbox .btn-favourite i {
            position: absolute;
            left: 0;
            color: #9E9E9E;
        }
        #giftbox .btn-favourite span {
            margin-left: 35px;
            color: #9E9E9E;
        }
        #giftbox .btn-share {
            color: #9E9E9E;
            text-decoration: none;
            cursor: pointer;
        }
        #giftbox .btn-share i {
            margin-right: 10px;
        }
        #giftbox .action-panel {
            margin-left: -10px;
        }
        #explore-experiences .d-flex {
            background-color: #EFEDEC;
            padding: 0 50px;
        }
        #explore-experiences .d-flex div {
            width: 50%;
        }
        a.btn-catalog {
            font-weight: bold;
            text-decoration: none;
            color: #FECE51;
            padding: 10px 30px;
            border: 1px solid #FECE51;
            display: inline-block;
            margin-top: 5px;
            border-radius: 50px;
        }
        #guarantees {
            background-color: #EFEDEC;
        }
        #guarantees .justify-content-evenly {
            justify-content: space-evenly;
        }
        #guarantees .justify-content-evenly i,
        #why-choose i {
            margin-right: 10px;
        }
        #guarantees .guarentee,
        #why-choose .reason {
            font-family: 'Oxygen', sans-serif;
            font-weight: bold;
            font-size: 1.375rem;
        }
        #why-choose h2 {
            font-size: 2.2rem;
        }
        #why-choose > .d-flex .d-flex {
            padding: 0 1.5rem;
        }
        #why-choose .reason {
            flex-basis: 33.33%;
            max-width: 33.33%;
        }
        #why-choose .reason i,
        #guarantees .guarentee i {
            color: #05AC89;
        }
        #why-choose .btn-how-it-works {
            margin: 0 auto;
        }
        #universes .owl-carousel .owl-item img {
            width: auto;
            margin: 0 auto;
        }
        #giftbox .at-label {
            display: none;
        }
        #universes .img-wrapper {
            background-color: #EFEDEC;
            position: relative;
            width: 100%;
            min-height: 300px;
        }
        #universes .img-wrapper img {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        #universes .price {
            font-family: 'Oxygen', sans-serif;
            font-size: 1.25rem;
        }
        #universes .review i {
            font-size: 0.875rem;
            color: #F4821E;
        }
        @media (max-width: 1199px) {
            html {
                font-size: 14px;
            }
            #universe h3::after {
                height: 2%;
            }
        }
        @media (max-width: 991px) {
            html {
                font-size: 14px;
                font-size: 14px;
            }
            #universe h3::after {
                height: 1%;
            }
        }
        @media (max-width: 767px) {
            html {
                font-size: 14px;
            }
            #universe h3::after {
                height: 1%;
            }
            #explore-experiences .d-flex {
                flex-direction: column;
            }
            #explore-experiences .d-flex .f-50 {
                width: auto;
                max-width: 100%;
                flex-basis: 100%;
            }
            #guarantees .justify-content-evenly {
                flex-direction: row !important;
            }
            a.btn-catalog {
                margin: 0 auto;
                display: block;
                text-align: center;
            }
            html {
                font-size: 14px;
            }
            #universe h3::after {
                height: 1%;
            }
            #giftbox .container {
                padding: 15px 20px;
            }
            #giftbox .giftbox-wrapper {
                flex-direction: column;
            }
            #giftbox .f-50, #explore-experiences .f-50 {
                padding-top: 2rem;
                flex-basis: 100%;
                max-width: 100%;
            }
            #giftbox .action-panel {
                flex-direction: column;
            }
            #giftbox .action-panel a {
                margin: 15px 0;
            }
            #giftbox .price, #amazing-experiences .price {
                text-align: center;
            }
            #giftbox .price {
                margin: 2rem 0;
            }
            #giftbox .btn-cart {
                width: 100%;
            }
            #explore-experiences .d-flex {
                flex-direction: column;
                text-align: center;
            }
            #explore-experiences .d-flex div {
                width: 100%;
            }
            #explore-experiences .d-flex .f-50 {
                width: auto;
                max-width: 100%;
                flex-basis: 100%;
            }
            #explore-experiences .d-flex .f-50:last-child {
                margin-top: 2rem;
            }
            #explore-experiences a.btn-catalog {
                margin: 0 auto;
            }
            #guarantees {
                margin: 3rem 0;
            }
            #guarantees .justify-content-evenly {
                flex-direction: column;
            }
            #guarantees .justify-content-evenly .guarentee {
                margin: 1rem 0;
                padding: 0 2rem;
                text-align: left;
            }
            #why-choose > .d-flex .d-flex {
                margin-top: 2rem;
                flex-direction: column;
            }
            #why-choose .reason {
                flex-basis: 100%;
                max-width: 100%;
                margin: 1rem 0;
                padding: 0 2rem;
                text-align: left;
            }
        }
    </style>
@endsection

@section('body', 'frontend multitheme')

@section('content')
    <div id="giftbox-detail" v-if="item">
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
                    {{--<img src="{{ asset('images/frontend/universes/multitheme.jpg') }}" class="img-fluid" alt="Emotion As Gift" />--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        <section id="giftbox">
            <div class="container">
                <div class="d-flex justify-content-center align-self-stretch giftbox-wrapper">
                    <div class="flex-row d-flex justify-content-center align-items-center f-50">
                        <div class="img-showcase">
                            <img v-bind:src="'/storage/giftboxes/' + item.thumbnail" v-bind:alt="item.name" class="img-fluid" />
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-evenly f-50 px-5">
                        <h5><template v-cloak>@{{ item.universe ? item.universe['name']  : '' }}</template></h5>
                        <h2 class="my-3" v-cloak>@{{ item.name }}</h2>
                        <p class="review">
                            <template v-for="i in 5">
                                <template v-if="item.review >= i">
                                    <a v-on:click="review(item.id, i)"><i class="material-icons">star</i></a>
                                </template>
                                <template v-else>
                                    <a v-on:click="review(item.id, i)"><i class="material-icons">star_border</i></a>
                                </template>
                            </template>
                            <span v-cloak>
                                @{{ total_user }} review(s)
                            </span>
                        </p>
                        <h5 style="margin-top: 20px;">About this box</h5>
                        <p class="description" v-cloak>
                            @{{ item['description'] }}
                        </p>

                        <p v-if="item.id === 1">
                            <a v-bind:href="'/universe/giftbox/experience/' + item.id" class="btn-catalog" target="_blank">View Experience</a>
                        </p>
                        <p v-else>
                            <a v-bind:href="item.pdf_url" class="btn-catalog" target="_blank">View Experience</a>
                        </p>

                        <p class="price" v-if="item['price']" v-cloak>SGD @{{ (item['price'] / 100).toFixed(2) }}</p>
                        <div class="d-flex align-items-center action-panel" v-if="item['price']">
                            <a v-on:click="addToCart(item.thumbnail, item.name, item.id, item.price)" class="btn btn-cart">Add To Cart</a>
                            <template v-if="wishlist">
                                <a v-on:click="removeWishlist(item.id)" class="btn-favourite">
                                    <i class="material-icons favourite">favorite</i>
                                    <span>Remove from Wishlist</span>
                                </a>
                            </template>
                            <template v-else>
                                <a v-on:click="addWishlist(item.id)" class="btn-favourite">
                                    <i class="material-icons"><i class="material-icons">favorite_border</i></i>
                                    <span>Add to Wishlist</span>
                                </a>
                            </template>
                            <div>
                                <!--
                                <a v-on:click="shareSocial" class="btn-share">
                                    <i class="fa fa-share-square-o" aria-hidden="true"></i>
                                    Share
                                </a>
                                -->
                                <div class="addthis_inline_share_toolbox"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--
        <section id="explore-experiences">
            <div class="container">
                <div class="d-flex align-items-center p-5">
                    <div class="f-50">
                        <div>
                            <h1>Inside the Box</h1>
                            <p>Offer a moment of well-being for 1 person.</p>
                            <p>
                                Choose from 3950 treatments:
                                Body sculptures, balneotherapy, scrubs and other facial treatments.
                            </p>
                        </div>
                    </div>
                    <div class="f-50">
                        <img src="{{ asset('/images/frontend/giftbox/giftbox.png') }}" alt="Enjoy Gifting" class="img-fluid" />
                    </div>
                </div>
            </div>
        </section>
        -->
        <section id="guarantees" class="py-5">
            <div class="container">
                <div class="d-flex my-7 align-item-center flex-column text-center">
                    <div class="d-flex text-center justify-content-evenly">
                        <div class="guarentee">
                            <img src="{{ asset('/images/frontend/giftbox/exchange.png') }}" class="img-fluid" alt="Exchange" width="200" />
                            <br/>
                            {{--<i class="fa fa-check-circle" aria-hidden="true"></i> First time exchange free--}}
                        </div>
                        <div class="guarentee">
                            <img src="{{ asset('/images/frontend/giftbox/renewable.png') }}" class="img-fluid" alt="Exchange" width="200" />
                            <br/>
                            {{--<i class="fa fa-check-circle" aria-hidden="true"></i>Valid 1 year and renewable--}}
                        </div>
                        <div class="guarentee">
                            <img src="{{ asset('/images/frontend/giftbox/warranty.png') }}" class="img-fluid" alt="Exchange" width="200" />
                            <br/>
                            {{--<i class="fa fa-check-circle" aria-hidden="true"></i>Free warranty against loss or theft--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="universes" class="my-5">
            <div class="container">
                <div class="d-flex my-7 align-item-center flex-column text-center">
                    <h1>You Might Also Be Interested In... !</h1>
                </div>
            </div>
            <div class="container mt-5">
                <div class="owl-carousel owl-theme universe-owl-carousel">
                    <div class="item" v-for="item in recommendedItems">
                        <div class="img-wrapper">
                            <img v-bind:src="'/storage/giftboxes/' + item.thumbnail" v-bind:alt="item.name" class="img-fluid" />
                        </div>
                        <p class="price mt-3">@{{ item.name }}</p>
                        <p class="price">@{{ (item.price / 100).toFixed(2) }}</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="why-choose">
            <div class="d-flex my-5 align-item-center flex-column text-center">
                <h2>Reasons to Choose Blissbox?</h2>
                <div class="d-flex text-center justify-content-evenly mt-5">
                    <div class="reason">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> We offer curated set of experiences
                    </div>
                    <div class="reason">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>It's easy to buy, use and enjoy
                    </div>
                    <div class="reason">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>Choice to personalise your gifts
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('inline-script')
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59f30b5eb61dbfd3"></script>
    <script src="{{ asset('js/frontend/giftbox.js') }}"></script>
@endsection