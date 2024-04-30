<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $id)
    {
        $commenter_name = $request->input('commenter_name');
        $comments = $request->input('comments');
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->blog_id = $id;
        $comment->commenter_name = $commenter_name;
        $comment->comments = $comments;

        $comment->save();

        return redirect()->route('detail', ['id' => $id]);
    }
}
