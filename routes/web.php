<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompleteController;
use App\Http\Controllers\PurchaseHistoryController;

Route::get('/purchase-completed', [MailController::class, 'purchaseCompleted'])->name('purchaseCompleted');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ItemController::class, 'index'])->name('item.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/item/{itemId}', [ItemController::class, 'store'])->name('item.store');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/minus/{cartId}', [CartController::class, 'minusUpdate'])->name('cart.minusUpdate');
    Route::post('/cart/plus/{cartId}', [CartController::class, 'plusUpdate'])->name('cart.plusUpdate');
    Route::post('/cart/{cartId}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/favorites', [ItemController::class, 'list'])->name('favorites.index');
    Route::post('/favorites/{item}', [ItemController::class, 'favorite_store'])->name('favorite.store');
    Route::delete('/favorites/{item}', [ItemController::class, 'favorite_destroy'])->name('favorite.destroy');
    Route::get('/favorites', [ItemController::class, 'favorite'])->name('favorite.index');
        //パン一覧と詳細は/item/listルート
    Route::get('/list', [ItemController::class, 'list'])->name('item.list');
    Route::get('/item/{itemId}', [ItemController::class, 'show'])->name('item.show');
    //購入履歴
    Route::get('/purchase-history', [PurchaseHistoryController::class, 'index'])->name('purchaseHistory.index');
    Route::get('/purchase-store', [PurchaseHistoryController::class, 'store'])->name('purchaseHistory.store');
    Route::get('/mypage', function() {
        return view('user.mypage');
    })->name('user.mypage');
});

//Stripe
Route::get('/stripe', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/stripe', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/stripe/success', [StripeController::class, 'success'])->name('success');
Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('cancel');
    //メール送信
Route::get('/purchase-completed', [MailController::class, 'purchaseCompleted'])->name('purchaseCompleted');

require __DIR__.'/auth.php';
