<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\User;

class UserController extends Controller
{
    public function fetch($id)
    {
        $user = User::find($id);

        if ($user) {
            return ['status' => true, 'user' => $user];
        } else {
            return ['status' => false];
        }
    }

    public function changePassword()
    {
        return view('backend.auth.password');
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password'
        ]);

        $result = User::find(Auth::user()->id)->update([
            'password' => bcrypt($request['password'])
        ]);

        if ($result) {
            return ['status' => true, 'message' => 'Password has been changed successfully'];
        } else {
            return [ 'status' => false, 'message' => 'Failed to change the password' ];
        }
    }

    public function activate($email, $activation_code) {
        $found = User::where([['email', $email], ['activation_code', $activation_code]])->first();

        if ($found) {
            $found->update([
                'activation_status' => 1
            ]);
            return view('frontend.auth.success');
        } else {
            return view('frontend.auth.fail');
        }
        
    }

    public function updatePassword() {}
}
