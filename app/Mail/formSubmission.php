<?php

namespace App\Mail;

use App\ClubForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class formSubmission extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(ClubForm $form)
    {
        $this->form = $form;
        $this->pdf = $form->first_name.'-'.$form->last_name.'.pdf';

        $this->pdf_de = $form->first_name.'-'.$form->last_name.'_de'.'.pdf';
    }

    public function build()
    {
        return $this->view('emails.club_form')->withForm($this->form)->attach('pdf/'.$this->pdf)->attach('pdf/'.$this->pdf_de);
    }
}
