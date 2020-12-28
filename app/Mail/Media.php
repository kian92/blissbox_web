<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Carbon\Carbon;

class Media extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->info = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.media.media')
            ->from('jennifer@blissbox.asia', 'Jennifer Kwek')
            ->with(['name' => $this->info['name']])
            ->replyto('jennifer@blissbox.asia', 'Jennifer Kwek')
            ->subject('[' . $this->info['company_name'] . '] Invitation : Launch of Blissbox - We Re - Invent Gifting');
    }
}
