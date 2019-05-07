<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


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

    public function getImage(): ?Image
    {
        return Image::where('model', Post::class)
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
}
