<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Applied_job_mail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $email;
    public $mobile_number;
    public $attachment_file;

    public function __construct($name,$email,$mobile,$file)
    {
        $this->name = $name;
        $this->mobile_number = $mobile_number;
        $this->email = $email;
        $this->attachment_file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->emailfrom, 'WRC Technologies Pvt Ltd')
        ->subject('Applied Job')
        ->view('email.apply_for_job')
        ->attach('/upload/applied_job/original/'.$this->attachment_file , [
            'as' => $this->attachment_file,
            'mime' => 'application/pdf,application/doc',
        ]);
    }
}
