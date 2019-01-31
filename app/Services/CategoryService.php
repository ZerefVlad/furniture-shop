<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.12.18
 * Time: 1:13
 */

namespace App\Services;

use App\Models\Category;
use App\Models\Image;
use App\Models\ImageModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class CategoryService
{
    public function getCategories()
    {
        return Category::all();
    }

    public function getCategory(int $category_id)
    {
        return Category::find($category_id);
    }

    public function createCategory(array $category_data)
    {
        $category = Category::create([
            'title' => $category_data['title'],
            'code' => $category_data['code'],
            'parent_id' => $category_data['parent_id'],
            'active' =>  isset($category_data['active']) ? true : false,
            'type' => $category_data['type'],
        ]);

        $image = new Image();
        $image->title = $category_data['title'];
        $image->filename = $category_data['title'].'.png';
        $image->file_location = 'categories/';
        $image->url = Storage::url(
            'categories/'.$category_data['title'].'.png'
        );
        $image->alt = $category_data['title'];
        $image->save();
        ImageModel::create([
            'model' => Category::class,
            'model_id' => $category->id,
            'image_id' => $image->id,
        ]);

        return $category;
    }

    public function editCategory(int $category_id, array $category_data): void
    {
        $category = Category::find($category_id);
        $category->update([
            'title' => $category_data['title'],
            'code' => $category_data['code'],
            'parent_id' => $category_data['parent_id'],
            'active' => isset($category_data['active']) ? true : false,
            'type' => $category_data['type'],
        ]);

        $image = new Image();
        $image->title = $category_data['title'];
        $image->filename = $category_data['title'].'.png';
        $image->file_location = 'categories/';
        $image->url = Storage::url(
            'categories/'.$category_data['title'].'.png'
        );
        $image->alt = $category_data['title'];
        $image->save();
        ImageModel::create([
            'model' => Category::class,
            'model_id' => $category->id,
            'image_id' => $image->id,
        ]);
    }

    public function deleteCategory(int $category_id)
    {
        Category::find($category_id)->delete();
    }

}