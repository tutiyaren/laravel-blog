<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    public function top()
    {
        return view('blog.top');
    }

    public function detail()
    {
        return view('blog.detail');
    }

    public function mypage()
    {
        $userId = auth()->user()->id;
        $myBlogs = Blog::where('user_id', $userId)->get();
        return view('my_blog.mypage', compact('myBlogs'));
    }

    public function my_detail($id)
    {
        $myBlog = Blog::find($id);
        return view('my_blog.my_detail', compact('myBlog'));
    }

    public function create()
    {
        return view('my_blog.create');
    }
    public function store(BlogRequest $request)
    {
        $title = $request->input('title');
        $contents = $request->input('contents');

        $blog = new Blog();
        $blog->user_id = auth()->user()->id;
        $blog->title = $title;
        $blog->contents = $contents;

        $blog->save();

        return redirect()->route('mypage');
    }

    public function edit($id)
    {
        $myBlog = Blog::find($id);
        return view('my_blog.edit', compact('myBlog'));
    }

    public function update(BlogRequest $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $contents = $request->input('contents');
        $blog = Blog::find($id);
        $blog->title = $title;
        $blog->contents = $contents;

        $blog->save();

        return redirect()->route('my_detail', ['id' => $id]);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Blog::find($id)->delete();
        return redirect()->route('mypage');
    }
}
