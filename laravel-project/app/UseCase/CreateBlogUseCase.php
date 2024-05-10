<?php
namespace App\UseCase;
use App\Models\Blog;
use Illuminate\Http\Request;

class CreateBlogUseCase
{
    public function __invoke(Request $request)
    {
        $title = $request->input('title');
        $contents = $request->input('contents');

        $blog = new Blog();
        $blog->user_id = auth()->user()->id;
        $blog->title = $title;
        $blog->contents = $contents;

        $blog->save();
    }
}
