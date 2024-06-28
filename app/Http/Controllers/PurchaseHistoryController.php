<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\PurchaseHistory;
use App\Models\ItemOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class PurchaseHistoryController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $purchaseHistories = PurchaseHistory::where('user_id', $userId)->get();
        return view('purchaseHistory', compact('purchaseHistories'));
    }
    public function store(Request $request){

        $cartItems = Session::get('cartItems');
        //dd($cartItems);
        $history = new PurchaseHistory();
        $history->user_id = auth()->id();
        $history->save();

        foreach ($cartItems as $cartItem) {
            $itemOrder = new ItemOrder();
            $itemOrder->purchase_history_id = $history->id;
            $itemOrder->item_id = $cartItem->item_id;
            $itemOrder->amount = $cartItem->amount;
            $itemOrder->price = $cartItem->item->price;
            $itemOrder->save();
        }

        return redirect()->route('purchaseCompleted');
    }
}

