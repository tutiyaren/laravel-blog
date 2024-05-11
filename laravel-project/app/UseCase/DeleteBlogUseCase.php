<?php
namespace App\UseCase;
use App\Models\Blog;
use Illuminate\Http\Request;

class DeleteBlogUseCase
{
    public function __invoke(Request $request)
    {
        $blogId = $request->input('id');
        $blog = Blog::find($blogId);
        $blog->blog_categories()->delete();
        $blog->delete();
    }
}
