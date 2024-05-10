<?php
namespace App\UseCase;
use App\Models\Blog;

class GetMypageDetailUseCase
{
    public function __invoke($id)
    {
        return Blog::find($id);
    }
}
