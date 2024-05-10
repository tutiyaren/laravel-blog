<?php
namespace App\UseCase;
use App\Models\Blog;
use Illuminate\Http\Request;

class DeleteBlogUseCase
{
    public function __invoke(Request $request)
    {
        $id = $request->input('id');
        Blog::find($id)->delete();
    }
}
