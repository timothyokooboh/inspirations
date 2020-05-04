<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $senderName;
    public $senderEmail;
    public $senderMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($senderName, $senderEmail, $senderMessage)
    {
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
        $this->senderMessage = $senderMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contacts.email')
        ->from(request('email'))
        ->subject('Contact Us');
    }
}
