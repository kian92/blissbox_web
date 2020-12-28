@extends('backend.layouts.app')

@section('title', 'Edit Universe')

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

@section('body', 'backend universe-edit')

@section('content')
    <div class="valign-wrapper">
        <div class="container" id="edit">
            <div class="overlay-background" v-if="loading">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <div class="row">
                <form class="col s12" v-on:submit.prevent="update(id)" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="center-align">Edit Universe</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input type="text" name="initial" id="initial" v-model="edit.initial" placeholder="">
                                    <label for="initial">Universe Initial</label>
                                    <span v-cloak v-show="errors.has('initial')" class="error">@{{ errors.first('initial') }}</span>
                                </div>
                                <div class="input-field col s8">
                                    <input type="text" name="name" id="name" v-validate="'required'" v-model="edit.name" placeholder="">
                                    <label for="name">Universe Name</label>
                                    <span v-cloak v-show="errors.has('name')" class="error">@{{ errors.first('name') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="description" id="description" v-validate="'required'" v-model="edit.description" placeholder="">
                                    <label for="description">Description</label>
                                    <span v-cloak v-show="errors.has('description')" class="error">@{{ errors.first('description') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12 right-align">
                                    <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/backend/universe/edit.js') }}"></script>
@endsection