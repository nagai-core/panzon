<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Stock;
use App\Models\Item;
use Illuminate\Support\Facades\Session;
class StripeController extends Controller
{

    public function checkout()
    {
        $userId = Auth::id();
        $cartItems = Cart::getCartItems($userId);
        //dd($cartItems);
        // Ensure $cartItems is not null and is properly formatted for Stripe
        if (!$cartItems) {
            // Handle the case when cartItems are not found or null
            abort(404, 'Cart items not found');
        } 
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $publicKey = env('STRIPE_PUBLIC_KEY');
        //dd($cartItems);
        $lineItems = [];
        foreach ($cartItems as $cartItem) {
            //dd($cartItem->item);
            $item = $cartItem->item;
            //dd($item->owner->owner_addresses->store->name);
            $lineItems [] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $item->item_name,
                        'description'=> $item->owner->owner_addresses->store_name ?? $item->owner->name, 
                    ],
                    'currency' => 'jpy',
                    'unit_amount' => $item->price,
                ],
                'quantity' => $cartItem->amount,
            ];
        }
        
        //dd($lineItems);
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);
        //dd($cartItems);
        session(['cartItems' => $cartItems]);
        return view('checkout',compact('checkout_session', 'publicKey'));
    }

    public function success(Request $request)
    {
        $cartItems = session('cartItems');
        foreach($cartItems as $cartItem){
            $cartItem->is_variable =0;
            $cartItem->save();
            $item = $cartItem->item;
            //dd($item);
            $amount = $cartItem->amount;
            //在庫更新処理：stockAmount
            $item = Item :: stockAmount($item,$amount);
            $item->save();
            //dd($item->lateststock->amount);
        }
        return redirect()->route('purchaseHistory.store');

    }

    public function cancel(){
        return redirect()->route('cart.index');
    }
}
