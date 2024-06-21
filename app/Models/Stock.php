<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function category()
    {
        return $this->belongsTo(Item::class);
    }
    use HasFactory;
}
