<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category_parent = new Category();
        $category_parent->title = 'main';
        $category_parent->code = 'main123';
        $category_parent->active = true;
        $category_parent->type = 'default';
        $category_parent->save();

        $category_child = new Category();
        $category_child->title = 'child';
        $category_child->code = 'child321';
        $category_child->parent_id = $category_parent->id;
        $category_child->active = true;
        $category_child->type = 'default';
        $category_child->save();
    }
}
