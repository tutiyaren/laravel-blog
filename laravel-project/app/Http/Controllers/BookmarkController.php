<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function bookmark()
    {
        $userId = auth()->user()->id;
        $userBookmarks = Bookmark::where('user_id', $userId)->get();
        $bookmarkExists = [];
        foreach ($userBookmarks as $bookmark) {
            $bookmarkExists[$bookmark->blog_id] = true;
        }
        $bookmarks = Blog::whereIn('id', array_keys($bookmarkExists))->get();
        return view('my_blog.bookmark', compact('bookmarks', 'bookmarkExists'));
    }

    public function checkBookmark($id)
    {
        $userId = auth()->user()->id;
        $bookmark = Bookmark::where('user_id', $userId)
            ->where('blog_id', $id)
            ->first();
        if ($bookmark) {
            $bookmark->delete();
            return redirect()->back();
        }
        $bookmarkModel = new Bookmark();
        $bookmarkModel->user_id = $userId;
        $bookmarkModel->blog_id = $id;
        $bookmarkModel->save();
        return redirect()->back();
    }
}
