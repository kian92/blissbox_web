<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Company;
use App\Models\CompanyLog;
use App\Models\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use PDF;
use Storage;
use Carbon\Carbon;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.administrator.company.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.administrator.company.create');
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
            'companyName' => 'required|string',
            /*
            'registrationNo' => 'required',
            'natureOfBusiness' => 'required',
            'country' => 'required',
            'registeredAddress' => 'required',
            'postalCode' => 'required',
            'website' => 'url',
            'firstName' => 'required',
            'designation' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'businessHours' => 'required',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:password'
            */
        ]);

        // Store Company Information
        $resultCompany = $this->storeCompany($request);

        // Store User Information
        $resultUser = $this->storeUser($request, $resultCompany->id);

        // Store Payment Information
        $this->storePayment($request, $resultCompany->id);

        // Store Company Logs Information
        $this->storeLog($resultUser->id, $resultCompany->id, $resultCompany->name);

        // $this->generatePDF($request);

        if ($resultUser && $resultCompany) {
            return ['status' => true];
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

    public function all() {
        $companies = Company::with(['payment', 'users'])->get();

        return [ 'status' => true, 'companies' => $companies ];
    }

    public function fetch($name) {
        $result = Company::where('name', $name)->get();

        if ($result->isEmpty()) {
            return [ 'status' => false ];
        } else {
            return [ 'status' => true ];
        }
    }

    /**
     *
     * Store user details into database
     *
     * @param array $request List of Input Details by Administrator
     * @param integer $request Company ID
     * @return array Storing result
     */
    public function storeUser($request, $company_id) {

        switch ($request->country) {
            case "Singapore":
                $country = 65;
                break;
            case "Malaysia":
                $country = 60;
                break;
            default:
                break;
        }

        $resultUser = User::create([
            'role_id' => '2',
            'company_id' => $company_id,
            'title' => $request->title,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'designation' => $request->designation,
            'country' => $country,
            'phone' => $request->mobile,
            'postal_code' => $request->postalCode,
            'password' => bcrypt($request->password)
        ]);

        return $resultUser;
    }

    /**
     *
     * Store company details into database
     *
     * @param array $request List of Input Details by Administrator
     * @param integer id User ID
     * @return array Storing result
     */
    public function storeCompany($request) {
        $business_hour = $this->processBusinessHour($request->businessHours);

        $resultCompany = Company::create([
            'name' => $request->companyName,
            'registration_no' => $request->registrationNo,
            'nature_of_business' => $request->natureOfBusiness,
            'fax' => $request->fax,
            'country' => $request->country,
            'registered_address' => $request->registeredAddress,
            'postal_code' => $request->postalCode,
            'website' => $request->website,
            'business_type' => $request->businessType,
            'business_hours' => json_encode($business_hour),
        ]);

        return $resultCompany;
    }

    /**
     *
     * Store payment details into database
     *
     * @param array $request List of Input Details by Administrator
     * @param integer id Company ID
     */
    public function storePayment($request, $id) {
        Payment::create([
            'company_id' => $id,
            'bank' => $request->bank,
            'branch' => $request->branch,
            'account_no' => $request->accountNo,
            'swift_code' => $request->swiftCode,
            'paypal' => $request->paypal,
            'other' => $request->other,
        ]);
    }

    /**
     *
     * Store log information of company and creator into database
     *
     * @param integer $userId
     * @param integer $companyId
     * @param string $companyName
     */
    public function storeLog($userId, $companyId, $companyName) {
        CompanyLog::create([
            'user_id' => $userId,
            'company_id' => $companyId,
            'action' => 'Create Company Profile',
            'description' => 'Create Company Profile of ' . $companyName
        ]);
    }

    /**
     *
     * Generate company details into PDF
     *
     * @param array $request List of Input Details by Administrator
     * @return download link of the PDF
     */
    public function generatePDF($request) {
        $pdf = PDF::loadView('service.pdf', ['pdf' => $request, 'time' => Carbon::now]);

        Storage::put('/public/pdf/' . $request->companyName, $pdf->output());

        return $pdf->download($request->companyName . '.pdf');
    }

    /**
     *
     * Resolve the operation time
     *
     * @param array $companies List of Company Details
     * @return array
     */
    public function processBusinessHour($companies) {

        foreach($companies AS $index => $arr) {


            if (!array_filter($arr)) {

                unset($companies[$index]);
                $companies[$index] = array(
                    'status' => 'Closed'
                );
            }

        }

        return $companies;
    }

    public function getBusinessHour($id) {
        $company = Company::find($id);

        foreach($array AS $index=>$arr) {


            if (!array_filter($arr)) {

                unset($array[$index]);
                $array[$index] = array(
                    'status' => 'Closed'
                );
            }

        }

        foreach($array AS $index=>$arr) {
            if (array_key_exists("status", $arr)) {
                echo $index . " Key exists! <br/>";
            } else {
                echo "Not exists <br/>";
            }
        }
    }

}