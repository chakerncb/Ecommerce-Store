<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_id',
        'user_id',
        'name',
        'phone',
        'address',
        'city',
        'province',
        'country',
        'postal_code'
    ];
}
