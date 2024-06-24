<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/item/{itemId}', [ItemController::class, 'store'])->name('item.store');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});

//パン一覧と詳細は/item/listルート
Route::get('/list', [ItemController::class, 'list'])->name('item.list');
Route::get('/item/{itemId}', [ItemController::class, 'show'])->name('item.show');
//パン購入
Route::get('/purchase', [ItemController::class, 'purchase'])->name('item.purchase');
require __DIR__.'/auth.php';
