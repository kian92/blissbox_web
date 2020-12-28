<?php

namespace App\Http\Controllers\Frontend;

use app\Helpers\DDD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Mail\ContactAdmin;
use Illuminate\Support\Facades\Mail;
use Auth;

use App\Models\Universe;
use App\Models\Giftbox;
use Vinkla\Instagram\Instagram;

class HomeController extends Controller
{
    protected $universes, $giftboxes;

    public function __construct() {
        $this->universes = Universe::all();
        $this->giftboxes = Giftbox::all();
    }

    public function index() {
        DDD::ddd('Homepage');
        return view('frontend.home', ['giftboxes' => $this->giftboxes]);
    }

    public function handler($path) {
        $path = explode('/', $path);
        switch (count($path)) {
            case 1:
                if (
                    $path[0] == "cart" ||
                    $path[0] == "delivery" ||
                    $path[0] == "payment" ||
                    $path[0] == "success"
                ) {
                    return view('frontend.checkout.' . $path[0]);
                } else if (
                    $path[0] == "contact" ||
                    $path[0] == "about" ||
                    $path[0] == "faq" ||
                    $path[0] == "event" ||
                    $path[0] == "terms" ||
                    $path[0] == "privacy"
                ) {
                    return view('frontend.' . $path[0]);
                } else if (
                    $path[0] == "indulge" ||
                    $path[0] == "relax" ||
                    $path[0] == "energize" ||
                    $path[0] == "escape" ||
                    $path[0] == "multitheme" ||
                    $path[0] == "her" ||
                    $path[0] == "him"
                ) {
                    return view('frontend.universes.view', ['universe' => $path[0], 'content' => $this->fetchUniverseGiftbox($path[0])]);
                }  else if ($path[0] == 'how-it-works') {
                    return view('frontend.how');
                } else if ($path[0] == 'point-of-sales') {
                    return view('frontend.point');
                } else {
                    return abort(404);
                }
                break;
            case 2:
                if ($path[0] == "auth" && $path[1] == "box") {
                    if(Auth::user()) {
                        return redirect('/profile');
                    } else {
                        return view('frontend.' . $path[0] . '.' . $path[1]);
                    }
                } else if($path[0] == "faq") {
                    return view('frontend.' . $path[0] . '.' . $path[1]);
                }
                return view('frontend.' . $path[0] . '.' . $path[1]);
                break;
            case 3:
                if ($path[0] == 'checkout') {
                    return view('frontend.' . $path[0] . '.' . $path[1]);
                }
                return view('frontend.universes.giftboxes.view');
                break;
            default:
                return view('frontend.home', ['universes' => $this->universes]);
                break;
        }
    }

    public function fetchUniverseGiftbox($id) {
        $universe = Universe::where('name', $id)->first();

        if (!is_null($universe)) {
            $giftboxes = Giftbox::with(['universe'])->where('universe_id', $universe->id)->get();
        } else {
            $giftboxes = null;
        }

        return [ 'universe' => $universe, 'giftboxes' => $giftboxes ];
    }

    public function fetchGiftbox($universe_name, $giftbox_id) {
        $giftbox = Giftbox::with(['universe'],['universe.giftboxes'])->find($giftbox_id)->first();
        return $giftbox;
    }

    public function sendContact(Request $request) {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Mail::to($request->email)->send(
            new Contact(
                $request->all()
            )
        );

        Mail::to('support@blissbox.asia')->send(
            new ContactAdmin(
                $request->all()
            )
        );

        return [ 'status' => true, 'message' => 'Thank you for sending email to us. We will get back to you within 24 hours.', 'redirect' => url('contact/thanks') ];

    }

    public function contactThankYou() {
        return view('frontend.contact-thankyou');
    }

    public function show($id) {

    }

    public function instagramFeeds() {
        $instagram = new Instagram(env('INSTAGRAM_ACCESS_TOKEN'));

        if ($instagram->get()) {
            return [ 'status' => true, 'result' => $instagram->get() ];
        }
    }
    
}
