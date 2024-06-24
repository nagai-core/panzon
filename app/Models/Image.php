<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url', 'is_variable', 'item_id'];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    use HasFactory;
}
