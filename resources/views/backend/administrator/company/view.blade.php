@extends('backend.layouts.app')

@section('title', 'List Company')

@section('inline-style')
<style>
	#app {
        width: calc(100% - 300px);
        position: relative;
        left: 300px;
        top: 0;
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
    .card .card-content .card-title {
    	margin-bottom: 30px;
    }
	.collapsible.popout > .active .collapsible-header {
		background-color: #FECE51;
	}
    @media only screen and (max-width: 992px) {
        .valign-wrapper {
            flex: 0 0 80%;
        }
    }
</style>
@endsection

@section('body', 'backend company-list')

@section('content')
<div class="valign-wrapper">
	<div class="container" id="view">
        <div class="overlay-background" v-if="loading">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>

        <h4 class="center-align" style="margin-bottom: 50px">Company Details</h4>

        {{--<div>--}}
            {{--<div class="row">--}}
                {{--<div class="col s12">--}}
                    {{--<ul class="collapsible popout" data-collapsible="accordion">--}}
                        {{--<template v-for="company in companies">--}}
                            {{--<collapsible :company="company"></collapsible>--}}
                        {{--</template>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <ais-index app-id="{{ env('ALGOLIA_APP_ID') }}"
                   api-key="{{ env('ALGOLIA_SEARCH') }}"
                   index-name="{{ env('SCOUT_PREFIX') }}companies"
                   :query-parameters="{'page': page}">

            <ais-input placeholder="Search Company"></ais-input>

            <ais-results inline-template :stack="true">
                <ul class="collapsible popout" data-collapsible="accordion">
                    <template v-for="result in results">
                        <collapsible :company="result"></collapsible>
                    </template>
                </ul>
            </ais-results>

            <ais-no-results></ais-no-results>

            <div v-observe-visibility="loadMore">Loading more...</div>

        </ais-index>
    </div>
</div>
@endsection

@section('inline-script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/backend/company/view.js') }}"></script>
@endsection