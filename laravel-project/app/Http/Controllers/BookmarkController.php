<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Bookmark;
use App\UseCase\BookmarkUseCase;
use App\UseCase\GetBookmarkUseCase;

class BookmarkController extends Controller
{
    public function bookmark(GetBookmarkUseCase $case)
    {
        $userId = auth()->user()->id;
        $item = $case($userId);
        return view('my_blog.bookmark', $item);
    }

    public function checkBookmark($id, BookmarkUseCase $case)
    {
        $userId = auth()->user()->id;
        $case($userId, $id);
        return redirect()->back();
    }
}
