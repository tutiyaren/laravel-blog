<?php
namespace App\UseCase;
use App\Models\Blog;

class GetEditBlogUseCase
{
    public function __invoke($id)
    {
        return Blog::find($id);
    }
}
