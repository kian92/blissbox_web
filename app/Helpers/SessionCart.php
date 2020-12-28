<?php

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Voucher;
use App\Models\Cart;

function addToCart($user_id)
{
    if (session()->has('cart_uuid')) {
        Cart::where('session_id', session()->get('cart_uuid'))->update([
            'user_id' => $user_id['id']
        ]);
    }
}