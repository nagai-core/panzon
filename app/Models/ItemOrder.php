<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function purchaseHistory()
    {
        return $this->belongsTo(PurchaseHistory::class);
    }
    use HasFactory;
}
