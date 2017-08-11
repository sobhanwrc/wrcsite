<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class wrc_email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $last_name;
    public $form_email_id;
    public $mobile_number;
    public $comment;
    public $emailfrom;

    public function __construct($name,$mobile_number,$comment,$form_email_id)
    {
        $this->name = $name;
        $this->mobile_number = $mobile_number;
        $this->comment = $comment;
        $this->emailfrom = $form_email_id;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->emailfrom, 'WRC Technologies Pvt Ltd')
        ->subject('Contact Us')
        ->view('email.contact_us');
    }
}
