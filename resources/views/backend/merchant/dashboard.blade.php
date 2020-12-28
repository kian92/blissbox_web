@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('inline-style')
<style>
    #app {
        width: calc(100% - 300px);
        position: relative;
        left: 300px;
        top: 0;
    }
    .valign-wrapper {
        height: 100%;
        flex-direction: column;
    }
    .showPin {
        position: relative;
    }
    .showPin > button {
        position: absolute;
        top: 0;
        right: 0;
    }
    h4 {
        text-transform: uppercase;
        font-weight: bold;
        margin-top: 50px;
        margin-bottom: 0;
        color: #FECE51;
    }
    .card-title {
        border-bottom: 1px solid #E1E1E1;
        padding-bottom: 18px;
    }
    .card-content .upcoming {
        margin-top: 10px !important;
    }

    @media only screen and (max-width : 720px) {
        #app {
            width: 100%;
        }
        .valign-wrapper {
            flex: 0 0 80%;
        }
    }
</style>
@endsection

@section('body', 'backend dashboard')

@section('content')
    <div class="valign-wrapper">
        <div class="container" id="dashboard">
            <div class="overlay-background" v-if="loading">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <h4 class="center-align" style="margin-bottom: 50px">Dashboard</h4>

            <h5 class="center-align">Upcoming Booking</h5>
            <div v-if="booking.length > 0">
                <table>
                    <thead>
                        <th>Experience Name</th>
                        <th>Booking Date</th>
                        <th>Booking Time</th>
                        <th>Reference Code</th>
                        <th>Name</th>
                        <th class="center-align">Action</th>
                    </thead>
                    <tbody>
                        <template v-for="book in booking">
                            <row :book="book" @all="all"></row>
                        </template>
                    </tbody>
                </table>
            </div>

            <div class="center-align" v-else>
                Nothing Booking Available
            </div>

            <h5 class="center-align" style="margin-top: 50px;">Total Redemption</h5>
            <div v-if="redeems.length > 0">
                <template v-for="(redeem, index) in redeems">
                    <div class="row">
                        <div class="col s12">
                            <div class="card blue-grey darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">@{{ redeem.name }}</span>
                                    <p>Total Redemption</p><span>@{{ redeem.total }}</span>
                                    <p class="upcoming">Upcoming Booking</p>
                                    <span v-if="upcoming[index]">@{{ upcoming[index].total }}</span>
                                    <span v-else>0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div v-else>
                <p class="center-align">No Redemption at the moment</p>
            </div>
        </div>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/backend/dashboard/merchant.js') }}"></script>
@endsection