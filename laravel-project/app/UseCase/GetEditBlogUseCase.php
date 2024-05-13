<?php
namespace App\UseCase;
use App\Models\Blog;
use App\Models\Category;

class GetEditBlogUseCase
{
    public function __invoke($id)
    {
        $blog = Blog::find($id);
        $categories = Category::where('user_id', auth()->user()->id)->get();
        return [$blog, $categories];
    }
}
