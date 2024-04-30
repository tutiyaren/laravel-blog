<?php
namespace App\UseCase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInUseCase
{
    public function __invoke(Request $request)
    {
        return Auth::attempt(['email' => $request->email, 'password' => $request->password]);
    }
}
