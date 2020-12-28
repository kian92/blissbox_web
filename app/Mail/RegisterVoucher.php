<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterVoucher extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $coupon)
    {
        $this->name = $name;
        $this->coupon = $coupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.register')
            ->with(['user' => $this->name, 'coupon' => $this->coupon])
            ->from('noreply@blissbox.asia', 'Blissbox Community')
            ->subject('Welcome to Blissbox Community');
    }
}
