<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    //
    public function stockUpdate(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'bread_id' => 'required|exists:items,id',
            'stock_quantity' => 'required|integer|min:0|max:1000',
        ]);

        try {
            // Find the Item by its ID
            $item = Item::findOrFail($request->bread_id);
            $item->latestStock->amount = $request->stock_quantity;
            $item->latestStock->save();
            $breads = Item::itemsOwner();
            $ownerId = Auth::id();
            $owner = Owner::find($ownerId);
            $categories = Category::all();
            return view('owner.index', compact('breads', 'owner', 'categories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '在庫数の更新中にエラーが発生しました。');
        }
    }
}
