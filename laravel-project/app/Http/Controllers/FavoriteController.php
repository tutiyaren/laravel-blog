<?php
namespace App\Http\Controllers;
use App\Models\Favorite;
use App\UseCase\FavoriteUseCase;

class FavoriteController extends Controller
{
    public function favorite($id, FavoriteUseCase $case)
    {
        $userId = auth()->user()->id;
        $case($userId, $id);
        return redirect()->route('top');
    }
}
