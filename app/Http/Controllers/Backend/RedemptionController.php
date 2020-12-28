<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;

use App\Models\Voucher;

class RedemptionController extends Controller
{
    public function redeem() {
        return view('backend.merchant.voucher.redeem');
    }

    public function redeemVoucher(Request $request) {
        if (!is_null($request['experience_id'])) {
            $result = Voucher::find($request['id'])->where(
                [
                    ['user_id', $request['user_id']],
                    ['code', $request['code']],
                    ['pin', $request['pin']],
                    ['expiration_at', '>=', Carbon::now()->format('Y-m-d H:i:s')]
                ]
            )->update(
                [
                    'experience_id' => $request['experience_id'],
                    'status' => 5,
                    'redeemed_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            );

        } else {
            $result = false;
        }

        if ($result) {
            return [ 'status' => true, 'message' => 'Redeemed Successfully' ];
        } else {
            return [ 'status' => false, 'message' => 'Failed to Redeemed' ];
        }
    }

    public function redeemDashboard(Request $request) {
        if (!is_null($request['experience_id'])) {
            $result = Voucher::find($request['voucher_id'])->where(
                [
                    ['code', $request['code']],
                    ['pin', $request['pin']],
                    ['expiration_at', '>=', Carbon::now()->format('Y-m-d H:i:s')]
                ]
            )->update(
                [
                    'status' => 5,
                    'redeemed_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            );

        } else {
            $result = false;
        }

        if ($result) {
            return [ 'status' => true, 'message' => 'Redeemed Successfully' ];
        } else {
            return [ 'status' => false, 'message' => 'Failed to Redeemed' ];
        }
    }

    public function successFee() {

    }
}
