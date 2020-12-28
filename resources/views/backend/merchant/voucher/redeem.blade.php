@extends('backend.layouts.app')

@section('title', 'EVoucher')

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

    @media only screen and (max-width: 992px) {
        .valign-wrapper {
            flex: 0 0 80%;
        }
    }
</style>
@endsection

@section('body', 'backend voucher-redemption')

@section('content')
<div class="valign-wrapper">
    <div class="container" id="redeem">
        <div class="overlay-background" v-if="loading">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>
        <div class="row">
            <form class="col s12" v-on:submit.prevent="redeemVoucher" enctype="multipart/form-data">
                <div class="row">
                    <div class="col s12">
                        <h4 class="center-align">Redemption Voucher</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="code" id="code" v-validate="'required'" v-model="code">
                                <label for="code">Reference Code</label>
                                <span v-cloak v-show="errors.has('code')" class="error">@{{ errors.first('code') }}</span>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="pin" id="pin" v-validate="'required'" v-model="pin">
                                <label for="pin">Pin Code</label>
                                <span v-cloak v-show="errors.has('pin')" class="error">@{{ errors.first('pin') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row div col s12">
                </div>
                <div class="row">
                    <div class="input-field col s12 right-align">
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
<script src="{{ asset('js/app.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{ asset('js/backend/voucher/redeem.js') }}"></script>
@endsection