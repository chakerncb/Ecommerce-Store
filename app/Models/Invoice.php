<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $primaryKey = 'inv_id';

    protected $fillable = [
        'inv_id',
        'inv_order_id',
        'inv_costumer_id',
        'inv_path',
        'created_at'
    ];
}
