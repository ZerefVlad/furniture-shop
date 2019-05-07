<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Category
 * @package App\Models
 * @property int $id
 * @property string title
 * @property string $code
 * @property boolean $active
 * @property int $parent_id
 * @property string $type
 */
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

    public function getImage(): ?Image
    {
        return Image::where('model', Category::class)
            ->where('model_id', $this->id)->orderBy('id', 'desc')->first();
    }

    public function addImage(array $data): void
    {
        Image::create([
            'model' => __CLASS__,
            'model_id' => $this->id,
            'title' => $data['title'],
            'alt' => $data['alt'],
            'url' => $data['url'],
        ]);
    }

    public function updateImage(array $data): void
    {
        $image = Image::where('model', __CLASS__)
            ->where('model_id', $this->id)->first();
        if ($image) {
            $image->update($data);
        } else {
            $this->addImage($data);
        }
    }

    public function deleteImage()
    {
        $image = Image::where('model', __CLASS__)
            ->where('model_id', $this->id)->first();
        if ($image) {
            Storage::delete('categories/' . $this->title . '/' . $image->title . '.png');
            $image->delete();
        }
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function isParent(): bool
    {
        if ($this->parent_id == null) {
            return true;
        }
        return false;
    }


}
