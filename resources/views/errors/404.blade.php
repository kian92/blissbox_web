@extends('frontend.layouts.app')

@section('title', '404 Not Found')

@section('inline-style')
    <style>
        .error-page-not-found .d-flex {
            min-height: 500px !important;
        }
        .btn-404 {
            background-color: #FECE51;
            padding: 10px 45px;
            border-radius: 23px;
            color: white;
        }
    </style>
@endsection

@section('body', 'frontend 404')

@section('content')
    <div id="404" class="error-page-not-found">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <img src="{{ asset('images/frontend/404.png') }}" class="img-fluid" alt="404" />
                <p>Sorry, the page you’re looking for does not exist in this universe.</p>

                <p>It’s time to head back to previous page or</p>
                <a href="{{ url('/') }}" class="btn btn-404">Back to Home</a>
            </div>
        </div>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/frontend/common.js') }}"></script>
@endsection