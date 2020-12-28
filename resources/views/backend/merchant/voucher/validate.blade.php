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
    [v-cloak] {
        display: none;
    }
    @media only screen and (max-width: 992px) {
        .valign-wrapper {
            flex: 0 0 80%;
        }
    }
</style>
@endsection

@section('body', 'backend validate-voucher')

@section('content')
    <div class="valign-wrapper">
        <div class="container" id="validate">
	    	<div class="overlay-background" v-if="loading">
	            <div class="progress">
	                <div class="indeterminate"></div>
	            </div>
	        </div>
            <div class="row">
	            <form class="col s12" v-on:submit.prevent="checkVoucher" enctype="multipart/form-data">
	                <div class="row">
	                    <div class="col s12">
	                        <h4 class="center-align">Validate Voucher</h4>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col s12">
	                        <div class="row">
	                            <div class="input-field col s12">
	                                <input type="text" name="code" id="code" v-validate="'required'" v-model="code" placeholder="1234 1234 1234 1234">
	                                <label for="code">Reference Code (Without any space)</label>
	                                <span v-cloak v-show="errors.has('code')" class="error">@{{ errors.first('code') }}</span>
	                            </div>
	                            <div class="input-field col s12">
	                                <input type="text" name="pin" id="pin" v-validate="'required'" v-model="pin" placeholder="123 123">
	                                <label for="pin">Pin Code (Without any space)</label>
	                                <span v-cloak v-show="errors.has('pin')" class="error">@{{ errors.first('pin') }}</span>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="input-field col s12 right-align">
	                    <button class="btn waves-effect waves-light" type="submit" name="submit">Validate
	                            <i class="material-icons right">send</i>
	                        </button>
	                    </div>
	                </div>
	            </form>
	        </div>
            <div class="row" v-if="information" v-cloak>
                <div class="col s12">
                    <table class="bordered responsive">
                        <tr v-if="information.user">
                            <td>
                                <b>Registered Under</b>
                            </td>
                            <td colspan="3">
                                @{{ information.user.last_name }} @{{ information.user.first_name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Reference Code Status</b>
                            </td>
                            <td colspan="3">
                                @{{ information.status }}
                            </td>
                        </tr>
                        <tr v-if="information.redeemed_at">
                            <td>
                                <b>Redeemed Date</b>
                            </td>
                            <td colspan="3">
                                @{{ information.redeemed_at }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Activation Date:</b>
                            </td>
                            <td>
                                @{{ information.activation_at }}
                            </td>
                            <td>
                                <b>Expiration Date:</b>
                            </td>
                            <td>
                                @{{ information.expiration_at }}
                            </td>
                        </tr>
                        <tr v-if="information.user">
                            <td><b>Phone</b></td>
                            <td>@{{ information.user.phone }}</td>
                            <td><b>Email</b></td>
                            <td>@{{ information.user.email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row" v-if="information && !information.redeemed_at" v-cloak>
                <div class="col s12 right-align">
                    <button class="btn waves-effect waves-light" type="button" name="redemption" v-on:click="redemption()">Redemption
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
            <experience :experiences="experiences" :information="information"></experience>
        </div>
    </div>
@endsection
@section('inline-script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/backend/voucher/validate.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.modal').modal();
        $('#redemption').modal();
    });
</script>
@endsection