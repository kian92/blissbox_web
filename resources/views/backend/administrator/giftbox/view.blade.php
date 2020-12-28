@extends('backend.layouts.app')
@section('title', 'List Box')
@section('inline-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        #app {
            width: calc(100% - 300px);
            position: relative;
            left: 300px;
            top: 0;
        }
        .error {
            color: #FF5252 ;
        }
        .valign-wrapper {
            height: 100%;
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
        .card-content {
            background-color: #FECE51;
        }
        .card-action a:last-child {
            margin-right: 0 !important;
        }
        h4 {
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 0;
            color: #FECE51;
        }
    </style>
@endsection
@section('body', 'backend box-list')
@section('content')
    <div class="container" id="view">
        <div class="overlay-background" v-if="loading">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>

        <h4 class="center-align" style="margin-bottom: 50px">Giftbox Details</h4>
        <div class="row">
            <div v-if="items && items.length > 0">
                <div v-cloak v-for="item in items">
                    <!-- @generate bind with child function and @generateAlert bind with parent function -->
                    <card :item="item" @generate="generateVoucher"></card>
                </div>
            </div>
            <div v-else>
                <h5 class="center-align">No Giftbox Details Yet</h5>
            </div>
        </div>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/backend/giftbox/view.js') }}"></script>
@endsection