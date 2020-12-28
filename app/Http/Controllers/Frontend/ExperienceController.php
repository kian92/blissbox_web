<?php

namespace App\Http\Controllers\Frontend;

use app\Helpers\DDD;
use App\Models\Giftbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    public function index() {
        return view('frontend.experiences.view');
    }

    public function all($giftbox_id) {

        $experiences = Giftbox::with('experiences')->find($giftbox_id)->experiences()->get();

        $experiences->load('giftboxes');

        if(!$experiences->isEmpty()) {
            $info = trim(str_replace("\r", '', $experiences[0]->information));
            $info = explode(';', trim($info, ";"));
        } else {
            $info = '';
        }

        if (!$experiences->isEmpty()) {
            return [ 'status' => true, 'experiences' => $experiences, 'info' => $info ];
        } else {
            return [ 'status' => false ];
        }
    }
}
