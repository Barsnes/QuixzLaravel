<?php

namespace App\Mail;

use App\Medlem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class nyttMedlem extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(Medlem $form)
    {
        $this->form = $form;
        $this->pdf = $form->first_name.'-'.$form->last_name.'.pdf';
    }

    public function build()
    {
        return $this->view('emails.medlem')->withForm($this->form)->attach('pdf/'.$this->pdf);
    }
}
