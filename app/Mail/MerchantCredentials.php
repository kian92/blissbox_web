<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MerchantCredentials extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('email.merchant-account')
//            ->from('michel@blissbox.asia', 'Michel Saliba')
//            ->with(['user' => $this->user, 'password' => $this->password])
//            ->replyto('michel@blissbox.asia', 'Michel Saliba')
//            ->subject('Blissbox Launch');

        return $this->view('email.newinvoice')
            ->from('michel@blissbox.asia', 'Michel Saliba')
//            ->with(['user' => $this->user, 'password' => $this->password])
            ->replyto('michel@blissbox.asia', 'Michel Saliba')
            ->subject('Blissbox Launch');
    }
}
