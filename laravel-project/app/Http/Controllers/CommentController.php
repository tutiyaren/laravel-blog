<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use App\Http\Requests\CommentRequest;
use App\UseCase\CreateCommentUseCase;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $id, CreateCommentUseCase $case)
    {
        $case($request, $id);
        return redirect()->route('detail', ['id' => $id]);
    }
}
