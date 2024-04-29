<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function edit()
    {
        return view('my_blog.edit');
    }
}
