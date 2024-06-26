<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\OwnerNotification;
use Illuminate\Support\Facades\Log;
class SendOrderNotJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ownerEmail,$item,$amount;

    /**
     * Create a new job instance.
     */
    public function __construct($ownerEmail,$item,$amount)
    {
        $this->ownerEmail = $ownerEmail;
        $this->item = $item;
        $this->amount = $amount;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->ownerEmail)->send(new OwnerNotification($this->item,$this->amount));
    }
}
