<?php

namespace App\Http\Controllers\Auth;

use app\Helpers\DDD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath() {
        /*
        if (Auth::user()->role_id == 2) {
            $this->redirectTo = '/profile';
        } else {
            return redirect()->back();
        }
        */
        $this->redirectTo = '/profile';
    }

    protected function authenticated(Request $request, $user)
    {
        addToCart($user);
    }

    public function socialLogin($social) {

    }

    public function showLoginForm() {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }
}
