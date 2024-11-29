<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'cart_id',
        'total',
        'status',
        'payment_method',
        'payment_status',
        'shipping_method',
        'shipping_status',
        'address_id',
        'created_at'
    ];
}
