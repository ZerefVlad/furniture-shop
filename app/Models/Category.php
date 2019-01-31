<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

CLASS Category EXTENDS Model
{
    protected $fillable = [
        'title',
        'code',
        'active',
        'parent_id',
        'type',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function image()
    {
        return $this->belongsToMany(Image::class, 'image_models', 'model_id');
    }

    /**
     * @return Image|null
     */
    public function getImage(): ?Image
    {
        $category = ImageModel::where('model', Category::class)
            ->where('model_id', $this->id)->first();
        if ($category) {
            return Image::find($category->image_id);
        }

        return null;
    }
}
