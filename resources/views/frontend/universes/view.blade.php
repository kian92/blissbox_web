@extends('frontend.layouts.app')

@section('title', $universe)

@section('inline-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        #hero-banner {
            max-height: 300px;
            overflow: hidden;
        }
        #giftboxes {
            background-color: #FFF;
            z-index: 10;
        }
        #giftboxes h1 {
            font-family: 'Quicksand', sans-serif;
            font-size: 3.125rem;
            font-weight: bolder;
        }
        #giftboxes .container {
            position: relative;
            margin-top: 0;
            padding: 65px 75px;
            background-color: #FFF;
        }
        #giftboxes .container > p {
            font-family:'Oxygen', sans-serif;
            font-size: 1.125rem;
            width: 80%;
            margin: 4rem auto;
        }
        #giftboxes .title {
            height: 60px;
        }
        #giftboxes .title,
        #amazing-experiences .title {
            font-size: 1.45rem;
            font-weight: bold;
            margin: 2rem 0;
        }
        #giftboxes .img-wrapper {
            background-color: #EFEDEC;
            position: relative;
            width: 100%;
            min-height: 300px;
        }
        #giftboxes .img-wrapper img {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        #giftboxes a.btn-add-to-cart,
        #giftboxes a.btn-learn-more {
            text-transform: uppercase;
            background-color: #FECE51;
            padding: 10px 20px;
            border-radius: 25px;
            color: #FFF;
            cursor: pointer;
            display: block;
            width: calc(100% - 20px);
            margin: 0 10px 10px 10px;
        }
        #giftboxes .title {
            margin-bottom: 12px;
        }
        #giftboxes .item {
            text-align: center;
        }
        #amazing-experiences .title {
            margin: 3rem 0;
        }
        #giftboxes .price,
        #amazing-experiences .price {
            font-family: 'Oxygen', sans-serif;
            font-size: 1.25rem;
        }
        #giftboxes .review i,
        #amazing-experiences .review i {
            font-size: 0.875rem;
            color: #F4821E;
        }
        #amazing-experiences-background {
            height: 340px;
        }
        #amazing-experiences-background.Multitheme {
            background-color: #9752A0;
        }
        #amazing-experiences-background.Gastronomy {
            background-color: #DC1C4D;
        }
        #amazing-experiences-background.Wellness {
            background-color: #05AC89;
        }
        #amazing-experiences-background.Adventure {
            background-color: #F4821E;
        }
        #amazing-experiences-background.Stay {
            background-color: #0776BD;
        }
        #amazing-experiences-background h4 {
            font-size: 1.75rem;
            padding-top: 70px;
            color: #FFF;
        }
        #amazing-experiences {
            position: relative;
            margin-top: -170px;
        }
        #amazing-experiences .owl-nav {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
        }
        #amazing-experiences .owl-prev {
            float: left;
            margin-left: 20px;
        }
        #amazing-experiences .owl-next {
            float: right;
            text-align: right;
            margin-right: 30px;
        }
        #amazing-experiences .owl-carousel .owl-stage-outer {
            padding-bottom: 35px;
        }
        #amazing-experiences .fa-angle-right:before {
            margin-right: 2px;
        }
        #amazing-experiences .experiences-owl-carousel .item {
            border: 1px solid #E1E1E1;
            -webkit-box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);
            box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);
            text-align: center;
        }
        #amazing-experiences .experiences-owl-carousel .item .content {
            padding: 2rem;
        }
        #amazing-experiences .experiences-owl-carousel .item .content p {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            font-size: 1.4rem;
        }
        #amazing-experiences .experiences-owl-carousel .item div {
            padding: 0;
        }
        #amazing-experiences .experiences-owl-carousel a.btn-learn-more {
            padding: 14px 50px;
            border: 1px solid #45474C;
            color: #45474C;
            border-radius: 31px;
            text-decoration: none;
        }
        #amazing-experiences .fa {
            font-size: 30px;
            padding: 15px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50px;
            width: 50px;
            height: 50px;
            line-height: 18px;
            color: #FFF;
        }
        #amazing-experiences .experience-bg {
            background-color: #FFF;
        }
        #universe h3 {
            font-family: 'Oxygen', sans-serif;
            font-weight: normal;
        }
        #universe h3 {
            margin-bottom: 3rem;
            position: relative;
            padding-bottom: 50px;
            line-height: 1.5;
        }
        #universe h3::after {
            position: absolute;
            bottom: 0;
            left: 50%;
            padding: 0;
            width: 50%;
            height: 2%;
            z-index: 50;
            content: '';
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
            transform: translateX(-50%);
            background: -webkit-gradient(linear, left top, right top, from(rgba(255, 206, 81, 0)), color-stop(#F4821E), color-stop(#DC1C4D), color-stop(#F8A491), color-stop(#D76EAB), color-stop(#9752A0), color-stop(#53489E), color-stop(#0776BD), color-stop(#7fC6EE), color-stop(#7FC6EE), color-stop(#35C2D6), color-stop(#05AC89), to(rgba(126, 205, 195, 0)));
            background: linear-gradient(to right, rgba(255, 206, 81, 0), #F4821E, #DC1C4D, #F8A491, #D76EAB, #9752A0, #53489E, #0776BD, #7fC6EE, #7FC6EE, #35C2D6, #05AC89, rgba(126, 205, 195, 0));
        }
        #universe .owl-item img {
            width: initial;
            margin: 0 auto;
        }
        #universe .owl-item a {
            text-decoration: none;
            color: #000;
        }
        #universe .btn-universe,
        .btn-cart,
        .btn-dismiss {
            background-color: #FECE51;
            margin: 0 auto;
            padding: 7px 40px;
            border-radius: 31px;
            text-transform: uppercase;
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
            display: inline-block;
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
            margin: 0;
            padding: 0;
        }
        #newsletter {
            background-color: #EFEDEC;
        }
        #newsletter h3::after {
            background: transparent !important;
        }
        footer.mt-4 {
            margin-top: 0 !important;
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
            #newsletter .form-group {
                width: 100%;
            }
            #newsletter .f-50 {
                flex-basis: 100%;
                flex-wrap: wrap;
            }
            #multitheme h3::after {
                height: 1%;
            }
        }
        @media (max-width: 420px) {
            html {
                font-size: 14px;
            }
            #universe h3::after {
                height: 1%;
            }
            #giftboxes .container {
                padding: 15px 20px;
                margin-top: 0;
            }
            #giftboxes .owl-carousel .owl-item .giftbox {
                margin: 0 40px;
            }
        }
    </style>
