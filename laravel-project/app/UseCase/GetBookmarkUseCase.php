<?php
namespace App\UseCase;
use App\Models\Blog;
use App\Models\Bookmark;

class GetBookmarkUseCase
{
    public function __invoke($userId)
    {
        $userBookmarks = Bookmark::where('user_id', $userId)->get();
        $bookmarkExists = [];
        foreach ($userBookmarks as $bookmark) {
            $bookmarkExists[$bookmark->blog_id] = true;
        }
        $bookmarks = Blog::whereIn('id', array_keys($bookmarkExists))->get();
        return compact('bookmarks', 'bookmarkExists');
    }
}
