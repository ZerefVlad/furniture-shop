<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'title',

    ];

    public function products()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes', 'attribute_id');
    }

    public function values()
    {
        return $this->hasMany(ProductAttribute::class, 'attribute_id', 'id');
    }
}
