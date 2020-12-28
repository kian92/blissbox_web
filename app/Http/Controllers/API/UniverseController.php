<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Universe;

class UniverseController extends Controller
{
    public function all() {
        $universes = Universe::all();

        if ($universes) {
            return [ 'status' => true, 'result' => $universes ];
        } else {
            return [ 'status' => true ];
        }
    }
}
