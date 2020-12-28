<?php

namespace App\Http\Controllers\Backend;

use app\Helpers\DDD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\Invoice;

use Auth;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Cart;
use App\Models\Purchase;
use App\Models\Order;
use App\Models\BillingInformation;
use App\Models\Coupon;

class PurchaseController extends Controller
{
    protected $universes;

    public function __construct() {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.purchase');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function all() {
        $cart = Cart::with('giftboxes')->where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->first();

        $purchase = Purchase::where('cart_id', $cart->id)->orderBy('created_at', 'desc')->first();

        return [ 'status' => true, 'cart' => $cart, 'purchase' => $purchase];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function purchaseHistory() {
        return view('backend.user.purchase.history');
    }

    public function getPurchaseHistory() {
        $result = Order::where([['user_id', Auth::user()->id], ['status', 1]])->orderBy('purchased_at', 'desc')->get();

        clock($result);

        if ($result) {
            return [ 'status' => true, 'result' => $result ];
        } else {
            return [ 'status' => false ];
        }
    }

    public function purchaseSuccess() {
        return view('frontend.purchase.success', ['universes' => $this->universes]);
    }

    public function paymentWithStripe(Request $request)
    {
        $order = Order::with('user')->findOrFail($request->id);

        $order->update([
            'status' => 2,
        ]);

        $this->validate($request,
            [
                'card.name' => 'required',
                'card.number' => 'required',
                'card.cvc' => 'required',
                'card.month' => 'required',
                'card.year' => 'required'
            ]
        );

        $stripe = Stripe::make(env('STRIPE_SECRET'));

        try {

            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => trim($request->card['number']),
                    'exp_month' => $request->card['month'],
                    'exp_year' => $request->card['year'],
                    'cvc' => $request->card['cvc']
                ]
            ]);

            if (!isset($token['id'])) {
                return ['result' => false];
            } else {

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'SGD',
                    'amount' => $order->total / 100,
                ]);

                if ($charge) {

                    $order_details = $order->where('status', 2)->orderBy('created_at', 'desc')->first();

                    // Update Stripe ID
                    $order->update([
                        'stripe_id' => $charge['id'],
                        'pay_by' => substr($request->card['number'],-4),
                        'status' => 3,
                        'purchased_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // Get Billing Address
                    $address = BillingInformation::where('user_id', Auth::user()->id)->first();

                    // Get Delivery Cost
                    $delivery = 0;

                    if (!($order->deliver_to()->get())->isEmpty()) {
                        $delivery = 7;
                    }

                    Mail::to(Auth::user()->email)->send(
                        new Invoice(
                            $order,
                            $address,
                            $order->user,
                            $order_details['items'],
                            $delivery,
                            Coupon::find($order['coupon_id'])
                        )
                    );

                    $query = Cart::where([
                        ['user_id', Auth::user()->id],
                        ['status', 1]
                    ])->update([
                        'status' => 2
                    ]);

                    return [ 'status' => true, 'message' => 'Payment has been made' ];
                } else {
                    return [ 'status' => true, 'message' => 'Payment was unable to process' ];
                }

                // If Payment Charge Successful
                // Send an Email to Buyer
                // Remove Cart Item
            }
        } catch (Exception $e) {
            // Return Result
        }
    }
}
