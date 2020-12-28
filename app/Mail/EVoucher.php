<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EVoucher extends Mailable
{
    use Queueable, SerializesModels;

    protected $quantity, $giftbox;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($voucher_information, $barcode, $recipient, $gift_message)
    {
        $this->voucher_information = $voucher_information;
        $this->barcode = $barcode;
        $this->recipient = $recipient;
        $this->gift_message = $gift_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $email = $this->view('email.voucher')
            ->with([
                'voucher' => $this->voucher_information,
                'barcode' => $this->barcode,
                'recipient' => $this->recipient,
                'gift_message' => $this->gift_message
            ])
            ->from('purchase@blissbox.asia', 'Purchase Blissbox')
            ->replyto('purchase@blissbox.asia', 'Purchase Blissbox')
            ->subject('Blissbox - Giftbox EVoucher');

        return $email;
    }
}
