@extends('frontend.layouts.app')

@section('title', 'Our Collections')

@section('inline-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>

        #collection {
            min-height: 500px;
            padding: 4rem 0;
        }
        #collection .card {
            margin: 1rem;
        }
        #collection .card-body {
            text-align: center;
        }
        #collection h4 {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            font-size: 1rem;
            font-weight: bolder;
        }
        #collection ul {
            text-align: left;
        }
        #collection li {
            font-size: 1rem;
        }
        #collection .btn-learn-more {
            background-color: #FECE51;
            padding: 10px 25px;
            border-radius: 23px;
            color: rgba(0, 0, 0, 0.7);
        }
    </style>
@endsection

@section('body', 'frontend universe')

@section('content')
    <div class="container" id="collection">
        <div class="d-flex flex-row flex-wrap justify-content-center" v-if="items" v-cloak>

            <div class="card" v-cloak style="width: 20rem;" v-for="item in items">
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
                    <a v-bind:href="'/universe/giftbox/' + item.id" class="btn btn-learn-more mb-2">Learn More</a>
                    <a v-on:click="addToCart(item.thumbnail, item.name, item.id, item.price)" v-bind:class="'btn btn-learn-more btn-' + item.slug">Add To Cart</a>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center aligns-item-center" v-else v-cloak>
            <h1 class="text-center" v-cloak>No Giftboxes Found.</h1>
        </div>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/frontend/collection.js') }}"></script>
@endsection