<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_discount extends Model
{
    protected $fillable = [
        'value',
        'product_id',
        'discount_id',
    ];
}
