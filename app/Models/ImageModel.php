<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    protected $fillable = [
        'model',
        'model_id',
        'image_id',
    ];

    public function images()
    {
        $this->belongsToMany(Image::class, 'image_models', 'image_id');
    }

    public function models()
    {
        $this->belongsToMany(resolve($this->model), 'image_models', 'model_id');
    }
}
