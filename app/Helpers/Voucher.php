<?php

use Illuminate\Database\QueryException;
use Carbon\Carbon;

use App\Models\Voucher;
use App\Models\Giftbox;
use Milon\Barcode\DNS1D;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\Snappy;
use Illuminate\Support\Facades\Storage;

function generate($universe_id, $giftbox_id, $user_id) {

    $referenceCode = $universe_id . str_pad($giftbox_id, 2, "0");

    // Generate Random Number
    // str_pad to ensure the number leading with 0
    for ($group = 0; $group < 3; $group++) {
        $referenceCode .= str_pad(rand(0, 999), 3, 0, STR_PAD_LEFT);
    }
    // Check if reference code duplicated
    try {
        if (!is_null($user_id)) {
            $result = Voucher::create([
                'giftbox_id' => $giftbox_id,
                'user_id' => $user_id,
                'code' => $referenceCode,
                'pin' => str_pad(rand(0, 999999), 6, 0, STR_PAD_LEFT),
                'status' => 3,
                'activation_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'expiration_at' => Carbon::now()->addYear()->format('Y-m-d H:i:s')
            ]);
        } else {
            $result = Voucher::create([
                'giftbox_id' => $giftbox_id,
                'code' => $referenceCode,
                'pin' => str_pad(rand(0, 999999), 6, 0, STR_PAD_LEFT),
                'status' => 3,
                'activation_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'expiration_at' => Carbon::now()->addYear()->format('Y-m-d H:i:s')
            ]);
        }
    } catch (QueryException $error) {
        switch ($error->errorInfo[1]) {
            case 1364:
                return ['status' => false, 'message' => 'Please check your Giftbox Model to ensure the field is writeable and it is not NULL'];
                break;
            case 1062:
                // Reset the incremental value
                break;
            default:
                return $error->errorInfo[2];
                break;
        }
    }

    return $result;

}

function generatePhysical($giftbox) {

    $box = Giftbox::findOrFail($giftbox['id']);


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
            'giftbox_id' => $giftbox['id'],
            'user_id' => Auth::user()->id,
            'code' => $referenceCode,
            'pin' => str_pad(rand(0, 999999), 6, 0, STR_PAD_LEFT),
            'status' => 1
        ]);

        $barcode = DNS1D::getBarcodePNG($referenceCode, "C128C");
        $pdf = PDF::loadView('service.voucher', ['barcode' => $barcode, 'voucher' => $result]);

        $voucher_name = Carbon::now()->timestamp;
        Storage::disk('voucher')->put($voucher_name .'-'. $result['code'].'.pdf', $pdf->output());

        storeFileName($result['id'], $voucher_name .'-'. $result['code']);

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

    if ($result) {
        return ['status' => true];
    }
}

function storeFileName($id, $filename) {

    $result = Voucher::find($id)->update([
        'file_name' => $filename
    ]);

    if ($result) {
        return [ 'status' => true ];
    } else {
        return [ 'status' => false ];
    }
}