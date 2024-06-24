<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id',
        'amount',
        'is_variable'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
