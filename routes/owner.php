<?php

use App\Http\Controllers\Owner\CategoryController;
use App\Http\Controllers\Owner\ItemController;
use App\Http\Controllers\Owner\StockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;


Route::middleware(['auth:owners', 'verified'])->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name("index");
    Route::get('/category', [CategoryController::class, 'index'])->name("category");
    Route::get('/category/{categoryname}', [ItemController::class, 'categoryShow'])->name("category.show");
    Route::post('/category/store', [CategoryController::class, 'store'])->name("category.store");
    Route::get('/create', [ItemController::class, 'create'])->name("create");
    Route::post('/store', [ItemController::class, 'store'])->name("store");

    Route::post('/', [StockController::class, 'stockUpdate'])->name('stockUpdate');

    Route::get('/{id}/edit', [ItemController::class, 'edit'])->name('edit');
    Route::put('/{id}/edit', [ItemController::class, 'update'])->name('update');
    Route::get('/owner-notification', [MailController::class, 'ownerNotification'])->name('ownerNotification');
});

Route::get('/dashboard', function () {
    return view('owner.dashboard');
})->middleware(['auth:owners', 'verified'])->name('dashboard');

// ログイン関係のルート設定ファイル
// auth.php ・・ユーザー向けの認証関係ファイル
// ownerAuth.php ・・オーナー向けの認証関係ファイル
require __DIR__.'/ownerAuth.php';
