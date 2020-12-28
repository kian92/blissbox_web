<?php

namespace App\Http\Controllers\API;

use app\Helpers\DDD;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Mail\EventMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }

        $code = strtoupper(substr(sha1(time()), 0, 6));

        try {
            $event = Event::create([
                'title' => 'Guerrilla Events',
                'name' => $request->name,
                'email' => $request->email,
                'code' => $code
            ]);

            if (!is_null($event)) {

                // Send Event Code For the User
                Mail::to($request->email)->send(
                    new EventMail(
                        $request->name,
                        $code
                    )
                );

                return [ 'status' => true, 'message' => 'Thank you for registering. You should receive our email shortly.' ];
            } else {
                return [ 'status' => false, 'message' => 'There is an issue with the server. Please contact our staff.' ];
            }

        } catch (QueryException $error) {
            if ($error->errorInfo[1]) {
                return [ 'status' => false, 'message' => 'Email address has signed up to our event' ];
            }
            return [ 'status' => false, 'message' => 'There is an issue with the server. Please contact our staff.' ];
        }
    }
}
