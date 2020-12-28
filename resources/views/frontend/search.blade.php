@extends('frontend.layouts.app')

@section('title', 'Search')

@section('inline-style')
    <style>
        #search {
            min-height: 500px;
            padding: 4rem 0;
        }
        #search .card {
            margin: 1rem;
        }
        #search .card-body {
            text-align: center;
        }
        #search h4 {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            font-size: 1rem;
        }
        #search ul {
            text-align: left;
        }
        #search li {
            font-size: 1rem;
        }
        #search .btn-learn-more {
            background-color: #FECE51;
            padding: 10px 25px;
            border-radius: 23px;
            color: rgba(0, 0, 0, 0.7);
        }
    </style>
@endsection

@section('body', 'frontend')

@section('content')
    <div class="container" id="search">
        @if(count($experiences) > 0)
            <div class="d-flex flex-row flex-wrap justify-content-center">
            @foreach($experiences AS $experience)
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{ asset('/storage/experiences/' . $experience['thumbnail']) }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{ $experience['name'] }}</h4>
                    <p class="card-text">
                        <ul>
                        @foreach($information AS $info)
                            <li>{{ $info }}</li>
                        @endforeach
                        </ul>
                    </p>
                    <a href="{{ url('/universe/giftboxes/' . $experience->giftboxes[0]['pivot']['giftbox_id']) }}" class="btn btn-learn-more">Learn More</a>
                </div>
            </div>
        @endforeach
        </div>
        @else
            <div class="d-flex justify-content-center aligns-item-center">
                <h1 class="text-center">No Experience Found.</h1>
            </div>
        @endif
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/frontend/search.js') }}"></script>
@endsection