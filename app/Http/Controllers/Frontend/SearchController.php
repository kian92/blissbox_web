<?php

namespace App\Http\Controllers\Frontend;

use app\Helpers\DDD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Experience;
use App\Models\Giftbox;

class SearchController extends Controller
{
    public function index(Request $request) {
        return view('frontend.search');
    }

    public function search(Request $request) {

//        $experiences = Experience::where([['name', 'LIKE', '%'.$request->keyword.'%'], ['pax', $request->no]])->whereHas('giftboxes', function($query) use ($request) {
//            if ($request->giftboxes !== 'Any') {
//                $query->where([['name', $request->giftboxes]]);
//            }
//        })->get();

        $experiences = Experience::where([['name', 'LIKE', '%'.$request->keyword.'%']])->orWhere([['keyword', 'LIKE', '%'.$request->keyword.'%']])->whereHas('giftboxes', function($query) use ($request) {

        })->get();

//        $experiences = Experience::where([['name', 'LIKE', '%'.$request->keyword.'%'], ['pax', $request->no]])->get();

        if(!$experiences->isEmpty()) {
            $result = trim(str_replace("\r", '', $experiences[0]->information));
            $result = explode(';', trim($result, ";"));
        } else {
            $result = '';
        }

        return view('frontend.search', ['experiences' => $experiences, 'information' => $result ]);
    }
}
