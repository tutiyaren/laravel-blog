<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/signin', [UserController::class, 'signin'])->name('signin');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/', [BlogController::class, 'top'])->name('top');
Route::get('/detail', [BlogController::class, 'detail'])->name('detail');

Route::get('/mypage', [BlogController::class, 'mypage'])->name('mypage');
Route::get('/my_detail/{id}', [BlogController::class, 'my_detail'])->name('my_detail');
Route::get('/create', [BlogController::class, 'create'])->name('create');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
Route::put('/update', [BlogController::class, 'update'])->name('update');
Route::delete('/destroy', [BlogController::class, 'destroy'])->name('destroy');



// Route::get('/', function () {
//     return view('welcome');
// });
