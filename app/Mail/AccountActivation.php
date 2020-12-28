<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountActivation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $activation_code)
    {
        $this->email = $email;
        $this->name = $name;
        $this->activation_code = $activation_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.account-validation')
            ->with([
                'email' => $this->email,
                'name' => $this->name,
                'activation_code' => $this->activation_code
                ])
            ->from('no-reply@blissbox.asia', 'Blissbox')
            ->subject('Account Activation');
    }
}
