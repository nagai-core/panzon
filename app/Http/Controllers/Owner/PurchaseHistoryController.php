<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
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
        $items = Item::itemsOwner();
        //dd($items);
        $purchaseHistories = collect();
        foreach($items as $item){
            $itemOrders = ItemOrder::where('item_id', $item->id)->get();
            foreach ($itemOrders as $itemOrder){
                $purchaseHistoryId = $itemOrder->purchase_history_id;
                $purchaseHistory = PurchaseHistory::findOrFail($purchaseHistoryId);
                //dd($purchaseHistory);
                $purchaseHistories->push($purchaseHistory);
            }
            //dd($itemOrders);
        }
        //dd($purchaseHistories);
        return view('owner.purchaseHistory', compact('purchaseHistories'));
    }
}