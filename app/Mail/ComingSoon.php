<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ComingSoon extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $coupon)
    {
        $this->email = $email;
        $this->result = $coupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.subscribe')
            ->with(['email' => $this->email])
            ->from('noreply@blissbox.asia', 'Blissbox Newsletter')
            ->subject('Blissbox is Live');
    }
}
