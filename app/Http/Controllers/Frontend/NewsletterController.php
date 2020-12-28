<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use App\Mail\Newsletters;

class NewsletterController extends Controller
{
    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email'
        ]);

        try {
            $result = Newsletter::create([
                'email' => $request->email
            ]);

            $array = array();

            Mail::to($request->email)->send(new Newsletters($array));

            if ($result) {
                return [ 'status' => true, 'message' => 'Thank you for registering to Blissbox Newsletter.' ];
            } else {
                return [ 'status' => false];
            }
        } catch (QueryException $e) {
            switch ($e->errorInfo[1]) {
                case 1364:
                    return ['status' => false, 'message' => 'Please check your Giftbox Model to ensure the field is writeable and it is not NULL'];
                    break;
                case 1062:
                    if ($e->errorInfo[0] == 23000) {
                        return ['status' => false, 'message' => 'The email you have entered is already existed in our database.'];
                    }
                    break;
                default:
                    return $e->errorInfo[2];
                    break;
            }
        }

    }
}
