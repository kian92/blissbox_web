@extends('backend.layouts.app')

@section('title', 'Booking')

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
        h4 {
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 0;
            color: #FECE51;
        }
    </style>
@endsection

@section('body', 'backend booking')

@section('content')
    <div class="container" id="view">
        <div class="overlay-background" v-if="loading">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>

        <h4 class="center-align" style="margin-bottom: 50px">Search Your Booking</h4>
        <div class="row">
            <div class="input-field col s12">
                <select id="experience">
                    <option value="" disabled selected>Choose your option</option>
                    <option v-for="experience in experiences" v-bind:value="experience.id">@{{ experience.name }}</option>
                </select>
                <label>Experience List</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input type="text" class="datepicker" id="date">
                <label for="date">Pick a Date</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" class="timepicker" id="time">
                <label for="time">Pick a Time</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <a class="btn waves-effect" v-on:click="fetchBooking(false)">Check Booking</a>
            </div>
        </div>
        <div class="row" v-if="initial">
            <div v-if="items && items.length > 0">
                <template v-cloak v-for="(item, index) in items">
                    <all :info="item"></all>
                </template>
            </div>
            <div v-else>
                <h5 class="center-align">No Booking Record Found.</h5>
            </div>
        </div>
        <div class="row" v-else>
            <div v-if="items && items.length > 0">
                <template v-cloak v-for="item in items">
                    <card :item="item" @all="fetchBooking" @initial="changeInitial"></card>
                </template>
            </div>
            <div v-else>
                <h5 class="center-align">No Booking Record Found.</h5>
            </div>
        </div>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/backend/booking/view.js') }}"></script>
@endsection