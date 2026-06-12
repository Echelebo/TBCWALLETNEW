<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class EmailSender extends Mailable
{
    use Queueable, SerializesModels;

    private $md;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($md)
    {
        $this->md = $md;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->md['subject'])
                    ->view('mail.regconfirm');
    }
}
