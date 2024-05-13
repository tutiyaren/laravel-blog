<?php
namespace App\UseCase;
use App\Models\Category;

class GetCreateBlog
{
    public function __invoke()
    {
        return Category::where('user_id', auth()->user()->id)->get();
    }
}
