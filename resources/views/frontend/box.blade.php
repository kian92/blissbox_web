@extends('frontend.layouts.app')

@section('title', 'Our Collections')

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

<div class="d-flex">
    <div class="card" v-cloak style="width: 20rem;" v-for="item in filteredList">
        <img class="card-img-top" v-bind:src="'/storage/experiences/' + item.thumbnail" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">@{{ item['name'] }}</h4>
            <p class="card-text" style="height: 70px;">
                {{--<ul>--}}
                {{--<li v-for="information in info">--}}
                {{--@{{ information }}--}}
                {{--</li>--}}
                {{--</ul>--}}
                @{{ item['address'] }}
            </p>
            <a v-on:click="addToCart(item.giftboxes[0].thumbnail, item.giftboxes[0].name, item.giftboxes[0].id, item.giftboxes[0].price)" v-bind:class="'btn btn-learn-more btn-' + item.slug">Add To Cart</a>
        </div>
    </div>
</div>

@section('content')

@endsection
