<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\PurchaseCompleteMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAddress;
class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email,$cartItems,$address;

    /**
     * Create a new job instance.
     */
    public function __construct($email,$cartItems,$address)
    {
        $this->email = $email;
        $this->cartItems = $cartItems;
        if ($address) {
            $this->address=$address;
        }
        
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->email)->send(new PurchaseCompleteMail($this->cartItems,$this->address));
    }
}
