@extends('backend.layouts.app')

@section('title', 'Universe')

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
        color: #FF5252;
    }
    .valign-wrapper {
        height: 100%;
        flex-direction: column;
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

@section('body', 'backend universe')

@section('content')
<div class="valign-wrapper">
    <div class="container" id="view">
        <div class="overlay-background" v-if="loading">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>

        <h4 class="center-align" style="margin-bottom: 50px">Universe Details</h4>

        <div class="row valign-wrapper">
            <div class="col s12" v-if="items && items.length > 0" v-cloak>
                <ul class="collection"  v-for="item in items">
                    <!-- @generate bind with child function and @generateAlert bind with parent function -->
                    <collection :item="item" @refresh="all"></collection>
                </ul>
            </div>
            <div v-else>
                <h5 class="center-align">No Universe Details Yet</h5>
            </div>
        </div>
    </div>
</div>
@endsection
@section('inline-script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/backend/universe/view.js') }}"></script>
@endsection