<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;
use App\Models\Category;
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
        return view('item.list', compact('items', 'categories', 'selectedCategory','search'));
    }
    public function purchase(Request $request)
    {

    }
}

