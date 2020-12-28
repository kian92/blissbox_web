@extends('frontend.layouts.app')

@section('title', 'Forget Password')

@section('inline-style')
    <style>
        <!-- Default Template -->
        .oxygen {
            font-family: 'Oxygen', sans-serif;
        }
        .errors {
            font-family: 'Oxygen', sans-serif;
            color: red;
            padding: 0.5rem 0;
        }
        #hero-banner {
            max-height: 300px;
            background-size: cover;
            overflow: hidden;
        }
        #login-wrapper {
            background-color: #FFF;
            z-index: 10;
            min-height: 500px;
        }
        #login-wrapper .container {
            position: relative;
            padding: 65px 75px;
            background-color: #FFF;
        }
        #login-wrapper .container .inner-container {
            max-width: 1100px;
        }
        #login-wrapper input {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            padding: 12px 30px;
            margin-top: 31px;
            background-color: #FAFAFA;
        }
        #login-wrapper .d-flex .f-50 {
            max-width: 50%;
            flex-basis: 50%;
        }
        #login-wrapper .btn-login {
            margin-top: 1rem;
            padding: 13px 40px;
            border-radius: 25px;
            background-color: #FECE51;
        }
        #login-wrapper .extra a {
            font-weight: bolder;
            color: #111821;
            text-decoration: underline;
        }
        @media (max-width: 1199px) {
            #login-wrapper .extra .col-4 {
                max-width: 100%;
                flex-basis: 100%;
            }
            #login-wrapper .extra .col-8 {
                max-width: 100%;
                flex-basis: 100%;
            }
            #login-wrapper .extra .col-8 span {
                float: left !important;
            }
        }
        @media (max-width: 991px) {
            html {
                font-size: 14px !important;
            }
            #login-wrapper .d-flex {
                flex-direction: column;
            }
            #login-wrapper .d-flex .f-50 {
                max-width: 100%;
                flex-basis: 100%;
            }
        }
    </style>
@endsection

@section('body', 'frontend login')

@section('content')
    <div id="reset">
        <section id="hero-banner">
            <div class="d-flex">
                <div class="captions">
                    <img src="{{ asset('images/frontend/login.jpg') }}" class="img-fluid" alt="Emotion As Gift" />
                </div>
            </div>
        </section>
        <section id="login-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Reset Password</div>

                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Reset Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/frontend/auth/reset.js') }}"></script>
@endsection
