@extends('backend.layouts.app')

@section('title', 'EVoucher')

@section('inline-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        #app {
            width: calc(100% - 300px);
            position: relative;
            left: 300px;
            top: 0;
            height: 100%;
        }
        .error {
            color: #FF5252 ;
        }
        .valign-wrapper {
            height: 100%;
            flex-direction: row;
        }
        .overlay-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 900;
            background-color: rgba(254, 206, 81, 0.5);
        }
        h4 {
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 0;
            color: #FECE51;
        }

        @media only screen and (max-width: 992px) {
            .valign-wrapper {
                flex: 0 0 80%;
            }
        }
    </style>
@endsection

@section('body', 'backend voucher-success')

@section('content')
    <div class="valign-wrapper">
        <div class="container" id="success">
            <div class="row">
                <h5>{{ $message }}</h5>
            </div>
        </div>
    </div>
@endsection
@section('inline-script')
@endsection