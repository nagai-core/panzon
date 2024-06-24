<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\owner\CategoryPurchaseRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view("owner.category", compact('categories'));
    }

    public function store(CategoryPurchaseRequest $request) {
        Category::create(['name' => $request->category]);
        return redirect()->route('owner.category');
    }
}
