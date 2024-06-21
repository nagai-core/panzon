<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    protected $fillable = ['name'];
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function carts()
    {
        return $this->belongsTo(Cart::class);
    }
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
    public function itemorder()
    {
        return $this->hasMany(ItemOrder::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    // 最新のStockとのリレーション
    public function latestStock(): HasOne
    {
        return $this->hasOne(Stock::class)->latestOfMany();
    }
    // is_viriableが1のImagesとのリレーション
    public function variableImages()
    {
        return $this->hasMany(Image::class)->where('is_variable', 1);
    }
     // 認証されたオーナーのアイテムを取得するメソッド
    public static function itemsOwner()
    {
        $ownerId = Auth::id();
        return self::with(['category', 'latestStock', 'variableImages'])
        ->where('owner_id', $ownerId)
        ->get();
    }
    use HasFactory;
}
