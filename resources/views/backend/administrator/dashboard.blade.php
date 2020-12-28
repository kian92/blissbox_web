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
    @media only screen and (max-width : 720px) {
		#app {
			width: 100%;
		}
    }
</style>
@endsection

@section('body', 'backend dashboard')

@section('content')
    <div class="valign-wrapper">
        <div class="container" id="dashboard">
            <table class="">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Voucher</th>
                    <th>Box</th>
                    <th>Date of Purchase</th>
                </tr>
                </thead>

                <tbody>
                <tr v-for="order in purchaseOrders.items">
                    <td>@{{ order.user.last_name }} @{{ order.user.first_name }}</td>
                    <td>
                        <ol>
                            <li v-for="voucher in JSON.parse(order.voucher_list)">
                                @{{ voucher }}
                            </li>
                        </ol>
                    </td>
                    <td>
                        <ol>
                            <li v-for="item in JSON.parse(order.items)">
                                @{{ item.name }}
                                @{{ item.package }}
                            </li>
                        </ol>
                    </td>
                    <td>@{{ order.created_at }}</td>
                </tr>
                </tbody>
            </table>
            <a href="javascript:void(0)"  v-if="purchaseOrders.prev" v-on:click="prev(purchaseOrders.currentPage - 1)">Previous</a>
            <a href="javascript:void(0)" v-if="purchaseOrders.next" v-on:click="next(purchaseOrders.currentPage + 1)">Next</a>
        </div>
    </div>
@endsection

@section('inline-script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/backend/dashboard/admin.js') }}"></script>
@endsection