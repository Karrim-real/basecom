<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    public array $messages;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messages)
    {
        return $this->messages = $messages;
        // dd($messages);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))->
        markdown('emails.contact-us');
    }
}
