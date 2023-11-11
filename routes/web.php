<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [\App\Http\Controllers\PostController::class, 'show']);
//->where('post', '[A-z_\-]+');                                                 //constrains

Route::get('categories/{category:slug}', function (App\Models\Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => \App\Models\Category::all(),
    ]);
})->name('category');

//Route::get('users/{user}', function (\App\Models\User $user){
//    return view('posts', [
//        'posts' => $user->posts
//        ]);
//});

Route::get('authors/{author:username}', function (App\Models\User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => \App\Models\Category::all(),
    ]);
});
