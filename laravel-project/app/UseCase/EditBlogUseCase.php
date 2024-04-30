<?php
namespace App\UseCase;
use App\Models\Blog;
use Illuminate\Http\Request;

class EditBlogUseCase
{
    public function __invoke(Request $request, $id)
    {
        $title = $request->input('title');
        $contents = $request->input('contents');
        $blog = Blog::find($id);
        $blog->title = $title;
        $blog->contents = $contents;

        $blog->save();
    }
}
