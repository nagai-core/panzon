<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompleteController extends Controller
{
    public function index(Request $request) {
        $cartItems = $request->session()->get('cartItems');

    // 他の処理...

        return view('buy.complete', compact('cartItems'));
    }
}
