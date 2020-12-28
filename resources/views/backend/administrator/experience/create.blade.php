@extends('backend.layouts.app')

@section('title', 'Create Experience')

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
    .requirements {
        display: block;
        padding: 10px 50px 0px 50px;
    }
    form {
        background-color: rgba(255, 255, 255, 0.6);
        padding: 0 30px !important;
    }
    h4 {
        text-transform: uppercase;
        font-weight: bold;
        margin-top: 50px;
        margin-bottom: 0;
        color: #FECE51;
    }
    .btn-add {
        display: block;
    }
    textarea.materialize-textarea {
        padding: .8rem 0 1.6rem 0 !important;
    }
    @media only screen and (max-width: 992px) {
        .valign-wrapper {
            flex: 0 0 80%;
        }
    }
</style>
@endsection

@section('body', 'backend experience-create')

@section('content')
<div class="valign-wrapper">
    <div class="container" id="create">
        <div class="overlay-background" v-if="loading">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>
        <div class="row">
            <form v-on:submit.prevent="store" enctype="multipart/form-data">
                <div class="row">
                    <div class="col s12">
                        <h4 class="center-align">Experience</h4>
                    </div>
                </div>
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
                    <div class="input-field col s12 m6">
                        <input type="text" name="name" id="name" v-validate="'required'" v-model="create.name">
                        <label for="name">Experience Name</label>
                        <span v-cloak v-show="errors.has('name')" class="error">@{{ errors.first('name') }}</span>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="company" id="company">
                            <option value="" selected="selected" disabled="disabled">Choose Company</option>
                            <!-- Universe Group -->
                            <option v-for="company in companies" v-bind:value="company.id">@{{ company.name }}</option>
                        </select>
                        <label>Company</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m3">
                        <select name="universe" id="universe">
                            <option value="" selected="selected" disabled="disabled">Choose Universe</option>
                            <!-- Universe Group -->
                            <option v-for="universe in universes" v-bind:value="universe.id">@{{ universe.name }}</option>
                        </select>
                        <label>Universe</label>
                    </div>

                    <div class="input-field col s12 m3">
                        <select name="giftbox" id="giftbox">
                            <!-- Universe Group -->
                            <option value="" selected="selected" disabled="disabled">Choose your Giftbox</option>
                            <option v-if="giftboxes && giftboxes.length > 0" v-for="giftbox in giftboxes" v-bind:value="giftbox.id">@{{ giftbox.name }}</option>
                        </select>
                        <label>Giftboxes</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input type="text" name="code" id="code" v-validate="'required'" v-model="create.code">
                        <label for="code">Product Code</label>
                        <span v-cloak v-show="errors.has('code')" class="error">@{{ errors.first('code') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="pax" id="pax" v-validate="'required|numeric'" v-model="create.pax">
                        <label for="pax">No. of people</label>
                        <span v-cloak v-show="errors.has('pax')" class="error">@{{ errors.first('pax') }}</span>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" name="duration" id="duration" v-model="create.duration" placeholder="30 minutes or 4 hours">
                        <label for="duration">Total Duration</label>
                        <span v-cloak v-show="errors.has('duration')" class="error">@{{ errors.first('duration') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="reservation_email" id="reservation_email" v-validate="'email'" v-model="create.reservationEmail">
                        <label for="reservation_email">Reservation Email</label>
                        <span v-cloak v-show="errors.has('reservation_email')" class="error">@{{ errors.first('reservation_email') }}</span>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" name="reservation_contact" id="reservation_contact" v-model="create.reservationContact">
                        <label for="reservation_contact">Reservation Contact Number</label>
                        <span v-cloak v-show="errors.has('reservation_contact')" class="error">@{{ errors.first('reservation_contact') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="address" class="materialize-textarea" v-model="create.address"></textarea>
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <span>Requirements</span>
                        <div class="row" v-for="(rule, index) in create.requirements">
                            <experience v-model="create.requirements[index]"></experience>
                        </div>
                    </div>
                    <div class="input-field col s12 m12 l6">
                        <span>Complementary services offered (if applicable)</span>
                        <div class="row" v-for="(rule, index) in create.services">
                            {{-- <div class="input-field col s12">
                                <input type="checkbox"v value="Videos" class="filled-in" id="videos" v-model="create.services" />
                                <label for="videos">Videos</label>
                            </div> --}}
                            <experience v-model="create.services[index]"></experience>
                        </div>
                        {{-- <div class="row">
                            <div class="input-field col s12">
                                <input type="checkbox" value="Parking" class="filled-in" id="parking" v-model="create.services" />
                                <label for="parking">Parking</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="checkbox" value="Swimming" class="filled-in" id="swimming" v-model="create.services" />
                                <label for="swimming">Swimming Pool</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="checkbox" value="Pets" class="filled-in" id="pets" v-model="create.services" />
                                <label for="pets">Pets Allowed</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="checkbox" value="Cafe" class="filled-in" id="cafe" v-model="create.services" />
                                <label for="cafe">Cafe</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="checkbox" value="Photos" class="filled-in" id="photo" v-model="create.services" />
                                <label for="photo">Photos</label>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="information" class="materialize-textarea" v-model="create.information" ></textarea>
                                <label for="information">Additional Information</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/backend/experience/create.js') }}"></script>
@endsection