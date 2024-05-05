<?php
namespace App\UseCase;
use App\Models\Blog;
use Illuminate\Http\Request;

class GetAllBlogUseCase
{
    public function __invoke(Request $request)
    {
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');
        $blogs = Blog::where('status', '!==', 1)->search($keyword)->sort($sort)->get();
        return compact('blogs');
    }
}
