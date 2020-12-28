<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use app\Helpers\DDD;

use App\Http\Controllers\Controller;

use Hashids\Hashids;

use App\Models\Giftbox;
use App\Models\Universe;

class GiftboxController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('backend.administrator.giftbox.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $universes = Universe::all();
        return view('backend.administrator.giftbox.create', ['universes' => $universes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'universe' => 'required',
            'initial' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $thumbnail = $request->file('thumbnail')->hashName();
            $request->file('thumbnail')->store('public/experiences');
        } else {
            $thumbnail = '';
        }

        $result = Giftbox::create([
            'universe_id' => $request->universe,
            'thumbnail' => $thumbnail,
            'initial' => $request->initial,
            'name' => $request->name,
            'price' => ($request->price * 100),
            'description' => $request->description
        ]);

        if ($result) {
            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $request->file('thumbnail')->store('public/giftboxes');
            }
            return ['result' => true];
        } else {
            return ['result' => false];
        }
    }

    /**
     * Display the specified resource.
     *
     * @return $array Return Universe
     */
    public function all()
    {
        return ['giftboxes' => Giftbox::all()->toArray()];
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $giftboxes = findOrFail($id);
        return [ 'giftboxes' => $giftboxes ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('backend.administrator.giftbox.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $this->validate($request, [
            'universe' => 'required',
            'initial' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);

        $giftbox = Giftbox::findorFail($id);

        $giftbox->universe_id = $request->universe;
        $giftbox->initial = $request->initial;
        $giftbox->name = $request->name;
        $giftbox->price = $request->price * 100;
        $giftbox->description = $request->description;

        if (!is_null($request->thumbnail)) {
            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $request->file('thumbnail')->store('public/giftboxes');
            }
            $giftbox->thumbnail = $request->file('thumbnail')->hashName();
        }

        if ($giftbox->save()) {
            return ['status' => true];
        } else {
            return ['status' => false];
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function fetch($id) {

        $universes = Universe::all();
        $giftbox = Giftbox::with('universe')->find($id);

        dd($giftbox);

        if ($giftbox) {
            return ['status' => true, 'universes' => $universes, 'giftbox' => $giftbox];
        } else {
            return ['status' => false];
        }
    }

    public function fetchExperience($id) {

        $hashids = new Hashids();

        $id = $hashids->decode($id)[0];

        $experiences = Giftbox::with(['experiences.company','experiences.giftboxes'])->find($id);

//        $experiences = Experience::find($id)->giftboxes();


        if (!$experiences->isEmpty()) {
            return [ 'status' => true, 'result' => $experiences ];
        } else {
            return [ 'status' => false ];
        }
    }


    public function showParent($id) {
        $results = Giftbox::where('universe_id', $id)->get();

        return [ 'status' => true, 'result' => $results ];
    }
}
