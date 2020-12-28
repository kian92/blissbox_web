@extends('backend.layouts.app')

@section('title', 'Giftbox Experience')

@section('inline-style')
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
    .title-column, .value-column {
    	padding: 10px !important;
    	border: 1px solid #EEE;
    }
    .main-header {
        line-height: 0;
        padding: 0;
        border: none;
    }
    .collapsible-title {
    	background-color: #FECE51;
    }
    table th {
        border-radius: 0px;
    }
    .img-wrapper {
        width: 40%;
    }
    .wrapper.title {
        padding-left: 40px;
    }
    [v-cloak] {
    	display: none;
    }
    .embed-container {
        position: relative; padding-bottom:56.25%; height:0; overflow: hidden; max-width: 100%;
    }
    .embed-container iframe, .embed-container object, .embed-container embed {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
    }
    iframe {
        width: 100%;
        height: 500px;
    }
    @media only screen and (max-width : 720px) {
		#app {
			width: 100%;
		}
    }
</style>
@endsection

@section('body', 'backend giftbox-experience')

@section('content')
    <div class="valign-wrapper">
        <div class="container" id="giftbox-experience">
        	<div class="overlay-background" v-if="loading">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <h4 class="center-align" style="margin-bottom: 50px">Experiences</h4>
			<div class="row">
                {{--<ul class="collapsible" data-collapsible="accordion">--}}
                    {{--<template v-for="experience in experiences">--}}
                        {{--<collapsible :experience="experience"></collapsible>--}}
                    {{--</template>--}}
                {{--</ul>--}}
                <iframe style="width:100%; height:500px;" src="//e.issuu.com/embed.html#31300057/53935415" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection
@section('inline-script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/backend/experience/experience.js') }}"></script>
<script>
$(document).ready(function(){
    $('.collapsible').collapsible();
});
</script>
@endsection