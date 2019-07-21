<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailableFW extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $firewallaccesss;

    public function __construct($firewallaccesss)
    {
        $this->firewallaccesss = $firewallaccesss;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Firewall Request with ID FW{$this->firewallaccesss->id}")->view('firewallaccess.mail');
    }
}
