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
        return view('my_blog.mypage');
    }

    public function my_detail()
    {
        return view('my_blog.my_detail');
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

    public function edit()
    {
        return view('my_blog.edit');
    }
}
