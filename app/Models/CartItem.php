<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'ítm_id',
        'cart_id',
        'product_id',
        'quantity',
        'price',
        'total'
    ];
}
