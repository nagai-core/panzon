<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function itemOrder(){
        return $this->hasMany(ItemOrder::class);
    }
    use HasFactory;
}
