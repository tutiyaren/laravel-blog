<?php
namespace App\UseCase;
use App\Models\Blog;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetAllBlogUseCase
{
    public function __invoke(Request $request)
    {
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');
        $blogs = Blog::where('status', '!==', 1)->search($keyword)->sort($sort)->get();

        $favoriteExists = [];
        foreach ($blogs as $blog) {
            $exists = Favorite::where('user_id', Auth::id())
                ->where('blog_id', $blog->id)
                ->exists();

            $favoriteExists[$blog->id] = $exists;
        }
        return compact('blogs', 'favoriteExists');
    }
}
