<?php

namespace App\Http\Controllers\API\Merchant;

use app\Helpers\DDD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Branch;

class AuthController extends Controller
{
    public function status(Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt([
            'email' => request('email'),
            'password' => request('password')
        ])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('Blissbox App')->accessToken;

            // Fetch Branches
            $branches = Branch::where('company_id', $user->company_id)->get();

            if ($branches->isEmpty() && $user->company_id) {
                $user = User::with('company')->where('company_id', $user->company_id)->first();
                $branches = $user->company['name'];
            }

            return [ 'status' => true, 'message' => $success, 'user' => $user, 'branches' => $branches ];
        } else {
            return ['status' => false, 'message' => 'Failed to login'];
        }
    }
}
