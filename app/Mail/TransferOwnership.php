<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use App\Models\Voucher;
use Milon\Barcode\DNS1D;

class TransferOwnership extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($accept, $user, $voucher)
    {
        $this->accept = $accept;
        $this->user = $user;
        $this->voucher = $voucher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if (!$this->accept) {
            $vouchers = Voucher::with('giftbox')->where('code', $this->voucher)->first();

            $email = $this->view('email.ownership.send')
                ->with(['user' => $this->user, 'vouchers' => $vouchers])
                ->from('purchase@blissbox.asia', 'Purchase Blissbox')
                ->replyto('purchase@blissbox.asia', 'Purchase Blissbox')
                ->subject('Blissbox - EVoucher Transfer');

            return $email;
        } else {
            $voucher = Voucher::with('giftbox')->where('ownership_link', $this->voucher)->first();

            if (is_null($voucher['file_name'])) {
                $barcode = DNS1D::getBarcodePNG($voucher['code'], "C128C");
                $pdf = PDF::loadView('service.voucher', ['barcode' => $barcode, 'voucher' => $voucher]);

                $voucher_name = Carbon::now()->timestamp;
                Storage::disk('voucher')->put($voucher_name .'-'. $voucher['code'].'.pdf', $pdf->output());

                storeFileName($voucher['id'], $voucher_name .'-'. $voucher['code']);
            }

            $email = $this->view('email.ownership.accept')
                ->with(['voucher' => $voucher])
                ->from('purchase@blissbox.asia', 'Purchase Blissbox')
                ->replyto('purchase@blissbox.asia', 'Purchase Blissbox')
                ->subject('Blissbox - EVoucher Transfer')
                ->attach('storage/vouchers/' . $voucher['file_name'] . '.pdf');

            return $email;
        }
    }
}
