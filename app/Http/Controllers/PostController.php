<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;


class PostController extends Controller
{


    public function showPosts(Post $post)
    {
        $posts = Post::all();
        $posts = Post::paginate(6);
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
