<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
class PurchaseCompleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cartItems, $address;

    /**
     * Create a new message instance.
     *
     * @param array $cartItems
     */
    public function __construct($cartItems,$address)
    {
        $this->cartItems = $cartItems;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject('決済完了のお知らせ')
                    ->view('mail.purchaseComplete', [
                        'cartItems' => $this->cartItems,
                        'address' => $this->address,
                    ]);
    }
}
