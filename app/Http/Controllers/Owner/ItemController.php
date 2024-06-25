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
    public function index(Request $request)
    {
        $breads = Item::itemsOwner($request->search);
        return view("owner.index", compact("breads"));
    }

    public function categoryShow($categoryName)
    {
        $breads = Item::itemsByCategoryName($categoryName);
        return view('owner.index', compact('breads'));
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
        $stock->amount = $request->amount;
        $stock->save();


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->guessExtension();
            $filename = "{$item->id}_0.{$ext}";
            $path = $image->storeAs('images', $filename, 'public');
            $url = Storage::url($path);
            $item->images()->create(['url' => $url, 'is_variable' => true]);
        }


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $index += 1;
                $ext = $image->guessExtension();
                $filename = "{$item->id}_{$index}.{$ext}";
                $path = $image->storeAs('images', $filename, 'public');
                $url = Storage::url($path);
                $item->images()->create(['url' => $url, 'is_variable' => false]);
            }
        }
        return redirect()->route('owner.index');
    }

    public function edit($id)
    {
        $bread = Item::findOrFail($id);
        $categories = Category::all();
        return view('owner.edit', compact('bread', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $bread = Item::findOrFail($id);

        $bread->update([
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'content' => $request->content,
            'is_variable' => $request->is_variable,
        ]);
        //サムネイル
        if ($request->hasFile('image')) {
            $bread->images()->where('is_variable', true)->delete();
            $image = $request->file('image');
            $ext = $image->guessExtension();
            $filename = "{$bread->id}_thumbnail.{$ext}";
            $path = $image->storeAs('images', $filename, 'public');
            $url = Storage::url($path);
            $bread->images()->create(['url' => $url, 'is_variable' => true]);
        }
        //商品画像
        if ($request->hasFile('images')) {
            $bread->images()->where('is_variable', false)->delete();
            foreach ($request->file('images') as $index => $image) {
                $ext = $image->guessExtension();
                $filename = "{$bread->id}_{$index}.{$ext}";
                $path = $image->storeAs('images', $filename, 'public');
                $url = Storage::url($path);
                $bread->images()->create(['url' => $url, 'is_variable' => false]);
            }
        }
        return redirect()->route('owner.index');
    }
}
