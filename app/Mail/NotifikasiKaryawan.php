<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiKaryawan extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $messageText;

    /**
     * Create a new message instance.
     */
    public function __construct($subjectText, $messageText)
    {
        $this->subjectText = $subjectText;
        $this->messageText = $messageText;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->subjectText)
                    ->view('emails.notifikasi-karyawan')
                    ->with(['messageText' => $this->messageText]);
    }
}
