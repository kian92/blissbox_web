<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Giftbox;
use Auth;

use App\Models\User;

class GiftboxController extends Controller
{
    public function index($id) {

        $giftbox = Giftbox::with('universe')->find($id);
        $recommended_giftbox = Giftbox::where('status', 1)->get();

        $total_user = Giftbox::find($id)->reviews()->count();

        if (Auth::user()) {
            $wishlist = User::find(Auth::user()->id)->wishlists()->wherePivot('giftbox_id', $giftbox->id)->first();
            if ($wishlist) {
                $wishlist = true;
            } else {
                $wishlist = false;
            }
        } else {
            $wishlist = false;
        }

        if(!is_null($giftbox)) {
            return [ 'status' => true, 'giftbox' => $giftbox, 'recommended' => $recommended_giftbox, 'wishlist' => $wishlist, 'total_user' => $total_user ];
        } else {
            return abort(404);
            return [ 'status' => false ];
        }
    }


    public function all() {
        $giftboxes = Giftbox::with('universe')->get();

        return [ 'status' => true, 'giftboxes' => $giftboxes ];
    }
}