@endsection

@section('body', 'frontend universe')

@section('content')
    <div id="universe">
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
                    <img src="{{ asset('images/frontend/universes/' . $universe . '.jpg') }}" class="img-fluid" alt="Emotion As Gift" />
                </div>
            </div>
        </section>
        <section id="giftboxes">
            <div class="container">
                <h1 class="text-center" v-cloak v-if="universe ">@{{ universe.name }}</h1>
                <p class="text-center" v-cloak v-if="universe">@{{ universe.description }}</p>
                <div class="owl-carousel owl-theme giftboxes-owl-carousel">
                    <template v-if="giftboxes.length > 0">
                        <div class="item" v-for="(giftbox, index) in giftboxes">
                            <div class="giftbox">
                                <div class="img-wrapper">
                                    <img v-bind:src="'/storage/giftboxes/' + giftbox.thumbnail" v-bind:alt="giftbox.name" class="img-fluid" />
                                </div>

                                <p class="title" v-cloak v-cloak v-if="giftbox">@{{ giftbox.name }}</p>
                                <p class="price" v-cloak v-cloak v-if="giftbox">SGD @{{ (giftbox.price / 100).toFixed(2) }}</p>
                                <p class="review">
                                    <template v-for="i in 5">
                                        <template v-if="giftbox.review >= i">
                                            <i class="material-icons">star</i>
                                        </template>
                                        <template v-else>
                                            <i class="material-icons">star_border</i>
                                        </template>
                                    </template>
                                    <span v-cloak>
                                        @{{ total_user[index] }} review(s)
                                    </span>
                                </p>

                                <a v-on:click="addToCart(giftbox.thumbnail, giftbox.name, giftbox.id, giftbox.price)" v-bind:class="'btn-add-to-cart btn-' + giftbox.slug">Add to Cart</a>
                                <a v-bind:href="universe.name.toLowerCase() + '/giftboxes/' + giftbox.id" v-bind:class="'btn-learn-more btn-' + giftbox.slug">Learn More</a>

                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="item">
                            <div class="giftbox">
                                <div class="img-wrapper">
                                    <img src="http://www.shroyco.com/sites/default/files/coming-soon_0.jpg" class="img-fluid" name="Coming Soon" />
                                </div>
                                <p class="title">Coming Soon</p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>
        <section id="amazing-experiences-background" v-bind:class="universe ? universe.name : ''">
            <h4 class="text-center">Amazing Experiences</h4>
        </section>

        <section id="amazing-experiences">
            <div class="owl-carousel owl-theme experiences-owl-carousel">
                <div class="item" v-for="experience in experiences">
                    <div class="experience-bg">
                        <div class="experience">
                            <div>
                                <img v-bind:src="'/storage/experiences/' + experience.thumbnail" v-bind:alt="experience.name" class="img-fluid" />
                            </div>
                            <div class="content">
                                <p class="title" v-cloak>@{{ experience.name }}</p>
                                <a href="#" v-on:click="showModal(experience.thumbnail, experience.name, experience.information, experience.giftboxes)" v-bind:class="'btn-learn-more btn-' + experience.slug">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--
        <section id="universe" class="my-5">
            <div class="container">
                <div class="d-flex my-7 align-item-center flex-column text-center">
                    <h3>A hint of well-being, a great weekend, a great thrill, a dinner at the table of great chefs ...
                        These magical moments packs bring together the best of our experiences to live!</h3>
                </div>
            </div>
            <div class="container mt-5">
                <div class="owl-carousel owl-theme universe-owl-carousel">
                    <div class="item">
                        <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" class="img-fluid" />
                    </div>
                    <div class="item">
                        <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" class="img-fluid"/>
                    </div>
                </div>
                {{--<div class="d-flex text-center justify-content-evenly mt-5">--}}
                    {{--<a class="btn btn-universe">View Full Multi-Themes Collection</a>--}}
                {{--</div>--}}
            </div>
        </section>
        -->
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
        <div class="modal fade" id="experienceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">@{{ modal.name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-wrapper">
                            <template v-if="modal.thumbnail">
                                <img v-bind:src="'/storage/experiences/' + modal.thumbnail" v-bind:alt="modal.name" class="img-fluid" />
                            </template>
                        </div>
                        <ul class="mt-4">
                            <template v-for="info in modal.information">
                                <li>@{{ info }}</li>
                            </template>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        {{--<a v-on:click="addToCart(modal.giftboxes[0].thumbnail, modal.giftboxes[0].name, modal.giftboxes[0].id, modal.giftboxes[0].price)" class="btn btn-secondary">Add To My Wishlist</a>--}}
                        <a v-on:click="addToCart(modal.giftboxes[0].thumbnail, modal.giftboxes[0].name, modal.giftboxes[0].id, modal.giftboxes[0].price)" class="btn btn-cart">Add To Cart</a>
                        <button type="button" class="btn btn-dismiss" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/frontend/universe.js') }}"></script>
@endsection