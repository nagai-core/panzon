<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    use HasFactory;
}
