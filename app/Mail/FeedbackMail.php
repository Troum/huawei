<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
	public $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact, $content)
    {
        $this->content = $content;
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.feedback')->subject('Обращение с формы обратной связи');
    }
}
