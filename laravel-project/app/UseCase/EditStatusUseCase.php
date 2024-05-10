<?php
namespace App\UseCase;
use App\Models\Blog;

class EditStatusUseCase
{
    public function __invoke($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = 1 - $blog->status;
        $blog->save();
    }
}
