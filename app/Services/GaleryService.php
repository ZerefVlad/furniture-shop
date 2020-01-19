<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.12.18
 * Time: 1:13
 */

namespace App\Services;

use App\Models\Galery;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;


class GaleryService
{
    public function getGaleries(): Collection
    {
        return Galery::all();
    }

    public function getGalery(int $galery_id): Galery
    {
        return Galery::find($galery_id);
    }

    public function createGalery(array $galery_data): void
    {
        $galery = new Galery();
        $galery->title = $galery_data['title'];
        $galery->parent_id = $galery_data['parent_id'];
        $galery->save();

        $imageData = [
            'title' => $galery_data['image_title'],
            'alt' => $galery_data['image_alt'],
            'url' => Storage::url('galeries/'.$galery_data['title'].'/'.$galery_data['image_title'].'.png')
        ];
        $galery->addImage($imageData);
    }

    public function editGalery(Galery $galery, array $galery_data): void
    {
        $galery->title = $galery_data['title'];
        $galery->parent_id = $galery_data['parent_id'];
        $galery->save();
        if (isset($galery_data['image'])) {
            $imageData = [
                'title' => $galery_data['image_title'],
                'alt' => $galery_data['image_alt'],
                'url' => Storage::url('galeries/'.$galery_data['title'].'/'.$galery_data['image_title'].'.png')
            ];
            $galery->updateImage($imageData);
        }


    }

    public function deleteGalery(Galery $galery): void
    {
        $galery->deleteImage();
        $galery->delete();
    }

}
