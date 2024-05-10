<?php
namespace App\UseCase;
use App\Models\Favorite;

class FavoriteUseCase
{
    public function __invoke($userId, $id)
    {
        $favorite = Favorite::where('user_id', $userId)
            ->where('blog_id', $id)
            ->first();
        if ($favorite) {
            $favorite->delete();
            return;
        }
        $favoriteModel = new Favorite();
        $favoriteModel->user_id = $userId;
        $favoriteModel->blog_id = $id;
        $favoriteModel->save();
    }
}
