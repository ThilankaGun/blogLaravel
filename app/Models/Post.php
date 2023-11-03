<?php

namespace App\Models;

use Faker\Core\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug) {
         $this->title = $title;
         $this->excerpt = $excerpt;
         $this->date = $date;
         $this->body = $body;
         $this->slug = $slug;
    }

    /**
     * @param $title;
     * @param $excerpt;
     * @param $date;
     * @param $body;
     */


    public static function all()
    {
        return collect(\Illuminate\Support\Facades\File::files(resource_path("posts")))
            ->map(fn($file) => \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ));
        //return \Illuminate\Support\Facades\File::files(resource_path("posts/"));
        //return File::files(resource_path("posts/"));
    }

    public static function find($slug)
    {
            if(! file_exists($path = resource_path("posts/{$slug}.html"))){
                throw new ModelNotFoundException();
                //return redirect('/');                                                               //redirecting
                //abort(404);
            }

            return cache()->remember("posts.{slug}", 1200, fn() => file_get_contents($path)); //caching

    }


}
