<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;

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

Route::group(['middleware' => 'auth'],function () {
    Route::get('/', [BlogController::class, 'top'])->name('top');
    Route::get('/detail/{id}', [BlogController::class, 'detail'])->name('detail');
    Route::post('/comment/store/{id}', [CommentController::class, 'store'])->name('comment.store');

    Route::get('/mypage', [BlogController::class, 'mypage'])->name('mypage');
    Route::get('/my_detail/{id}', [BlogController::class, 'my_detail'])->name('my_detail');
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
    Route::put('/update', [BlogController::class, 'update'])->name('update');
    Route::delete('/destroy', [BlogController::class, 'destroy'])->name('destroy');
    Route::put('/toggle/{id}', [BlogController::class, 'toggle'])->name('toggle');
    Route::post('/favorite/{id}', [FavoriteController::class, 'favorite'])->name('favorite');

    Route::get('/bookmark', [BookmarkController::class, 'bookmark'])->name('getBookmark');
    Route::post('/bookmark/{id}', [BookmarkController::class, 'checkBookmark'])->name('bookmark');
});



// Route::get('/', function () {
//     return view('welcome');
// });
