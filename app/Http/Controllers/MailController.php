<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\PurchaseCompleteMail;
use App\Mail\OwnerNotificationMail;
use App\Jobs\SendMailJob;
use App\Jobs\SendOrderNotJob;
use App\Models\User;
use App\Models\Owner;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class MailController extends Controller
{
    /*
    public function index(){
        $email = Auth::user()->email;
        //dd($email);
        Log::channel('sendmail')->info('Sending email to: ' . $email);
        SendMailJob::dispatch($email);
        echo('送信しました');
    }*/

    public function purchaseCompleted(){
        $email = Auth::user()->email;
        //dd($email);
        Log::channel('sendmail')->info('Sending email to: ' . $email);
        SendMailJob::dispatch($email);
        echo('送信しました');
    }
    public function ownerNotification(){
        $item = Item::latest()->first();
        $owner_id = $item->owner_id;
        $owner = Owner::findOrFail($owner_id);
        $email = $owner->email;
        //dd($email);
        Log::channel('sendmail')->info('Sending email to: ' . $email);
        SendOrderNotJob::dispatch($email);
        echo('送信しました');
    }
    
}
