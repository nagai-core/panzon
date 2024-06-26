<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class Item extends Model
{
    protected $fillable = [
        'category_id',
        'owner_id',
        'item_name',
        'price',
        'content',
        'is_variable',
    ];

    public function user() {
        return $this->belongsToMany(User::class, 'carts')
        ->withPivot('amount', 'is_variable');
    }
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
    public function stocks()
    {
        return $this->hasMany(Stock::class, 'item_id');
    }
    public function itemorder()
    {
        return $this->hasMany(ItemOrder::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class,  'item_id');
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
    // 検索機能
    public function scopeSearchItem($query,$search){
        if ($search) {
            return $query ->where('item_name', 'like', "%$search%")
                    ->orWhere('content', 'like', "%$search%");
        }
    }
    public static function orderItems($category_id, $order,$search)
    {
        return static::filterByCategory($category_id)
                    ->sortByOrder($order)
                    ->searchItem($search)
                    ->get();
    }
    public static function creates($data, $ownerId)
    {
        $item = new self();
        $item->category_id = $data['category_id'];
        $item->item_name = $data['item_name'];
        $item->price = $data['price'];
        $item->content = $data['content'];
        $item->owner_id = $ownerId;
        $item->is_variable = true;
        $item->save();

        $stock = new Stock();
        $stock->item_id = $item->id;
        $stock->amount = $data['amount'];
        $stock->save();

        $item->saveImages($data);

        return $item;
    }

    public static function updates($data, $id)
    {
        $item = self::findOrFail($id);
        $item->update([
            'item_name' => $data['item_name'],
            'category_id' => $data['category_id'],
            'price' => $data['price'],
            'content' => $data['content'],
            'is_variable' => $data['is_variable'],
        ]);

        $item->saveImages($data, true);

        return $item;
    }

    public function saveImages($data, $isUpdate = false)
    {
        //サムネイル
        if (isset($data['image'])) {
            if ($isUpdate) {
                $this->images()->where('is_variable', true)->delete();
            }
            $image = $data['image'];
            $ext = $image->guessExtension();
            $filename = "{$this->id}_thumbnail.{$ext}";
            $path = $image->storeAs('images', $filename, 'public');
            $url = Storage::url($path);
            $this->images()->create(['url' => $url, 'is_variable' => true]);
        }
        //商品画像
        if (isset($data['images'])) {
            if ($isUpdate) {
                $this->images()->where('is_variable', false)->delete();
            }
            foreach ($data['images'] as $index => $image) {
                $ext = $image->guessExtension();
                $filename = "{$this->id}_{$index}.{$ext}";
                $path = $image->storeAs('images', $filename, 'public');
                $url = Storage::url($path);
                $this->images()->create(['url' => $url, 'is_variable' => false]);
            }
        }
    }



    use HasFactory;
}


