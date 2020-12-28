<?php

namespace App\Http\Controllers\Frontend;

use app\Helpers\DDD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Universe;
use App\Models\Giftbox;

class UniverseController extends Controller
{
    public function index() {
        return view('frontend.universes.all');
    }

    public function fetch($name) {

        $total_user = array();
        $experiences = array();

        $giftboxes = Giftbox::whereHas('universe', function($query) use ($name) {
            $query->where('name', $name);
        })->where('status', 1)->orderBy('price', 'asc')->get();

        if (!$giftboxes->isEmpty()) {

            foreach($giftboxes AS $giftbox) {
                array_push($total_user, Giftbox::find($giftbox->id)->reviews()->count());
            }

        } else {
            $universe = Universe::where('name', $name)->first();
        }

        if (count($giftboxes) > 0) {
            $experiences = Giftbox::with('experiences')->find($giftboxes[0]['id'])->experiences()->orderByRaw('RAND()')->take(5)->get();
        } else {
            $experiences = Giftbox::with('experiences')->find(1)->experiences()->whereBetween('giftbox_id', [1, 1])->orderByRaw('RAND()')->take(5)->get();
        }

        $experiences->load('giftboxes');

        if (count($giftboxes) > 0) {
            return [
                'status' => true,
                'universe' => $giftboxes[0]->universe,
                'giftboxes' => $giftboxes,
                'total_user' => $total_user,
                'experiences' => $experiences,
                'giftbox_experience' => $experiences[0]->giftboxes
            ];
        } else if ($universe) {
            if (count($experiences) > 0) {
                return ['status' => true, 'universe' => $universe, 'giftboxes' => $giftboxes, 'total_user' => $total_user, 'experiences' => $experiences, 'giftbox_experience' => $experiences[0]->giftboxes];
            } else {
                return ['status' => false];
            }
        } else {
            return ['status' => false];
        }
    }
}
