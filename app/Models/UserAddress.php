<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'post_code',
    ];
}
