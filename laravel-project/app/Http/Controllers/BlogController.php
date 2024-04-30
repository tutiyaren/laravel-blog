<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\UseCase\CreateBlogUseCase;
use App\UseCase\DeleteBlogUseCase;
use App\UseCase\EditBlogUseCase;
use App\UseCase\GetEditBlogUseCase;
use App\UseCase\GetMypageUseCase;
use App\UseCase\GetMypageDetailUseCase;
use App\UseCase\GetDetailUseCase;
use App\UseCase\GetAllBlogUseCase;


class BlogController extends Controller
{
    public function top(Request $request, GetAllBlogUseCase $case)
    {
        $item = $case($request);
        return view('blog.top', $item);
    }

    public function detail($id, GetDetailUseCase $case)
    {
        $data = $case($id);
        return view('blog.detail', $data);
    }

    public function mypage(GetMypageUseCase $case)
    {
        $myBlogs = $case();
        return view('my_blog.mypage', compact('myBlogs'));
    }

    public function my_detail($id, GetMypageDetailUseCase $case)
    {
        $myBlog = $case($id);
        return view('my_blog.my_detail', compact('myBlog'));
    }

    public function create()
    {
        return view('my_blog.create');
    }
    public function store(BlogRequest $request, CreateBlogUseCase $case)
    {
        $case($request);
        return redirect()->route('mypage');
    }

    public function edit($id, GetEditBlogUseCase $case)
    {
        $myBlog = $case($id);
        return view('my_blog.edit', compact('myBlog'));
    }

    public function update(BlogRequest $request, EditBlogUseCase $case)
    {
        $id = $request->input('id');
        $case($request, $id);
        return redirect()->route('my_detail', ['id' => $id]);
    }

    public function destroy(Request $request, DeleteBlogUseCase $case)
    {
        $case($request);
        return redirect()->route('mypage');
    }
}
