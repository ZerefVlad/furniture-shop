<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post1 = new Post();
        $post1->title = 'main';
        $post1->active = true;
        $post1->text = 'text test 12345 text test 54321';
        $post1->save();
    }
}
