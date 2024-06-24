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
        $order = $request->get('order');

        // Query items with optional category filter and sorting
        $items = Item::filterByCategory($category_id)
                    ->sortByOrder($order)
                    ->get();

        // Get selected category name to show on top of page
        $selectedCategory = $category_id ? Category::find($category_id)->name : '全て';

        // Load all categories for the dropdown
        $categories = Category::all();

        return view('item.list', compact('items', 'categories', 'selectedCategory'));
    }
    public function purchase(Request $request)
    {

    }
}
