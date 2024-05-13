<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CategoryController;

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
    // blogトップ
    Route::get('/', [BlogController::class, 'top'])->name('top');
    Route::get('/detail/{id}', [BlogController::class, 'detail'])->name('detail');
    Route::post('/comment/store/{id}', [CommentController::class, 'store'])->name('comment.store');

    // マイページ
    Route::get('/mypage', [BlogController::class, 'mypage'])->name('mypage');
    Route::get('/my_detail/{id}', [BlogController::class, 'my_detail'])->name('my_detail');
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
    Route::put('/update', [BlogController::class, 'update'])->name('update');
    Route::delete('/destroy', [BlogController::class, 'destroy'])->name('destroy');
    Route::put('/toggle/{id}', [BlogController::class, 'toggle'])->name('toggle');
    Route::post('/favorite/{id}', [FavoriteController::class, 'favorite'])->name('favorite');

    // ブックマーク
    Route::get('/bookmark', [BookmarkController::class, 'bookmark'])->name('getBookmark');
    Route::post('/bookmark/{id}', [BookmarkController::class, 'checkBookmark'])->name('bookmark');

    // カテゴリー
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/destroy{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});



// Route::get('/', function () {
//     return view('welcome');
// });
