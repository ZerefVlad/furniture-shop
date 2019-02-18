<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_attribute extends Model
{
    protected $fillable = [

        'value',
        'product_id',
        'attribute_id',
    ];


}
