<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'active',
        'text',
    ];

    public function image()
    {
        return $this->belongsToMany(Image::class, 'image_models', 'model_id');
    }
    //
}
