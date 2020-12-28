<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Universe;
use Illuminate\Support\Facades\Storage;
use Hashids\Hashids;

class UniverseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->salt = '@#L$?F39DeyY_efT';
    }

    public function index()
    {
        return view('backend.administrator.universe.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.administrator.universe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'initial' => 'required',
            'name' => 'required',
        ]);

        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $thumbnail = $request->file('thumbnail')->hashName();
            $request->file('thumbnail')->store('public/experiences');
        } else {
            $thumbnail = '';
        }

        $result = Universe::firstOrCreate([
            'initial' => $request->initial,
            'thumbnail' => $thumbnail,
            'name' => $request->name,
            'description' => $request->description
        ]);

        if ($result) {
            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $request->file('thumbnail')->store('public/universes');
            }
            return [ 'result' => true ];
        } else {
            return [ 'result' => false ];
        }
    }

    /**
     * Display all the resources.
     *
     * @return $array Return Universe
     */
    public function all()
    {
        return ['universes' => Universe::all()];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.administrator.universe.edit');
    }

    public function fetch($id) {

        $hashids = new Hashids();

        $id = $hashids->decode($id)[0];

        $universe = Universe::find($id);

        if ($universe) {
            return ['status' => true, 'universe' => $universe];
        } else {
            return ['status' => false];
        }
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
        $this->validate($request, [
            'initial' => 'required',
            'name' => 'required',
        ]);

        $universe = Universe::findorFail($id);

        $universe->initial = $request->initial;
        $universe->name = $request->name;
        $universe->description = $request->description;

        if (!is_null($request->thumbnail)) {
            Storage::delete('public/universes/' . $universe->thumbnail);
            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $request->file('thumbnail')->store('public/universes');
            }
            $universe->thumbnail = $request->file('thumbnail')->hashName();
        }

        if ($universe->save()) {
            return ['status' => true];
        } else {
            return ['status' => false];
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hashids = new Hashids();

        $id = $hashids->decode($id)[0];

        $result = Universe::find($id)->delete();

        if ($result) {
            return ['status' => true];
        } else {
            return ['status' => false];
        }
    }
}
