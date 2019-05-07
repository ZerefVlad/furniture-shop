<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CommentController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }


    public function index ()
    {
        $comments = $this->getComments();

        return view('admin.comment.comment_list')
            ->with('comments', $comments);
    }

    public function getComments()
    {
        return Comment::all();
    }

    public function getComment(int $comment_id)
    {
        return Comment::find($comment_id);
    }

    public function replyComment(Request $request, Comment $comment)
    {

        $comment->replyComment($request->except(['_token']), $request->user());
        return back();
    }

}
