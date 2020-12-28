<?php

namespace App\Http\Controllers\Backend;

use Google\Auth\Tests\SACFromWellKnownFileTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\Coupon;
use App\Models\User;

class CouponController extends Controller
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
        //
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

    public function apply(Request $request) {

        $this->validate($request, [
           'coupon' => 'required'
        ]);

        $findCoupon = Coupon::where('code', $request->coupon)->get();

        if (!$findCoupon->isEmpty()) {
            $exists = User::find(Auth::user()->id)->coupons()->where('coupon_id', $findCoupon[0]['id'])->first();

            if (is_null($exists)) {
                return [ 'status' => true, 'result' => $findCoupon ];
            } else {
                return [ 'status' => false, 'message' => 'EVoucher has been used.' ];
            }
        } else {
            return [ 'status' => false, 'message' => 'EVoucher is invalid' ];
        }

    }
}
