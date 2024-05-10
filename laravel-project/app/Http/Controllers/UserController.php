<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\UseCase\SignUpUseCase;
use App\UseCase\SignInUseCase;
use App\UseCase\LogoutUseCase;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function signup(UserRequest $request, SignUpUseCase $case)
    {
        $case($request);
        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signin(Request $request, SignInUseCase $case)
    {
        $result = $case($request);
        if ($result) {
            return redirect()->route('top');
        }
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが間違っています。',
        ]);
    }

    public function logout(Request $request, LogoutUseCase $case)
    {
        $case($request);
        return redirect()->route('login');
    }
}
