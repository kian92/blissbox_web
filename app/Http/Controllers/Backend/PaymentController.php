<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Payment;

class PaymentController extends Controller
{
    public function fetch($id) {
        $payment = Payment::find($id);

        if ($payment) {
            return ['status' => true, 'payment' => $payment];
        } else {
            return ['status' => false];
        }
    }
}
