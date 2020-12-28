<?php

namespace App\Http\Controllers\API;

use App\Mail\ForgetPasswordMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AccountActivation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Models\User;
use App\Models\Coupon;
use App\Models\BillingInformation;

class UserController extends Controller
{

    public function login() {
        if (Auth::attempt([
                'email' => request('email'),
                'password' => request('password')
            ])) {

            $user = Auth::user();
            $success['token'] =  $user->createToken('Blissbox App')->accessToken;

            return ['status' => 200, 'message' => $success];
        }
        else{
            return ['status' => 401, 'message' => 'Unauthorised'];
        }
    }


    public function all() {
        $users = User::all();

        if ($users) {
            return [ 'status' => true, 'users' => $users ];
        } else {
            return [ 'status' => true ];
        }
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'first_name' => 'required|alpha_spaces|max:255',
            'last_name' => 'required|alpha_spaces|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'country' => 'required',
            'phone' => 'required|numeric',
            'postal_code' => 'required',
            'address' => 'required',
            'date' => 'required',
            'month' => 'required',
            'year' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        }

        $dob = $data['year'] . '-' . $data['month'] . '-' . $data['date'];

        if ($data['country'] == "65") {
            $country = "Singapore";
        }

        $user = User::create([
            'role_id' => '1',
            'title' => $data['title'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'date_of_birth' => $dob,
            'country' => $data['country'],
            'phone' => $data['phone'],
            'postal_code' => $data['postal_code'],
            'password' => bcrypt($data['password']),
            'activation_code' => str_random(40),
            'actvation_status' => 0
        ]);

        $billing = BillingInformation::create([
            'user_id' => $user->id,
            'billing_address' => $data['address'],
            'billing_city' => $country,
            'billing_state' => $country,
            'billing_postal' => $data['postal_code']
        ]);

        if ($user && $billing) {
            $coupon = Coupon::where([['expiration_at', '>=', Carbon::now()->format('Y-m-d H:i:s')], ['id', 5]])->first();

            Mail::to($data['email'])->send(
                new AccountActivation(
                    $data['first_name'] . ' ' . $data['last_name']
                )
            );
        }

        return [ 'status' => true ];
    }

    public function forgetPassword(Request $request) {
        Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
        ])->validate();

        // Generate activation code
        $code = str_random(40);

        $success = User::where('email', $request->email)->update('activation_code', $code);

        // Send email
        Mail::to($request->email)->send(
            new ForgetPasswordMail(
                $code
            )
        );

        if ($success) {
            return [ 'status' => true ];
        } else {
            return [ 'status' => false ];
        }

    }

}
