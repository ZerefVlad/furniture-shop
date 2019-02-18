<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    protected $fillable = [
        'discount',
        'quantity',
        'related_product_id',
        'main_product_id',
    ];

    public function relatedProduct()
    {
        return $this->belongsTo(Product::class, 'related_product_id', 'id');
    }
}
