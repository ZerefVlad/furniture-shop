<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class MainPage extends Model
{
    //
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
        $image = Image::find($data['id']);
        Storage::copy(
            'main-page/' . $data['code'] . '/' . $image->title . '.png',
            'main-page/' . $data['code'] . '/' . $data['title'] . '.png'
        );
        Storage::delete('main-page/' . $data['code'] . '/' . $image->title . '.png');
        $data = array_merge($data,
            [
                'url' => Storage::url('main-page/' . $data['code'] . '/' . $data['title'] . '.png'),
            ]);
        if ($image) {
            $image->update($data);
        } else {
            $this->addImage($data);
        }
    }

    public function deleteImage(int $imageId)
    {
        $image = Image::find($imageId);
        if ($image) {
            Storage::delete('main-page/' . $this->code . '/' . $image->title . '.png');
            $image->delete();
        }
    }
}
