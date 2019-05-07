<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.12.18
 * Time: 1:13
 */

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;


class CategoryService
{
    public function getCategories(): Collection
    {
        return Category::all();
    }

    public function getCategory(int $category_id): Category
    {
        return Category::find($category_id);
    }

    public function createCategory(array $category_data): void
    {
        $category = new Category();
        $category->title = $category_data['title'];
        $category->code = $category_data['code'];
        $category->parent_id = $category_data['parent_id'];
        $category->active = isset($category_data['active']) ? true : false;
        $category->type = $category_data['type'];
        $category->save();

        $imageData = [
            'title' => $category_data['image_title'],
            'alt' => $category_data['image_alt'],
            'url' => Storage::url('categories/'.$category_data['title'].'/'.$category_data['image_title'].'.png')
        ];
        $category->addImage($imageData);
    }

    public function editCategory(Category $category, array $category_data): void
    {
        $category->title = $category_data['title'];
        $category->code = $category_data['code'];
        $category->parent_id = $category_data['parent_id'];
        $category->active = isset($category_data['active']) ? true : false;
        $category->type = $category_data['type'];
        $category->save();
        if (isset($category_data['image'])) {
            $imageData = [
                'title' => $category_data['image_title'],
                'alt' => $category_data['image_alt'],
                'url' => Storage::url('categories/'.$category_data['title'].'/'.$category_data['image_title'].'.png')
            ];
            $category->updateImage($imageData);
        }


    }

    public function deleteCategory(Category $category): void
    {
        $category->deleteImage();
        $category->delete();
    }

    public function getCategoryByTitle(string $title): ?Category
    {
        return Category::where('title', $title)->first();
    }
}