<?php

namespace App\Http\Controllers\Frontend;

use app\Helpers\DDD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function all(Request $request)
    {

        if ($request->session()->has('cart_uuid')) {
            $item_type = DB::select("
                SELECT `giftboxes`.`name`, `giftboxes`.`thumbnail`, `giftboxes`.`price`, `carts`.*, 
                    (SELECT COUNT(giftbox_id) 
                        FROM carts 
                        WHERE `giftboxes`.`id` = giftbox_id 
                        AND `carts`.`session_id` = '" . $request->session()->get('cart_uuid') . "' 
                        AND `carts`.`status` = 1 
                        GROUP BY giftbox_id) AS totalItem
                FROM `carts` 
                    LEFT JOIN `giftboxes` 
                    ON `carts`.`giftbox_id` = `giftboxes`.`id` 
                WHERE `session_id` = '" . $request->session()->get('cart_uuid') . "' 
                GROUP BY `carts`.`giftbox_id`
            ");

            $cart = DB::select("
                SELECT `giftboxes`.`name`, `giftboxes`.`thumbnail`, `giftboxes`.`price`, `giftboxes`.`hasBox`, `carts`.*, 
                    (SELECT COUNT(giftbox_id) 
                    FROM carts 
                    WHERE `giftboxes`.`id` = giftbox_id 
                        AND `carts`.`session_id` = '" . $request->session()->get('cart_uuid') . "' 
                    GROUP BY giftbox_id) AS totalItem 
                FROM `giftboxes` 
                    INNER JOIN `carts` ON `giftboxes`.`id` = `carts`.`giftbox_id` 
                WHERE `carts`.`session_id` = '" . $request->session()->get('cart_uuid') . "'
                ");

            if ($cart) {
                return ['status' => true, 'item_type' => $item_type, 'items' => $cart, 'count' => count($cart)];
            } else {
                return ['status' => false];
            }
        } else {
            return ['status' => false];
        }
    }

    public function cart(Request $request)
    {
        // Check if UUID exist
        // IF UUID does not exist
        if (!$request->session()->has('cart_uuid')) {
            // Generate UUID
            $uuid = Uuid::generate()->string;
            $request->session()->put('cart_uuid', $uuid);

            // Store item into cart
            Cart::create([
                'session_id' => $uuid,
                'giftbox_id' => $request->id,
                'package' => 'e-voucher',
                'status' => 1,
            ]);
            // ELSE
        } else {
            // Retrieve the UUID
            $uuid = $request->session()->get('cart_uuid');

            // Store item into cart
            Cart::create([
                'session_id' => $uuid,
                'giftbox_id' => $request->id,
                'package' => 'e-voucher',
                'status' => 1,
            ]);
        }

        return ['status' => true, 'message' => $request->name . ' is added to Cart'];

    }

    public function update($id, Request $request)
    {

        // Calculation
        $current_total = Cart::where([
                    ['session_id', $request->session()->get('cart_uuid')],
                    ['giftbox_id', $id]
                ])->count();

        if ($request->quantity < $current_total) {
            $condition = $current_total - $request->quantity;
            if ($request->session()->has('cart_uuid')) {
                $result = Cart::where([
                    ['session_id', $request->session()->get('cart_uuid')],
                    ['giftbox_id', $id]])
                    ->orderBy('id', 'DESC')
                    ->take($condition)
                    ->delete();
            }
        } else {
            $condition = $request->quantity - $current_total;
            // Insert new record based on the quantity
            try {
                for ($i = 0; $i < $condition; $i++) {
                    Cart::create([
                        'session_id' => $request->session()->get('cart_uuid'),
                        'giftbox_id' => $id,
                        'package' => 'e-voucher',
                        'status' => 1,
                    ]);

                    $result = true;
                }
            } catch (Exception $e) {
                $result = false;
            }
        }

        if ($result) {
            return ['status' => true];
        } else {
            return ['status' => false];
        }
    }

    public function destroy(Request $request)
    {
        Cart::where([
            ['session_id', $request->session()->get('cart_uuid')],
            ['giftbox_id', $request->id],
            ['status', 1]]
        )->delete();

        return ['status' => true, 'message' => 'Removed from cart'];
    }

    public function count(Request $request)
    {
        $result = Cart::find();
        return $result;
    }

    public function storeRecipient(Request $request)
    {
        Cart::find($request->id)->update([
            'recipients' => $request->recipient
        ]);
    }

    public function storePackage(Request $request)
    {
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

    public function storeTo(Request $request)
    {
        Cart::find($request->id)->update([
            'to' => $request->to
        ]);
    }

    public function storeGiftmessage(Request $request)
    {
        Cart::find($request->id)->update([
            'message' => $request->message
        ]);
    }
}
