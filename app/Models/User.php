<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username', // 新しく追加
        'icon', // 新しく追加
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function useraddress()
    {
        return $this->hasMany(UserAddress::class);
    }
    public function purchas_history()
    {
        return $this->hasMany(PurchaseHistory::class);
    }
    public function Item()
    {
        return $this->belongsToMany(Item::class, 'carts')
            ->withPivot('amount', 'is_variable');;
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favoriteItems()
    {
        return $this->belongsToMany(Item::class, 'favorites');
    }
}
