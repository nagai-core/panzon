<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
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
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class MailController extends Controller
{
    public function purchaseCompleted(Request $request)
    {

        $cartItems = session('cartItems');
        $user =Auth::user();
        $email = $user->email;
        $address = $user->useraddress->first()->address ?? null;
        Log::channel('sendmail')->info('Sending email to: ' . $email);
        SendMailJob::dispatch($email, $cartItems,$address);
        $count = 0;
        foreach ($cartItems as $cartItem){
            $item = $cartItem ->item;
            $amount = $cartItem -> amount;
            $owner = $item->owner;
            $ownerEmail = $owner->email;
            $count += $cartItem->amount * $cartItem->item->price;
            SendOrderNotJob::dispatch($ownerEmail,$item,$amount);
            Log::channel('sendmail')->info('Sending email to: ' . $email);
        }
        //dd($email);


        //echo('送信しました');
        // return redirect()->route('item.list');
        return view('buy.complete', compact('cartItems', 'count', 'address'));
    }
}
