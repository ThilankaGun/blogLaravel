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

Route::get('/', function () {
//    \Illuminate\Support\Facades\DB::listen(function ($query){
//        logger($query->sql, $query->bindings);
//    });

    return view('posts', [
        'posts' => Post::latest()->with(['category', 'author'])->get()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {  //Post::where('slug', $post)->firstOrFail();  //wild cards
    return view('post', [
        'post' => $post
        //'post' => Post::findOrFail($id)
    ]);


});
    //->where('post', '[A-z_\-]+');                                                 //constrains

Route::get('categories/{category:slug}', function (\App\Models\Category $category){
    return view('posts', [
        'posts' => $category->posts
    ]);
});

//Route::get('users/{user}', function (\App\Models\User $user){
//    return view('posts', [
//        'posts' => $user->posts
//        ]);
//});

Route::get('authors/{author:username}', function (\App\Models\User $author){
    return view('posts', [
        'posts' => $author->posts
    ]);
});
