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
                                                //following method is exactly same as above
                                            //    $posts = array_map(function ($file){
                                            //        $document = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
                                            //
                                            //        return new Post(
                                            //            $document->title,
                                            //            $document->excerpt,
                                            //            $document->date,
                                            //            $document->body(),
                                            //            $document->slug
                                            //        );
                                            //    }, $files);

    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {                                               //wild cards
    return view('post', [
        'post' => Post::find($slug)
    ]);


})->where('post', '[A-z_\-]+');                                                 //constrains
