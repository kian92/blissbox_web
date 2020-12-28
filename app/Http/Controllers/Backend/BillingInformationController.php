<?php

namespace App\Http\Controllers\Backend;

use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\Order;
use App\Models\BillingInformation;
use App\Models\Cart;

class BillingInformationController extends Controller
{
    public function index() {
        return view('frontend.checkout.delivery');
    }

    public function store(Request $request) {

        $validate = $this->validate(
            $request,
            [
                'billing.first_name' => 'required|alpha_spaces',
                'billing.first_name.required' => 'First Name is Required',
                'billing.last_name' => 'required|alpha_spaces',
                'billing.address' => 'required',
                'billing.city' => 'required',
                'billing.postal' => 'required',
                'billing.country' => 'required',
            ]
        );

        if ($request->different) {
            $validate = $request->validate([
                'shipping.first_name' => 'required|alpha_spaces',
                'shipping.last_name' => 'required|alpha_spaces',
                'shipping.address' => 'required',
                'shipping.city' => 'required',
                'shipping.postal' => 'required',
                'shipping.country' => 'required',
            ]);
        }

        $result = BillingInformation::updateOrCreate(
            [
                'user_id' => Auth::user()->id
            ],
            [
                'user_id' => Auth::user()->id,
                'billing_address' => $request->billing['address'],
                'billing_city' => $request->billing['city'],
                'billing_postal' => $request->billing['postal'],
                'billing_state' => $request->billing['country'],
            ]
        );

        if ($request->different) {
            Shipping::create(
                [
                    'order_id' => $request->id,
                    'shipping_address' => $request->shipping['address'],
                    'shipping_city' => $request->shipping['city'],
                    'shipping_postal' => $request->shipping['postal'],
                    'shipping_state' => $request->shipping['country'],
                ]
            );
        }

        Order::with('user')->findOrFail($request->id)->update([
            'status' => 1,
        ]);;

        if ($result) {
            return [ 'status' => true, 'id' => $request->id ];
        } else {
            return [ 'status' => false ];
        }
    }

    public function fetch() {
        $result = BillingInformation::where('user_id', Auth::user()->id)->first();
        $check_blissbox_exists = (is_null(Cart::where([['user_id', Auth::user()->id], ['package', 'blissbox'], ['status', 1]])->first())) ? false : true;

        if ($result) {
            return [ 'status' => true, 'result' => $result, 'user' => Auth::user(), 'found' => $check_blissbox_exists ];
        } else {
            return [ 'status' => false, 'found' => $check_blissbox_exists ];
        }
    }
}
