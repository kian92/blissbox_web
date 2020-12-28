<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Voucher;
use App\Models\User;
use App\Models\Booking;

class  BookingController extends Controller
{
    public function index() {
        return view('backend.merchant.booking.view');
    }

    public function create() {
        return view('backend.merchant.booking.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'voucher' => 'required',
            'experience' => 'required',
            'date' => 'required',
        ]);

        if ($request->email || $request->phone) {
            $user = User::where('email', $request->email)->first();
            if (!$user['email']) {
                $user = User::create([
                    'role_id' => '1',
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'country' => '65',
                    'phone' => $request->phone,
                    'activation_code' => Hash::make(str_random(40)),
                    'activation_status' => 0,
                ]);
            } else {
                Voucher::where('code', $request->voucher)->update(['user_id' => $user['id']]);
            }
        }
        
        $voucher = Voucher::where([['code', $request->voucher]])->where('status', 3)->first();

        if ($voucher) {
            if (isset($user)) {
                $experience = Voucher::find($voucher->id)->update(
                    [
                        'user_id' => $user['id'],
                        'experience_id' => $request->experience,
                        'booking_date' => Carbon::parse($request->date)->format('Y-m-d'),
                        'booking_time' => $request->time . ':00',
                        'status' => 4
                    ]
                );
            } else {
                $experience = Voucher::find($voucher->id)->update(
                    [
                        'experience_id' => $request->experience,
                        'booking_date' => Carbon::parse($request->date)->format('Y-m-d'),
                        'booking_time' => $request->time . ':00',
                        'status' => 4
                    ]
                );
            }

            if ($experience) {
                return [ 'status' => true, 'message' => 'Booking has been created' ];
            } else {
                return [ 'status' => false, 'message' => 'Failed to book' ];
            }

        } else {
            return [ 'status' => false, 'message' => 'EVoucher does not exists or already in used' ];
        }

    }

    public function fetch(Request $request) {

        if (isset($request->experience) && isset($request->date) && isset($request->time)) {
            $result = Voucher::where(
                [
                    ['experience_id', $request->experience],
                    ['booking_date', Carbon::parse($request->date)->format('Y-m-d')],
                    ['booking_TIME', $request->time . ':00'],
                    ['status', 4]
                ]
            )
                ->whereNull('redeemed_at')
                ->with('user', 'experience')
                ->orderBy('booking_time', 'asc')
                ->get();
        } else if (isset($request->experience) && isset($request->date)) {
            $result = Voucher::where(
                [
                    ['experience_id', $request->experience],
                    ['booking_date', Carbon::parse($request->date)->format('Y-m-d')],
                    ['status', 4]
                ]
            )
                ->whereNull('redeemed_at')
                ->with('user', 'experience')
                ->orderBy('booking_time', 'asc')
                ->get();
        } else if (isset($request->experience) && isset($request->time)) {
            $result = Voucher::where(
                [
                    ['experience_id', $request->experience],
                    ['booking_time', $request->time . ':00'],
                    ['status', 4]
                ]
            )
                ->whereNull('redeemed_at')
                ->with('user', 'experience')
                ->orderBy('booking_time', 'asc')
                ->get();
        } else if (isset($request->experience)) {
            $result = Voucher::where(
                [
                    ['experience_id', $request->experience],
                    ['status', 4]
                ]
            )
                ->whereNull('redeemed_at')
                ->with('user', 'experience')
                ->orderBy('booking_time', 'asc')
                ->get();
        } else if (isset($request->date)) {
            $result = Voucher::where(
                [
                    ['booking_date', Carbon::parse($request->date)->format('Y-m-d')],
                    ['status', 4]
                ]
            )
                ->whereNull('redeemed_at')
                ->with('user', 'experience')
                ->orderBy('booking_time', 'asc')
                ->get();
        } else if (isset($request->time)) {
            $result = Voucher::where(
                [
                    ['booking_date', $request->time . ':00'],
                    ['status', 4]
                ]
            )
                ->orderBy('booking_time', 'asc')
                ->whereNull('redeemed_at')
                ->with('user', 'experience')
                ->get();
        } else {
            $result = DB::select('
                        SELECT experiences.name, experiences.id AS experience_id, vouchers.id AS voucher_id, users.id AS user_id, vouchers.booking_date, vouchers.booking_time, vouchers.code, users.first_name, users.last_name
                        FROM users
                        RIGHT JOIN companies ON companies.id = users.company_id
                        RIGHT JOIN experiences ON experiences.company_id = companies.id
                        LEFT  JOIN vouchers ON vouchers.experience_id = experiences.id
                        WHERE vouchers.booking_date IS NOT NULL
                        AND users.id = ' . Auth::user()->id . '
                        AND vouchers.status = 4
                        ORDER BY vouchers.updated_at DESC');
        }

        if ($result) {
            return ['status' => true, 'result' => $result];
        } else {
            return ['status' => false];
        }
    }

    public function cancellation(Request $request) {

        $voucher = Voucher::where('code', $request->code)->update(
            [
                'experience_id' => null,
                'booking_date' => null,
                'booking_time' => null,
                'status' => 3
            ]);

        if ($voucher) {
            return ['status' => true, 'message' => 'Booking has been cancelled.'];
        } else {
            return ['status' => true, 'message' => 'EVoucher does not exists or already redeemed.'];
        }
    }


}