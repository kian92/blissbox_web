<?php

namespace App\Http\Controllers\Frontend;

use app\Helpers\DDD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Fetch Coupon ID
        if ($request->item['couponCode']) {
            $coupon = Coupon::where('code', $request->item['couponCode'])->first();
            $coupon = $coupon->id;
        } else {
            $coupon = null;
        }

        $carts = Cart::where([['user_id', Auth::user()->id], ['status', 1]])->get();

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'coupon_id' => $coupon,
            'items' => json_encode($request->item['items']),
            'total' => $request->total * 100,
            'status' => 0
        ]);

        foreach ($carts AS $index => $item) {

            // Send by E-Voucher
            if ($item['package'] === 'e-voucher') {
                if (empty($item['recipients'])) {
                    User::find(Auth::user()->id)->send_to()->attach($order->id, [
                        'giftbox_id' => $item['giftbox_id'],
                        'recipient' => 'Personal',
                        'message' => $item['message']
                    ]);
                } else {
                    User::find(Auth::user()->id)->send_to()->attach($order->id, [
                        'giftbox_id' => $item['giftbox_id'],
                        'recipient' => $item['recipients'],
                        'to' => $item['to'],
                        'message' => $item['message']
                    ]);
                }
            } else /* Send by Physical Box */ {
                User::find(Auth::user()->id)->deliver_to()->attach($order->id, [
                    'giftbox_id' => $item['giftbox_id'],
                    'tracking_code' => '',
                    'message' => $item['message'],
                    'status' => 1,
                ]);
            }
        }

        if ($order) {
            return [ 'status' => true, 'id' => $order->id ];
        } else {
            return [ 'status' => false ];
        }
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

    public function deliver(Request $request) {
        $status = true;

        $this->validate($request,
            [
                'delivers.receiver' => 'required',
                'delivers.phone' => 'required',
                'delivers.address' => 'required'
            ],
            [
                'delivers.receiver.required' => 'The receiver field is required',
                'delivers.phone.required' => 'The phone field is required',
                'delivers.address.required' => 'The address field is required'
            ]
        );

        foreach($request->items AS $index => $deliver) {
            if ($request->packages[$index]['package'] == "blissbox") {
                $result = User::find(Auth::user()->id)->orders()->updateExistingPivot(
                    $deliver['id'],
                    [
                        'send_to' => json_encode($request->delivers)
                    ]
                );

                if (!$result) {
                    $status = false;
                }
            }
        }

        if ($status) {
            return [ 'status' => true ];
        } else {
            return [ 'status' => false ];
        }
    }
}
