<?php

namespace App\Http\Controllers\Backend;

use app\Helpers\DDD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\TransferOwnership;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use App\Mail\EVoucher;

use Auth;
use Carbon\Carbon;
use Milon\Barcode\DNS1D;
use PDF;
use Barryvdh\Snappy;
use Illuminate\Support\Facades\Storage;

use App\Models\Giftbox;
use App\Models\Experience;
use App\Models\Order;
use App\Models\Voucher;

class VoucherController extends Controller
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
        $this->validate($request, [
            'quantity' => 'required|numeric|min:1'
        ]);

        // Retrieve Universe ID
        $box = Giftbox::findOrFail($request->id);

        for ($i = 0; $i < $request->quantity; $i++) {
            
            // Add on 0 if the Giftbox ID does not contains 2 digits
            // Merge Universe ID with the Giftbox ID
            $referenceCode = $box->universe_id . str_pad($box->id, 2, "0");

            // Generate Random Number
            // str_pad to ensure the number leading with 0
            for ($group = 0; $group < 3; $group++) { 
                $referenceCode .= str_pad(rand(0, 999), 3, 0, STR_PAD_LEFT); 
            }

            // Check if reference code duplicated
            try {
                $result = Voucher::create([
                    'giftbox_id' => $request->id,
                    'code' => $referenceCode,
                    'pin' => str_pad(rand(0, 999999), 6, 0, STR_PAD_LEFT),
                    'status' => 2
                    ]);
            } catch (QueryException $error) {
                switch ($error->errorInfo[1]) {
                    case 1364:
                        return ['status' => fail, 'message' => 'Please check your Giftbox Model to ensure the field is writeable and it is not NULL'];
                        break;
                    case 1062:
                        // Reset the incremental value
                        $i--;
                        break;
                    default:
                        return $error->errorInfo[2];
                        break;
                }
            }
        }

        if ($result) {
            return ['status' => true];
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activate()
    {
        return view('backend.user.voucher.activate');
    }

    /**
     * Activate EVoucher
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request) {
        $this->validate($request, [
            'code' => 'required',
            'pin' => 'required'
        ]);

        $voucher = Voucher::where('code', $request->code);

        if (!is_null($voucher)) {
            $voucher = Voucher::where(
                [
                    ['user_id', null],
                    ['code', $request->code],
                    ['pin', $request->pin],
                ])
//                ->whereBetween('status', [2, 3])
                ->where('status', 3)
                ->update(['user_id' => Auth::user()->id]);
        } else {
            return [ 'status' => false, 'message' => 'EVoucher is not available' ];
        }

        if ($voucher) {
            return ['status' => true];
        } else {
            return ['status' => false, 'message' => 'Your voucher is not available. Please contact Blissbox Support.'];
        }
    }

    public function check() {
        return view('backend.merchant.voucher.validate');
    }

    public function validateVoucher(Request $request) {
        $this->validate($request, [
            'code' => 'required',
            'pin' => 'required'
        ]);

        $voucher = Voucher::with('user', 'experience')->where([['code', $request->code],['pin', $request->pin]])->whereBetween('status', [2, 3, 4])->first();

        if (!is_null($voucher)) {
//            $voucherStatus = EVoucher::with('users')->find($voucher[0]['id'])->users()->get();
            $experienceLists = Experience::where('company_id', Auth::user()->company_id)->get();

            return [ 'status' => true, 'result' => $voucher, 'experiences' => $experienceLists];
        } else {
            return [ 'status' => false ];
        }

    }

    public function checkVoucherOwner(Request $request) {

        $voucher = Voucher::where([['code', $request->code], ['status', '3']])->get();

        if (!$voucher->isEmpty()) {
            if (!$voucher[0]['user_id']) {
                return [ 'status' => true, 'info' => false, 'message' => 'Please enter beneficiary email to register an account', 'code' => 1, 'expiration_at' => $voucher[0]['expiration_at']];
            } else {
                return [ 'status' => true,  'info' => true, 'message' => "EVoucher Reference Number found." ];
            }
        } else {
            return [ 'status' => false, 'message' => 'EVoucher is not valid' ];
        }
    }

    public function transferOwnership(Request $request) {

        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $result = Voucher::with('user')->where(['code' => $request->code, 'user_id' => Auth::user()->id, 'status' => 3])->update(
            [
                'ownership_link' => str_random(40),
                'ownership_status' => 0
            ]
        );

        Mail::to($request->email)->send(
            new TransferOwnership(
                false,
                Auth::user()->last_name . ' ' . Auth::user()->first_name,
                $request->code
            )
        );

        if ($result) {
            return [ 'status' => true, 'message' => 'Email has been sent to the beneficiary.' ];
        } else {
            return [ 'status' => false ];
        }

        // Update EVoucher user to NULL

        // Link to the beneficiary, Login require
    }

    public function acceptVoucher($link) {

        if (Auth::user()->role_id == 1) {

            $result = Voucher::where([['ownership_link', $link], ['ownership_status', 0]])->update([
                'user_id' => Auth::user()->id,
                'ownership_status' => 1
            ]);

            if ($result) {

                Mail::to(Auth::user()->email)->send(
                    new TransferOwnership(
                        true,
                        NULL,
                        $link
                    )
                );

                return view('backend.user.voucher.success', ['status' => true, 'message' => 'EVoucher has been transferred to your account']);
            } else {
                return view('backend.user.voucher.success', ['status' => false, 'message' => 'Link is not longer available']);
            }
        } else {
            return view('backend.user.voucher.success', ['status' => false, 'message' => 'You are not allow to accept the voucher with this account.']);
        }
    }

    public function voucherActivation() {
        return view('backend.administrator.voucher.activate');
    }

    public function activateVoucher(Request $request) {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $result = Voucher::where(
            [
                ['user_id', null],
                ['code', $request->code],
            ])
            ->where([
                ['code', $request->code],
                ['status', 2],
            ])
            ->update([
                'status' => 3,
                'activation_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'expiration_at' => Carbon::now()->addYear()->format('Y-m-d H:i:s')
            ]);

        if($result) {
            return [ 'status' => true, 'message' => 'EVoucher has been activated' ];
        } else {
            return [ 'status' => false, 'message' => 'EVoucher cannot be found / invalid' ];
        }
    }

    /*
    public function generatePdf($order_information, Request $request) {
        $voucher_information = array();
        $voucher_pdf = array();

        foreach ($vouchers AS $index => $voucher) {
            $giftbox = Giftbox::find($voucher->pivot['giftbox_id']);

            // Generate PDF
            array_push($voucher_information, generate($giftbox->universe_id, $giftbox->id, Auth::user()->id));

            // Generate Barcode and PDF
            $barcode = DNS1D::getBarcodePNG($voucher_information[$index]['code'], "C128C");

            $pdf = PDF::loadView('service.voucher',
                [
                    'barcode' => $barcode,
                    'voucher' => $voucher_information[$index],
                    'gift_message' => $voucher->pivot['message']
                ]
            );

            // Generate filename based on timestamp and voucher code
            $voucher_name = Carbon::now()->timestamp . '-' . $voucher_information[$index]['code'] . '.pdf';

            Storage::disk('voucher')->put($voucher_name, $pdf->output());
            array_push($voucher_pdf, public_path() . '/storage/vouchers/' . $voucher_name);

            Order::findOrFail($request->id)->send_to()->wherePivot('id', $voucher->pivot['id'])->updateExistingPivot(Auth::user()->id,
                [
                    'voucher_id' => $voucher_information[$index]['id']
                ]
            );
        }

        return array($voucher_pdf, $voucher_information);

    }
    */

    public function sendEmail(Request $request) {
        // Retrieve Send To List
        $order_information = Order::findOrFail($request->id)->send_to()->get();

        // Generate PDF
        // $list = $this->generatePdf($order_information), $request);

        // Send to Beneficiary
        $voucher_information = $this->sendToOwner($order_information, $request);
            
        // Return Generated EVoucher
        return [ 'status' => true ];
    }

    public function sendToOwner($order_information, $request) {

        $voucher_list = array();

        // Send e-mail to recipient and generate voucher
        foreach ($order_information AS $index => $voucher) {

            $giftbox = Giftbox::find($voucher->pivot['giftbox_id']);

            $voucher_information = generate($giftbox->universe_id, $giftbox->id, Auth::user()->id);

            if (!empty($voucher->pivot['to'])) {
                $to = $voucher->pivot['to'];
            } else {
                $to = '';
            }

            if ($voucher->pivot['recipient'] === 'Personal') {
                $user = Auth::user()->email;
            } else {
                $user = $voucher->pivot['recipient'];
            }

            array_push($voucher_list, $voucher_information['code']);
            $barcode_filename = Auth::user()->id . '-' . $voucher_information['code'] . '.png';

            Storage::put('public/vouchers/' . $barcode_filename, base64_decode(DNS1D::getBarcodePNG($voucher_information['code'], "C128C")));

            Order::findOrFail($request->id)->send_to()->wherePivot('id', $voucher->pivot['id'])->updateExistingPivot(Auth::user()->id,
                [
                    'voucher_id' => $voucher_information['id']
                ]
            );

            $barcode = '';

            // Generate PDF file for EVoucher Reference Code and Pin Code
            Mail::to($user)->send(
                new EVoucher(
                    $voucher_information,
                    $barcode_filename,
                    $to,
                    $voucher->pivot['message']
                )
            );
        }
        Order::find($request->id)->update(['voucher_list' => json_encode($voucher_list)]);
    }
}
