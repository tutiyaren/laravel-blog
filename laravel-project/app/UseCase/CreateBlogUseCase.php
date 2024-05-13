<?php
namespace App\UseCase;
use App\Models\Blog;
use App\Models\Blog_category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreateBlogUseCase
{
    public function __invoke(Request $request)
    {
        $title = $request->input('title');
        $contents = $request->input('contents');
        $category_id = $request->input('name');

        $blog = new Blog();
        $blog->user_id = auth()->user()->id;
        $blog->title = $title;
        $blog->contents = $contents;
        $blog->save();

        Blog_category::create([
            'blog_id' => $blog->id,
            'category_id' => $category_id,
        ]);
    }
}
