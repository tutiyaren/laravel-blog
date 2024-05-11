<?php
namespace App\UseCase;
use App\Models\Blog;
use App\Models\Blog_category;
use Illuminate\Http\Request;

class EditBlogUseCase
{
    public function __invoke(Request $request, $id)
    {
        $category_id = $request->input('name');
        $title = $request->input('title');
        $contents = $request->input('contents');
        $data = ['title' => $title, 'contents' => $contents];
        $blog = Blog::find($id);
        $blog->update($data);
        $blogCategory = Blog_category::where('blog_id', $id)->first();
        if($blogCategory) {
            $blogCategory->update(['category_id' => $category_id]);
            return;
        }
        Blog_category::create([
            'category_id' => $category_id,
            'blog_id' => $id
        ]);
    }
}
