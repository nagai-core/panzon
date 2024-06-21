<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner_address extends Model
{
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
    use HasFactory;
}
