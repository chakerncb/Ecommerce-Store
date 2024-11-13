<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeatures extends Model
{
    use HasFactory;

    protected $table = 'product_features';
    protected $primaryKey = 'feature_id';
    protected $fillable = [
        'product_id',
         'name',
         'description'
        ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
