<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;


class PostController extends Controller
{


    public function showPosts()
    {
        $posts = Post::all();
        return view('blog.blog_list', [
            'posts' => $posts,
            ]);
    }

    public function showPost(Post $post)
    {

        return view('blog.blog_single', [
            'post' => $post
        ]);
    }
}
