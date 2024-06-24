<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    protected $fillable = [
        'category_id',
        'owner_id',
        'item_name',
        'price',
        'conext',
        'is_viriable',
    ];

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
    public static function itemsOwner($search = null)
    {
        $ownerId = Auth::id();
        $query = self::with(['category', 'latestStock', 'variableImages'])
            ->where('owner_id', $ownerId);

        if ($search) {
            $query->where('item_name', 'LIKE', '%' . $search . '%');
        }

        return $query->get();
    }
     // カテゴリ名でフィルターされたアイテムを取得するメソッド
    public static function itemsByCategoryName($categoryName)
    {
        $ownerId = Auth::id();
        return self::whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })
            ->with(['category', 'latestStock', 'variableImages'])
            ->where('owner_id', $ownerId)
            ->get();
    }

    // カテゴリソーツ
    public function scopeFilterByCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
        return $query;
    }

    // オーダソーツ
    public function scopeSortByOrder($query, $order)
    {
        switch ($order) {
            case 'price_asc':
                return $query->orderBy('price', 'asc');
            case 'price_desc':
                return $query->orderBy('price', 'desc');
            case 'date_desc':
                return $query->orderBy('created_at', 'desc');
            case 'date_asc':
                return $query->orderBy('created_at', 'asc');
            default:
                return $query->orderBy('created_at', 'desc');
        }
    }
    public static function orderItems($category_id, $order)
    {
        return static::filterByCategory($category_id)
                    ->sortByOrder($order)
                    ->get();
    }
    use HasFactory;
}
