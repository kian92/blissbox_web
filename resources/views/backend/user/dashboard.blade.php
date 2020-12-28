@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('inline-style')
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<style>
    #app {
        width: calc(100% - 300px);
        position: relative;
        left: 300px;
        top: 0;
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
    .card-content {
        background-color: #FECE51;
    }
    @media only screen and (max-width : 720px) {
		#app {
			width: 100%;
		}
    }
</style>
@endsection

@section('body', 'backend dashboard')

@section('content')
    <div class="valign-wrapper">
        <div class="container" id="dashboard">
            <div class="overlay-background" v-if="loading">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <h4 class="center-align" style="margin-bottom: 50px">My Giftbox</h4>
            <div class="row" v-if="giftboxes.length > 0">
                <div class="col s12 m6 l4" v-for="(giftbox, index) in giftboxes">
                    <card :item="giftbox" @loading="showPreloader"></card>
                </div>
            </div>
            <div class="row" v-else>
                <h5 class="center-align">You don't have any giftbox yet.</h5>
            </div>
        </div>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/backend/dashboard/user.js') }}"></script>
@endsection