<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnglishSendInvoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
   
    public function __construct($details)
    {
        $this->details = $details;
    }
    public function build()
    {
        $title_msg =  $this->details['title']; 
        return $this->subject($title_msg ) 
                    ->view('mail.english_send_invo'); 
    }
}
