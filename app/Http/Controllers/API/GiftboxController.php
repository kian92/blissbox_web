<?php

namespace App\Http\Controllers\API;

use App\Models\Giftbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiftboxController extends Controller
{
    public function all() {
        $giftboxes = Giftbox::all();

        if ($giftboxes) {
            return [ 'status' => true, 'result' => $giftboxes ];
        } else {
            return [ 'status' => true ];
        }
    }
}
