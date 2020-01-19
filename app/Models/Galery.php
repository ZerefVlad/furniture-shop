<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


/**
 * Class Galery
 * @package App\Models
 * @property int $id
 * @property string title
 * @property int $parent_id

 */
class Galery extends Model
{
    protected $table = 'galeries';
    protected $fillable = [
        'title',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Galery::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Galery::class, 'parent_id');
    }

    public function getImage(): ?Image
    {
        return Image::where('model', Galery::class)
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
            Storage::delete('galeries/' . $this->title . '/' . $image->title . '.png');
            $image->delete();
        }
    }

    public function isParent(): bool
    {
        if ($this->parent_id == null) {
            return true;
        }
        return false;
    }

    public function getRouteKeyName()
    {
        return 'title';
    }

}
