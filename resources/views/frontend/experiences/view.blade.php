@extends('frontend.layouts.app')

@section('title', 'Search')

@section('inline-style')
    <style>
        #experiences {
            min-height: 500px;
            padding: 4rem 0;
        }
        #experiences .card {
            margin: 1rem;
        }
        #experiences .card-body {
            text-align: center;
        }
        #experiences h4 {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            font-size: 1rem;
            font-weight: bolder;
        }
        #experiences ul {
            text-align: left;
        }
        #experiences li {
            font-size: 1rem;
        }
        #experiences .btn-learn-more {
            background-color: #FECE51;
            padding: 10px 25px;
            border-radius: 23px;
            color: rgba(0, 0, 0, 0.7);
        }
    </style>
@endsection

@section('body', 'frontend')

@section('content')
    <div class="container" id="experiences">
        <div class="load-background" v-if="loading">
            <div class="load">
                <?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="100px" height="100px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M64 0L40.08 21.9a10.98 10.98 0 0 0-5.05 8.75C34.37 44.85 64 60.63 64 60.63V0z" fill="#ffb118"/><path d="M128 64l-21.88-23.9a10.97 10.97 0 0 0-8.75-5.05C83.17 34.4 67.4 64 67.4 64H128z" fill="#80c141"/><path d="M63.7 69.73a110.97 110.97 0 0 1-5.04-20.54c-1.16-8.7.68-14.17.68-14.17h38.03s-4.3-.86-14.47 10.1c-3.06 3.3-19.2 24.58-19.2 24.58z" fill="#cadc28"/><path d="M64 128l23.9-21.88a10.97 10.97 0 0 0 5.05-8.75C93.6 83.17 64 67.4 64 67.4V128z" fill="#cf171f"/><path d="M58.27 63.7a110.97 110.97 0 0 1 20.54-5.04c8.7-1.16 14.17.68 14.17.68v38.03s.86-4.3-10.1-14.47c-3.3-3.06-24.58-19.2-24.58-19.2z" fill="#ec1b21"/><path d="M0 64l21.88 23.9a10.97 10.97 0 0 0 8.75 5.05C44.83 93.6 60.6 64 60.6 64H0z" fill="#018ed5"/><path d="M64.3 58.27a110.97 110.97 0 0 1 5.04 20.54c1.16 8.7-.68 14.17-.68 14.17H30.63s4.3.86 14.47-10.1c3.06-3.3 19.2-24.58 19.2-24.58z" fill="#00bbf2"/><path d="M69.73 64.34a111.02 111.02 0 0 1-20.55 5.05c-8.7 1.14-14.15-.7-14.15-.7V30.65s-.86 4.3 10.1 14.5c3.3 3.05 24.6 19.2 24.6 19.2z" fill="#f8f400"/><circle cx="64" cy="64" r="2.03"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-360 64 64" dur="2700ms" repeatCount="indefinite"></animateTransform></g></svg>
            </div>
            <div class="load load-text" v-cloak>
                {{--<h5 class="center-align">Please do not refresh your browser when purchase.<br/><br/>--}}
                {{--It takes few minutes for us to process your payment and generating voucher</h5>--}}
            </div>
        </div>
            <div class="d-flex flex-row flex-wrap justify-content-center" v-if="items" v-cloak>
                <div class="container">
                    <input type="text" class="form-control" placeholder="Type to search the experience you want" v-model="search">
                </div>

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
            <div class="d-flex justify-content-center aligns-item-center" v-else v-cloak>
                <h1 class="text-center" v-cloak>No Experience Found.</h1>
            </div>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/frontend/experience.js') }}"></script>
@endsection