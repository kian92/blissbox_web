<?php

namespace App\Http\Controllers\Shopify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

use App\Helpers\VerifyWebhook;

class RegisterController extends Controller
{
    public function __construct() {
        if (isset($_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'])) {
            if (!VerifyWebhook::verify(env('SHOPIFY_SECRET'), $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'])) {
                exit;
            } else {
                return true;
            }
        } else {
            exit;
        }        
    }

    public function register(Request $request) {
        
        $activation_code = str_random(40);

        $success = User::create([
            'role_id' => '1',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'activation_code' => $activation_code,
            'actvation_status' => 0
        ]);

        if ($success) {
            Mail::to($data['email'])->send(
                new AccountActivation(
                    $request->email,
                    $request->first_name . ' ' . $request->last_name,
                    $activation_code
                )
            );
        }
    }
}
