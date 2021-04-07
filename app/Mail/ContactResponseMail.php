<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    //public $name, $subject, $message;

    protected $data = [];

    //    public function __construct($name, $subject, $message)
    //     {
    //         $this->name = $name;
    //         $this->subject = $subject;
    //         $this->message = $message;
    //     }

    public function __construct($data = [])
    {
        $this->data = $data;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('Mails.contact-response');
        return $this->markdown('Mails.contact-response')
            ->from('noreply@test.com')
            ->subject('Response')
            ->with('data', $this->data);
    }
}
