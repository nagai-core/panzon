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

        // Query items with optional category filter
        $itemsQuery = Item::query();
        if ($category_id) {
            $itemsQuery->where('category_id', $category_id);
        }

        // Sort items based on order parameter
        switch ($order) {
            case 'price_asc':
                $itemsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $itemsQuery->orderBy('price', 'desc');
                break;
            case 'date_desc':
                $itemsQuery->orderBy('created_at', 'desc');
                break;
            case 'date_asc':
                $itemsQuery->orderBy('created_at', 'asc');
                break;
            default:
                // Default sorting
                $itemsQuery->orderBy('created_at', 'desc');
                break;
        }
        if ($category_id) {
            $selectedCategory = Category::find($category_id)->name;
        }else{
            $selectedCategory = '全て';
        }
        // Fetch items with applied filters and sorting
        $items = $itemsQuery->get();

        // Load all categories for the dropdown
        $categories = Category::all();

        return view('item.list', compact('items', 'categories','selectedCategory'));
    }
    public function purchase(Request $request)
    {

    }
}
