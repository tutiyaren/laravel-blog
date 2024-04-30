<?php
namespace App\UseCase;
use App\Models\Blog;

class GetMypageUseCase
{
    public function __invoke()
    {
        $userId = auth()->user()->id;
        return Blog::where('user_id', $userId)->get();
    }
}
