<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getImage(): ?Image
    {
        return Image::where('model', __CLASS__)
            ->where('model_id', $this->id)
            ->first();
    }
}
