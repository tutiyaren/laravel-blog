<?php
namespace App\UseCase\Category;
use App\Models\Category;

class GetEditCategory
{
    public function __invoke($id)
    {
        return Category::find($id);
    }
}