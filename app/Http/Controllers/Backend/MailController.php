<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\EVoucher;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Editor;
use App\Mail\Media;

class MailController extends Controller
{
    public function media() {
        // Get All User From Media
        $users = Editor::all();

        foreach($users AS $user) {
            Mail::to($user->email)->send(
                new Media(
                    $user)
            );
        }
    }

    public function voucherPersonal($order_id) {
        Mail::to(Auth::user()->email)->send(
            new EVoucher(
                Auth::user()->id,
                $leftover,
                $giftbox)
        );
    }

    public function voucherFriend() {

    }
}
