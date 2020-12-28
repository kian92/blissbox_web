<?php

namespace App\Http\Controllers\Auth;

use App\Mail\AccountActivation;
use App\Models\BillingInformation;
use App\Models\User;
use App\Models\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'share' => 'required',
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $dob = $data['year'] . '-' . $data['month'] . '-' . $data['date'];

        if ($data['country'] == "65") {
            $country = "Singapore";
        }

        $activation_code = str_random(40);

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
            'activation_code' => $activation_code,
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
                    $data['email'],
                    $data['first_name'] . ' ' . $data['last_name'],
                    $activation_code
                )
            );

            // Send the coupon after activation
            /*
            if ($coupon) {
                Mail::to($data['email'])->send(
                    new RegisterVoucher(
                        $data['first_name'] . ' ' . $data['last_name'],
                        $coupon['code']
                    )
                );
            }
            */
        }

        return $user;
    }

    protected function redirectTo()
    {
        return url()->previous();
    }

    protected function registered(Request $request, $user)
    {
        addToCart($user);
    }
}
