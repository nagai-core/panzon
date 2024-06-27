<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddurchaseRequest;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;
use App\Models\Category;
use App\Models\Favorite;
class ItemController extends Controller
{
    //商品一覧
    public function list(Request $request)
    {
        $category_id = $request->get('category_id');
        //並び替え
        $order = $request->get('order');
        //検索機能
        $search = $request->input('search');
        /*パンをカテゴリと並び替えでソーツする
        または検索機能*/
        $items = Item::orderItems($category_id, $order,$search);

        // Get selected category name to show on top of page
        $selectedCategory = $category_id ? Category::find($category_id)->name : '全て';

        // Load all categories for the dropdown
        $categories = Category::all();

        $favorites = Auth::user()->favorites->pluck('item_id')->toArray();
        return view('item.list', compact('items', 'categories', 'selectedCategory','search','favorites'));
    }
    public function show($itemId) {
        $item = Item::with(['images', 'latestStock'])->findOrFail($itemId);
        return view('item.show', compact('item'));
    }

    public function Store($itemId, CartAddurchaseRequest $request) {
        $userId = Auth::id();
        Cart::create([
            'user_id' => $userId,
            'item_id' => $itemId,
            'amount' => $request->input('amount'),
            'is_variable' => true
        ]);
        return redirect()->route('cart.index');
    }


    public function favorite_store($itemId)
    {
        $favorite = new Favorite();
        $favorite->user_id = Auth::id();
        $favorite->item_id = $itemId;
        $favorite->save();

        return redirect()->back();
    }

    public function favorite_destroy($itemId)
    {
        $favorite = Favorite::where('user_id', Auth::id())
        ->where('item_id', $itemId);

        if ($favorite) {
            $favorite->delete();
        }

        return redirect()->back();
    }

    public function favorite()
    {
        $favorites = Auth::user()->favoriteItems;
        return view('item.favorite', compact('favorites'));
    }

}

