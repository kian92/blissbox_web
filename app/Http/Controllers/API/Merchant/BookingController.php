<?php

namespace App\Http\Controllers\API\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\BranchExperience;
use app\Helpers\DDD;

class BookingController extends Controller
{
    public function revoke(Request $request) {
        $result = BranchExperience::findOrFail($request->id)->delete();

        if ($result) {
            return ['status' => true];
        } else {
            return ['status' => false];
        }
    }
}
