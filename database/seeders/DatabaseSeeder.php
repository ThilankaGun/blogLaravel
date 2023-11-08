<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //        User::truncate();
        //        Category::truncate();
        //        Post::truncate();
        $user = User::factory()->create([
            'name' => 'Windy',
        ]);
        Post::factory(15)->create([
            'user_id' => $user->id,
        ]);



        // \App\Models\User::factory(10)->create();
        //        $user = \App\Models\User::factory()->create();

        //        $personal = Category::create([
        //            'name' => 'Personal',
        //            'slug' => 'personal'
        //        ]);
        //
        //        $family = Category::create([
        //            'name' => 'Family',
        //            'slug' => 'family'
        //        ]);
        //
        //        $work = Category::create([
        //            'name' => 'Work',
        //            'slug' => 'work'
        //        ]);
        //
        //        Post::create([
        //            'user_id' =>$user->id,
        //            'category_id' => $family->id,
        //            'title' => 'My Family Post',
        //            'excerpt' => '<p>Excerpt for my post</p>',
        //            'body' => '<p>Uin ncididunt ut labore et dolore magna aliqua. Uin ncididunt ut labore et dolore magna aliqua. Uin ncididunt ut labore et dolore magna aliqua.</p>',
        //            'slug' => 'my-family-post',
        //        ]);
        //
        //        Post::create([
        //            'user_id' =>$user->id,
        //            'category_id' => $work->id,
        //            'title' => 'My Work Post',
        //            'excerpt' => '<p>Excerpt for my post</p>',
        //            'body' => '<p>Uin ncididunt ut labore et dolore magna aliqua. Uin ncididunt ut labore et dolore magna aliqua. Uin ncididunt ut labore et dolore magna aliqua.</p>',
        //            'slug' => 'my-work-post',
        //        ]);
        //
        //        Post::create([
        //            'user_id' =>$user->id,
        //            'category_id' => $personal->id,
        //            'title' => 'My Personal Post',
        //            'excerpt' => '<p>Excerpt for my post</p>',
        //            'body' => '<p>Uin ncididunt ut labore et dolore magna aliqua. Uin ncididunt ut labore et dolore magna aliqua. Uin ncididunt ut labore et dolore magna aliqua.</p>',
        //            'slug' => 'my-personal-post',
        //        ]);
    }
}
