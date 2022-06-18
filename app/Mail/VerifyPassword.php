<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyPassword extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public array $userInfo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userInfo)
    {
        return $this->userInfo = $userInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from(env('MAIL_FROM_ADDRESS'))->
        markdown('emails.verifyPassword');
    }
}
