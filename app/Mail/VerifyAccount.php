<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyAccount extends Mailable
{
    use Queueable, SerializesModels;
    public array $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
       return $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('emails.verifyAccount');
        return $this->from(env('MAIL_FROM_ADDRESS'))->
        markdown('emails.verifyAccount');
    }
}
