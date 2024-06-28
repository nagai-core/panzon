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
        $ownerId = Auth::id();
        $owner = Owner::find($ownerId);
        $categories = Category::all();
        $breads = Item::itemsOwner($request->search);
        return view("owner.index", compact("breads", "owner", "categories"));
    }

    public function categoryShow($categoryName)
    {
        $ownerId = Auth::id();
        $owner = Owner::find($ownerId);
        $categories = Category::all();
        $breads = Item::itemsByCategoryName($categoryName);
        return view('owner.index', compact('breads', 'owner', 'categories'));
    }

    public function create()
    {
        $ownerId = Auth::id();
        $owner = Owner::find($ownerId);
        $categories = Category::all();
        return view('owner.create', compact('categories', 'owner'));
    }

    public function store(Request $request)
    {
        $item = Item::creates($request->all(), auth()->user()->id);
        
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
        $bread = Item::updates($request->all(), $id);
        return redirect()->route('owner.index');
    }

    public function status($id)
{
    $item = Item::findOrFail($id);
    $item->is_variable = $item->is_variable ? 0 : 1;
    $item->save();

    return redirect()->route('owner.index');
}
}
