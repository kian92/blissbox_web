<?php

namespace App\Http\Controllers\API\Merchant;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Models\Voucher;
use App\Models\Branch;
use App\Models\Experience;

use App\Mail\MerchantRefund;

use App\Helpers\DDD;

class RedemptionController extends Controller
{
    public function redeem(Request $request) {
        $this->validate($request, [
            'pin' => 'required|digits:6',
        ]);
        $found = Voucher::where([['code', $request->code], ['pin', $request->pin]])->first(); 
        if ($found) {
            // Update Booking Date and Time
            $found->update([
                'booking_date' => Carbon::parse($request->date)->format('Y-m-d'),
                'booking_time' => $request->time . ':00'
            ]);

            // Retrieve Box Name, Price, Redemption Date
            $giftbox = Experience::with('giftboxes', 'giftboxes.experience')->findOrFail($request->experience)->giftboxes()->get();

            // Retrieve Merchant Information
            $company = Branch::findOrFail($request->branch)->company()->get();

            DDD::ddd($giftbox);

            // Create Refund Invoice


            // Send Invoice Email
            Mail::to('bryan@blissbox.asia')->send(new MerchantRefund(
                $company->name,
                $company->registered_address . ',' . $company->country . ' ' . $company->postal_code,  
                $giftbox->name,
                $giftbox->price
            ));
            
            DDD::ddd($company);

            // Send Email to Notify Blissbox Administrator
            return ['status' => true, 'message' => 'Redeem Completed'];
        } else {
            return ['status' => false, 'message' => 'Incorrect PIN number.'];     
        }
    }
}
