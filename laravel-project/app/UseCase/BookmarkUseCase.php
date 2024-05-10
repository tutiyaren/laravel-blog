<?php
namespace App\UseCase;
use App\Models\Bookmark;

class BookmarkUseCase
{
    public function __invoke($userId, $id)
    {
        $bookmark = Bookmark::where('user_id', $userId)
            ->where('blog_id', $id)
            ->first();
        if ($bookmark) {
            $bookmark->delete();
            return;
        }
        $bookmarkModel = new Bookmark();
        $bookmarkModel->user_id = $userId;
        $bookmarkModel->blog_id = $id;
        $bookmarkModel->save();
    }
}
