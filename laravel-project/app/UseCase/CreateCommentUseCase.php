<?php
namespace App\UseCase;
use App\Models\Comment;
use Illuminate\Http\Request;

class CreateCommentUseCase
{
    public function __invoke(Request $request, $id)
    {
        $commenter_name = $request->input('commenter_name');
        $comments = $request->input('comments');
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->blog_id = $id;
        $comment->commenter_name = $commenter_name;
        $comment->comments = $comments;

        $comment->save();
    }
}
