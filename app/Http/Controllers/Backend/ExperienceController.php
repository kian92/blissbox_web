<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Hashids\Hashids;
use Auth;

use App\Models\Experience;
use App\Models\Universe;
use App\Models\Giftbox;
use App\Models\Company;
use App\Models\User;
use App\Models\Voucher;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.administrator.experience.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universes = Universe::all();
        $giftboxes = Giftbox::all();
        $companies = Company::all();

        return view('backend.administrator.experience.create', ['giftboxes' => $giftboxes, 'universes' => $universes, 'companies' => $companies]);
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
            'name' => 'required',
            'company' => 'required',
            'giftbox' => 'required',
            'code' => 'required',
            'pax' => 'required',
            'address' => 'required',
            'information' => 'required',
        ]);

        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $thumbnail = $request->file('thumbnail')->hashName();
            $request->file('thumbnail')->store('public/experiences');
        } else {
            $thumbnail = '';
        }

        $experience = Experience::create([
                'company_id' => $request->company,
                'thumbnail' => $thumbnail,
                'name' => $request->name,
                'code' => $request->code,
                'pax' => $request->pax,
                'duration' => $request->duration,
                'email' => $request->reservationEmail,
                'phone' => $request->reservationContact,
                'address' => $request->address,
                'requirements' => $request->requirements,
                'services' => $request->services,
                'information' => $request->information,
            ]);

        try {
            $giftbox = Experience::find($experience['id'])->giftboxes()->attach($request->giftbox);

            $giftbox = true;
        } catch (Exception $e) {
            $giftbox = false;
        }

        if ($experience && $giftbox) {
            return ['status' => true];            
        } else {
            return ['status' => false];
        }
    }

    public function all() {
        $experiences = Experience::all();

        if ($experiences) {
            return ['status' => true, 'experiences' => $experiences];
        } else {
            return ['status' => false];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hashids = new Hashids();

        $id = $hashids->decode($id)[0];

        $experiences = Giftbox::with(['experiences', 'experiences.company'])->find($id)->experiences()->get();

//        $experiences->load('giftboxes', 'company');

        return view('backend.user.experience.view', ['experiences' => $experiences]);
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

    public function fetch() {

        $experiences = Experience::where('company_id', Auth::user()->company_id)->orderBy('name', 'asc')->get();

        if ($experiences) {
            return [ 'status' => true, 'result' => $experiences ];
        } else {
            return [ 'status' => false ];
        }

    }

    public function fetchExperience($code) {
        $result = Voucher::where('code', $code)->first();

        $result = Giftbox::find($result->giftbox_id)->experiences()->where([['giftbox_id', $result->giftbox_id], ['company_id', Auth::user()->company_id]])->get();

        if (!$result->isEmpty()) {
            return [ 'status' => true, 'result' => $result ];
        } else {
            return [ 'status' => false ];
        }
    }

}
