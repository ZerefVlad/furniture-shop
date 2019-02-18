<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\ImageModel;
use App\Services\PostService;
use App\Models\Post;

use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $post_service;

    public function __construct(PostService $post_service)
    {
        $this->post_service = $post_service;
        $this->middleware('auth');
    }

    public function index ()
    {
        $posts = $this->post_service->getPosts();

        return view('admin.post.post_list')
            ->with('posts', $posts);
    }

    public function createPost(PostCreateRequest $request)
    {

        $image = $request->file('image')->storeAs('posts',$request->title.'.png');

        $this->post_service->createPost($request->all());
        Session::flash('post_create_success', 'Post успешно создан');

        return back();
    }

    public function  PostActionCreate(Request $request)
    {
        $posts = $this->post_service->getPosts();

        return view('admin.post.post_create')
            ->with('action', 'create')
            ->with('post', null)
            ->with('image', null)
            ->with('posts', $posts);
    }

    public function editPost($id, PostCreateRequest $request)
    {
        $image = $request->file('image')->storeAs('posts',$request->title.'.png');


        $this->post_service->editPost($id, $request->all());
        Session::flash('post_edit_success', 'Post успешно changed');

        return back();
    }

    public function  postActionEdit($id, Request $request)
    {
        $post = $id ? $this->post_service->getPost($id) : null;
        $posts = $this->post_service->getPosts();
        $image = ImageModel::where('model', Post::class)
            ->where('model_id', $id)->first();

        if ($image) {
            $image = Image::find($image->image_id);
        }

        return view('admin.post.post_create')
            ->with('action', 'edit')
            ->with('id', $id)
            ->with('image', $image)
            ->with('post', $post)
            ->with('posts', $posts);
    }



    public function deletePost($id)
    {
        $this->post_service->deletePost($id);
        $relation = ImageModel::where('model', Post::class)
            ->where('model_id', $id)->first();
        if ($relation) {
            $image = Image::find($relation->image_id);
            Storage::delete('posts/'.$image->filename);
            $relation->delete();
            $image->delete();
        }

        Session::flash('post_delete_success', 'Post успешно deleted');

        return back();
    }

    public function deletePicture(Request $request)
    {
        $image = Image::find($request->pictureId);
        Storage::delete('posts/'.$image->filename);
        $relation = ImageModel::where('image_id', $request->pictureId)->first();
        if ($relation) {
            $relation->delete();
        }
        $image->delete();
    }
}
