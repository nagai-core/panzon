<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\owner\CategoryPurchaseRequest;
use App\Models\Category;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index() {
        $ownerId = Auth::id();
        $owner = Owner::find($ownerId);
        $categories = Category::all();
        return view("owner.category", compact('categories', 'owner'));
    }

    public function store(CategoryPurchaseRequest $request) {
        Category::create(['name' => $request->category]);
        return redirect()->route('owner.category');
    }
}
