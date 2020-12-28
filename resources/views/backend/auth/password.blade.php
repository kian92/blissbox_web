@extends('backend.layouts.app')

@section('title', 'Change Password')

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
        .dayLabel {
            height: 70px;
            margin-top: 40px;
            font-size: 20px;
        }
        .status {
            margin-top: 10px;
        }
        .shiftTime {
            margin-top: 10px;
        }
        .timeslot input[type=text]:not(.browser-default) {
            margin-bottom: 0;
        }
        .timeslot:first-child {
            margin-bottom: 0;
        }
        textarea.materialize-textarea {
            padding: .8rem 0 1.6rem 0 !important;
        }
        @media only screen and (max-width: 992px) {
            .valign-wrapper {
                flex: 0 0 80%;
            }
            .days {
                font-size: 20px;
                font-weight: 700;
                text-align: center;
                height: auto;
            }
            .shiftTime {
                margin-bottom: 10px;
            }
        }
    </style>
@endsection

@section('body', 'backend change-password')

@section('content')
    <div class="valign-wrapper">
        <div class="container" id="password">
            <div class="overlay-background" v-if="loading">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <div class="row">
                <form class="col s12" v-on:submit.prevent="changePassword">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="center-align">Change Password</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            {{ csrf_field() }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input type="password" name="password" id="password" v-validate="'required|min:6'" v-model="change.password">
                            <label for="password">Password</label>
                            <span v-cloak v-show="errors.has('password')" class="error">@{{ errors.first('password') }}</span>
                        </div>
                        <div class="input-field col m6 s12">
                            <input type="password" name="confirmPassword" id="confirmPassword" v-validate="'required|min:6|confirmed:password'" v-model="change.confirmPassword">
                            <label for="confirmPassword">Confirm Password</label>
                            <span v-cloak v-show="errors.has('confirmPassword')" class="error">@{{ errors.first('confirmPassword') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('inline-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/backend/user/password.js') }}"></script>
    <script>
        $('select').material_select();
    </script>
@endsection