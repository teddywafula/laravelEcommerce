<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Cart extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [

    ];

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
