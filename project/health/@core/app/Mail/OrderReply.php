<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReply extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $subject;
    public $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$subject,$title = null)
    {
        $this->data = $data;
        $this->subject = $subject;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(get_static_option('site_global_email'), get_static_option('site_'.get_default_language().'_title'))
            ->subject($this->subject)
            ->view('mail.order-reply');
    }
}
