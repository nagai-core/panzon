<?php

use App\Http\Controllers\Owner\CategoryController;
use App\Http\Controllers\Owner\ItemController;
use App\Http\Controllers\Owner\StockController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:owners', 'verified'])->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name("index");
    Route::get('/category', [CategoryController::class, 'index'])->name("category");
    Route::get('/category/{categoryname}', [ItemController::class, 'categoryShow'])->name("category.show");
    Route::post('/category/store', [CategoryController::class, 'store'])->name("category.store");
    Route::get('/create', [ItemController::class, 'create'])->name("create");
    Route::post('/', [ItemController::class, 'store'])->name("store");

    Route::post('/', [StockController::class, 'stock_update'])->name('stock_update');

});

Route::get('/dashboard', function () {
    return view('owner.dashboard');
})->middleware(['auth:owners', 'verified'])->name('dashboard');

// ログイン関係のルート設定ファイル
// auth.php ・・ユーザー向けの認証関係ファイル
// ownerAuth.php ・・オーナー向けの認証関係ファイル
require __DIR__.'/ownerAuth.php';
