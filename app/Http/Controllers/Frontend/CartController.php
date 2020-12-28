<?php

namespace App\Http\Controllers\Frontend;

use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Universe;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use app\Helpers\DDD;

class CartController extends Controller
{
    protected $universes;

    public function __construct() {
        $this->universes = Universe::all();
    }

    public function index() {
    	return view('frontend.cart', ['universes' => $this->universes]);
    }

    public function all() {
        if (Auth::user()) {
            // Get the Type of Item
            $item_type = DB::select("
                SELECT `giftboxes`.`name`, `giftboxes`.`thumbnail`, `giftboxes`.`price`, `giftboxes`.`hasBox`, `carts`.*, 
                    (SELECT COUNT(giftbox_id) 
                        FROM carts 
                        WHERE `giftboxes`.`id` = giftbox_id 
                        AND `carts`.`user_id` = '" . Auth::user()->id . "' 
                        AND `carts`.`status` = 1 
                        GROUP BY giftbox_id) AS totalItem
                FROM `carts` 
                    LEFT JOIN `giftboxes` 
                    ON `carts`.`giftbox_id` = `giftboxes`.`id` 
                WHERE `user_id` = '" . Auth::user()->id  . "'
                    AND `carts`.`status` = 1 
                GROUP BY `carts`.`giftbox_id`
            ");

            /*
            $cart = DB::select("
                SELECT `giftboxes`.`name`, `giftboxes`.`thumbnail`, `giftboxes`.`price`, `carts`.*, 
                    (SELECT COUNT(giftbox_id) 
                    FROM carts 
                    WHERE `giftboxes`.`id` = giftbox_id 
                        AND `carts`.`user_id` = '" . Auth::user()->id  . "'
                        AND `carts`.`status` = 1
                    GROUP BY giftbox_id) AS totalItem 
                FROM `giftboxes` 
                    INNER JOIN `carts` ON `giftboxes`.`id` = `carts`.`giftbox_id` 
                WHERE `carts`.`user_id` = '" . Auth::user()->id  . "'
                    AND `carts`.`status` = 1 
            ");
            */

            $cart = DB::select(
                "SELECT `giftboxes`.`name`, `giftboxes`.`thumbnail`, `giftboxes`.`price`, `giftboxes`.`hasBox`, `carts`.*,
                    (SELECT COUNT(giftbox_id) 
                    FROM carts 
                    WHERE `giftboxes`.`id` = giftbox_id 
                        AND `carts`.`user_id` = '" . Auth::user()->id . "' 
                        AND `carts`.`status` = 1
                    GROUP BY giftbox_id) AS totalItem 
                    FROM `giftboxes` 
                        INNER JOIN `carts` ON `giftboxes`.`id` = `carts`.`giftbox_id` 
                    WHERE `carts`.`user_id` = '" . Auth::user()->id  . "'
                        AND `carts`.`status` = 1
                ");

            if ($cart) {
                    return ['status' => true, 'item_type' => $item_type, 'items' => $cart, 'count' => count($cart)];
            } else {
                return ['status' => false];
            }
        } else {
            return [ 'status' => false ];
        }
    }

    public function update($id, Request $request) {

        // Calculation
        $current_total = Cart::where([
            ['user_id', Auth::user()->id],
            ['giftbox_id', $id],
            ['status', 1]
        ])->count();

        if ($request->quantity < $current_total) {
            $condition = $current_total - $request->quantity;

            Cart::where([
                    ['user_id', Auth::user()->id],
                    ['giftbox_id', $id],
                    ['status', 1]
                ])
                ->orderBy('id', 'DESC')
                ->take($condition)
                ->delete();

            $result = true;

        } else {
            $condition = $request->quantity - $current_total;
            // Insert new record based on the quantity

            try {
                for ($i = 1; $i <= $condition; $i++) {
                    Cart::create([
                        'user_id' => Auth::user()->id,
                        'giftbox_id' => $id,
                        'package' => 'e-voucher',
                        'status' => 1,
                    ]);

                    $result = true;
                }
            } catch (Exception $e) {
                echo "Exception";
                $result = false;
            }
        }

        if ($result) {
            return ['status' => true];
        } else {
            return ['status' => false];
        }
    }

    /**
     * Check if the item exists in CartGiftbox table
     * @param  id           $id
     * @return boolean
     */
    public function destroy(Request $request) {

        $result = User::find(Auth::user()->id)->carts()->wherePivot('status', 1)->detach($request->id);

        if ($result) {
            return ['status' => true, 'message' => 'Removed from cart'];
        } else {
            return [ 'status' => false, 'message' => 'Failed to remove item'];
        }
    }

    /**
     * Check if the item exists in CartGiftbox table
     * @param  id           $id
     */
    public function addToCart(Request $request) {
        // Check if user exist in the cart or not with the status of 1
            // Insert new record based on the quantity
            try {
                User::find(Auth::user()->id)->carts()->attach($request->id, ['package' => 'e-voucher', 'status' => 1]);
                $result = true;
            } catch (Exception $e) {
                $result = false;
            }

        if ($result) {
            return ['status' => true, 'message' => $request->name . ' is added to Cart'];
        } else {
            return ['status' => false, 'message' => 'Failed to added into your Cart'];
        }

    }

    /**
     * Check if the item exists in CartGiftbox table
     * @param  id           $cartItem
     */
    public function checkExistCart($id) {
        $result = User::find($id)->carts()->orderBy('created_at', 'desc')->first();

        return $result;
    }

    public function count(Request $request) {

        $result = 0;

        if (Auth::user()) {
            $result = Cart::where([['user_id', Auth::user()->id], ['status', 1]])->count();

//            if (!$items->isEmpty()) {
//                foreach($items AS $quantity) {
//                    $result += $quantity->pivot['quantity'];
//                    $result = Cart::where('user_id', Auth::user()->id)->count();
//                }
//            }
        } else {
            if ($request->session()->has('cart_uuid')) {
                $result = Cart::where('session_id', $request->session()->get('cart_uuid'))->count();
            }
        }
        if ($result > 0) {
            return ['status' => true, 'result' => $result];
        } else {
            return ['status' => false];
        }
    }

    public function storeRecipient(Request $request) {
        Cart::find($request->id)->update([
           'recipients' => $request->recipient
        ]);
    }

    public function storePackage(Request $request) {
        if ($request->type == 'blissbox') {
            Cart::find($request->id)->update([
                'recipients' => null,
                'package' => $request->type
            ]);
        } else {
            Cart::find($request->id)->update([
                'package' => $request->type
            ]);
        }
    }

    public function storeTo(Request $request) {
        Cart::find($request->id)->update([
            'to' => $request->to
        ]);
    }

    public function storeGiftmessage(Request $request) {
        Cart::find($request->id)->update([
            'message' => $request->message
        ]);
    }



}
