<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{
    /**
     * Redirect user to the corresponding page based on user role and show
     * the page
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    	if (Auth::user()->role_id === 1) {
            return redirect('/mygift');
            // return redirect()->back();
        } else if (Auth::user()->role_id === 2) {
            return redirect('/dashboard/merchant');
        } else {
            return redirect('/dashboard/admin');
        }
    }
}
