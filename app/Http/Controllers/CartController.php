<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $userId = Auth::id();
        $carts = Cart::getUserCarts($userId);
        // $carts = $cart->getCarts($userId);
        // dd($carts);
        return view('cart.index', compact('carts'));
    }

    public function minusUpdate($cartId) {
        // カートの情報を取得
        $cart = Cart::findOrFail($cartId);

        // カートの商品情報を取得
        $item = $cart->item;

        // 商品の在庫情報を取得
        $stock = $item->stocks()->latest()->first();

        // 在庫がない場合はamountを0に更新し、カートのis_variableをfalseにする
        if ($stock->amount === 0) {
            $cart->update(['amount' => 0, 'is_variable' => false]);
        } else {
            // 在庫がカートの個数より少ない場合は在庫の個数に合わせる
            if ($stock->amount < $cart->amount) {
                $cart->update(['amount' => $stock->amount]);
            } else {
                // カートの個数を1減らす
                $cart->update(['amount' => $cart->amount - 1]);
            }
        }
        return redirect()->route('cart.index');
    }

    public function plusUpdate($cartId) {
        // カートの情報を取得
        $cart = Cart::findOrFail($cartId);
        // カートの商品情報を取得
        $item = $cart->item;
        // 商品の在庫情報を取得
        $stock = $item->stocks()->latest()->first();
        // 在庫がない場合はamountを0に更新し、カートのis_variableをfalseにする
        if ($stock->amount === 0) {
            $cart->update(['amount' => 0, 'is_variable' => false]);
        } else {
            // 在庫がカートの個数以上の場合は在庫の個数に合わせる
            if ($stock->amount <= $cart->amount) {
                $cart->update(['amount' => $stock->amount]);
            } else {
                // カートの個数を1増やす
                $cart->update(['amount' => $cart->amount + 1]);
            }
        }
        return redirect()->route('cart.index');
    }

    public function destroy($cartId) {
        // カートの情報を取得
        $cart = Cart::findOrFail($cartId);
        // is_variableをfalseに更新する
        $cart->update(['is_variable' => false]);
        return redirect()->route('cart.index');
    }
}
