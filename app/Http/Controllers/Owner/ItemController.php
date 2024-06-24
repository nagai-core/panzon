<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use App\Models\Image;
use App\Models\Stock;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ItemController extends Controller
{
    public function index()
    {
        $breads = Item::itemsOwner();
        return view("owner.index", compact("breads"));
    }

    public function create()
    {
        $categories = Category::all();
        return view('owner.create', compact('categories'));
    }
    // 商品登録処理
    public function store(Request $request)
    {
        $item = new Item();
        $item->category_id = $request->category_id;
        $item->item_name = $request->item_name;
        $item->price = $request->price;
        $item->content = $request->content;
        $item->owner_id = auth()->user()->id;
        $item->is_variable = true;
        $item->save();

        $stock = new Stock();
        $stock->item_id = $item->id;
        $stock->amount = $request->amount; // amountのデフォルト値を設定
        $stock->save();


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $ext = $image->guessExtension();
                $filename = "{$item->id}_{$index}.{$ext}";
                $path = $image->storeAs('images', $filename, 'public');
                $url = Storage::url($path);
                $item->images()->create(['url' => $url, 'is_variable' => true]);
            }
        }
        return redirect()->route('owner.index');
    }
}
