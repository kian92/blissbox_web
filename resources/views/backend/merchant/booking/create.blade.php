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
    <div class="container" id="create">
        <div class="overlay-background" v-if="loading">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>

        <form v-on:submit.prevent="store">
            <div class="modal-content">
                <h4 class="center-align">Create New Booking</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="voucher" id="voucher" v-validate="'required'" v-on:input="check" v-on:keydown="displayMessage" v-model="create.voucher">
                        <label for="voucher">Reference Code</label>
                        <span>@{{ message }}</span>
                        <br/>
                        <span v-cloak v-show="errors.has('voucher')" class="error">@{{ errors.first('voucher') }}</span>
                    </div>
                </div>
                <div v-if="status">
                    <div class="row">
                        <div class="input-field col s12">
                            <select id="createExperience">
                                <option v-bind:value="experience.id" v-for="experience in experiences">@{{
                                    experience.name }}</option>
                            </select>
                            <label for="createExperience">Experience</label>
                        </div>
                    </div>
                    <div class="row" v-if="showInput">
                        <div class="input-field col s12 m6">
                            <input type="text" name="first_name" id="first_name" v-model="create.first_name">
                            <label for="first_name">First Name</label>
                            <span v-cloak v-show="errors.has('first_name')" class="error">@{{ errors.first('first_name') }}</span>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="text" name="last_name" id="last_name" v-model="create.last_name">
                            <label for="last_name">Last Name</label>
                            <span v-cloak v-show="errors.has('last_name')" class="error">@{{ errors.first('last_name') }}</span>
                        </div>
                    </div>
                    <div class="row" v-if="showInput">
                        <div class="input-field col s12 m6">
                            <input type="text" name="email" id="email" v-validate="'email'" v-model="create.email">
                            <label for="email">Email Address</label>
                            <span v-cloak v-show="errors.has('email')" class="error">@{{ errors.first('email') }}</span>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="text" name="phone" id="phone" v-validate="'numeric'" v-model="create.phone">
                            <label for="phone">Contact Number</label>
                            <span v-cloak v-show="errors.has('phone')" class="error">@{{ errors.first('phone') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input name="reservation_date" type="text" class="datepicker" id="createDate">
                            <label for="createDate">Pick a Date</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input name="reservation_time" type="text" class="timepicker" id="createTime">
                            <label for="createTime" class="active">Pick a Time</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="waves-effect waves-light btn">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/backend/booking/create.js') }}"></script>
@endsection