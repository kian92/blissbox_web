<?php

namespace App\Http\Controllers\API;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    public function all() {
        $experiences = Experience::all();

        if ($experiences) {
            return [ 'status' => true, 'result' => $experiences ];
        } else {
            return [ 'status' => true ];
        }
    }
}
