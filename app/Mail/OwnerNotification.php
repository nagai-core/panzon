<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OwnerNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $item,$amount;

    /**
     * Create a new message instance.
     *
     * 
     */
    public function __construct($item,$amount)
    {
        $this->item = $item;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject('購入のお知らせ')
                    ->view('mail.ownerNotification', [
                        'item' => $this->item,
                        'amount' => $this->amount,
                    ]);
    }
}
