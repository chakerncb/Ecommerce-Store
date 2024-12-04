<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'ord_id';
    protected $fillable = [
        'ord_id',
        'costumer_id',
        'total',
        'status',
        'payment_method',
        'payment_status',
        'shipping_fullname',
        'shipping_address',
        'shipping_city',
        'shipping_municipality',
        'shipping_phone',
        'shipping_email',
        'shipping_method',
        'shipping_status',
        'created_at'
    ];
}
