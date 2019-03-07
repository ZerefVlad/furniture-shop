<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.02.19
 * Time: 20:56
 */

namespace App\Services;

use App\Models\Post;
use App\Models\Image;
use App\Models\ImageModel;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function getPosts()
    {
        return Post::all();
    }

    public function getPost(int $post_id)
    {
        return Post::find($post_id);
    }

    public function createPost(array $post_data): void
    {
        $post = Post::create([
            'title' => $post_data['title'],
            'active' =>  isset($post_data['active']) ? true : false,
            'text' => $post_data['text'],
        ]);

        $imageData = [
            'title' => $post_data['image_title'],
            'alt' => $post_data['image_alt'],
            'url' => Storage::url('posts/'.$post_data['image_title'].'.png')
        ];
        $post->addImage($imageData);



    }

    public function editPost(int $post_id, array $post_data): void
    {
        $post = Post::find($post_id);
        $post->update([
            'title' => $post_data['title'],
            'active' => isset($post_data['active']) ? true : false,
            'text' => $post_data['text'],
        ]);
        if (isset($post_data['image'])) {
            $imageData = [
                'title' => $post_data['image_title'],
                'alt' => $post_data['image_alt'],
                'url' => Storage::url('posts/'.$post_data['image_title'].'.png')
            ];
            $post->updateImage($imageData);
        }


    }

    public function deletePost(int $post_id)
    {
        Post::find($post_id)->delete();
    }
}