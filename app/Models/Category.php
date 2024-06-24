<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    use HasFactory;
    protected $fillable = [
        'name',
    ];
}
