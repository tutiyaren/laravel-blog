<?php
namespace App\UseCase;
use App\Models\Blog;
use App\Models\Comment;

class GetDetailUseCase
{
    public function __invoke($id)
    {
        $blog = Blog::find($id);
        $comments = Comment::where('blog_id', $id)->get();
        return compact('blog', 'comments');
    }
}
