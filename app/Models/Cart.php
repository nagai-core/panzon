<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id',
        'amount',
        'is_variable'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
     // ItemsとImagesのリレーション定義
     public function itemImages()
     {
         return $this->item->images()->where('is_variable', 1);
     }
    //  public function getCarts($userId) {
    //     $carts = self::where('user_id', $userId)
    //         ->where('is_variable', true)
    //         ->with(['item' => function ($query) {
    //             $query->select('items.id', 'item_name', 'price')
    //                 ->with(['images' => function ($query) {
    //                     $query->select('item_id', 'url');
    //                 }])
    //                 ->where('is_variable', true);
    //         }])
    //         ->get(['amount', 'item_id', 'id']);

    //     // リレーションの結果をフィルタリング
    //     $carts->each(function ($cart) {
    //         $cart->item->stocks = $cart->item->stocks->where('amount', '>', 0);
    //     });

    //     return $carts;
    // }

    public static function getUserCarts($userId)
    {
        $carts = self::where('user_id', $userId)
            ->where('is_variable', true)
            ->with(['item' => function ($query) {
                $query->with(['images' => function ($query) {
                    $query->where('is_variable', true);
                }, 'stocks' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }]);
            }])
            ->get();

        // is_variableとstocksのamountチェック
        foreach ($carts as $cart) {
            $item = $cart->item;

            if (!$item->is_variable) {
                $cart->is_variable = false;
                $cart->save();
            }

            foreach ($item->stocks as $stock) {
                if ($stock->amount == 0) {
                    $cart->is_variable = false;
                    $cart->save();
                } elseif ($stock->amount < $cart->amount) {
                    $cart->amount = $stock->amount;
                    $cart->save();
                }
            }
        }

        return $carts;
    }

    public static function getCartItems($userId)
    {
        $cartItems = Cart::where('user_id', $userId)
                        ->where('is_variable', 1) // Filter where is_variable is 1
                        ->with('item') // Eager load the item relationship
                        ->get();

        return $cartItems;
    }
}


