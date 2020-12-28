<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use Auth;
use App\Models\Giftbox;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total_review = 0;
        $total_user = 0;

        $user = User::find(Auth::user()->id)->reviews()->where('giftbox_id', $request->id)->first();

        // Check if user already review
        if(!$user) {
            $result = User::find(Auth::user()->id)->reviews()->attach($request->id, [
                'rate' => $request->rate
            ]);
        } else {
            $result = User::find(Auth::user()->id)->reviews()->updateExistingPivot($request->id, [
                'rate' => $request->rate
            ]);
        }

        $giftbox = Giftbox::find($request->id);

        for($i = 1; $i <= 5; $i++) {
            $total_review += $giftbox->reviews()->where('rate', $i)->count() * $i;
            $total_user += $giftbox->reviews()->where('rate', $i)->count();
        }

        Giftbox::find($request->id)->update([
            'review' => (ceil($total_review / $total_user))
        ]);

        return ['status' => true, 'message' => "Review has been submitted"];
        // Create new review if user never does it
        // Update the review if user does it
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
