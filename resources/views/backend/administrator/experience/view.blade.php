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
        form {
            background-color: rgba(255, 255, 255, 0.6);
            padding: 0 30px !important;
        }
        h4 {
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 50px;
            color: #FECE51;
        }
        .btn-add {
            display: block;
        }

        @media only screen and (max-width: 992px) {
            .valign-wrapper {
                flex: 0 0 80%;
            }
        }
    </style>
@endsection

@section('body', 'backend box-list')

@section('content')
    <div class="valign-wrapper">
        <div class="container" id="experience">
            <div class="overlay-background" v-if="loading">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <h4 class="center-align">Experience</h4>
            <div class="row">
                <div v-if="experiences && experiences.length > 0">
                    <div class="col s12" v-for="experience in experiences">
                        <p>@{{ experience.name }}</p>
                    </div>
                </div>
                <div v-else>
                    <h5 class="center-align">No Experience Information Yet</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('inline-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/backend/experience/view.js') }}"></script>
    <script>
        $('select').material_select();
        $('.timeslot .col').matchHeight();
    </script>
@endsection