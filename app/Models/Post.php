<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function allPosts()
    {
        $files = File::files(resource_path("posts/"));
//        array_map(function ($file) {
//            return $file->getContents();
//        }, $files);
        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
//        return File::files(resource_path("posts/"));
    }

    public static function find($slug)
    {
        $path = resource_path("posts/{$slug}.html"); // path to the post resource path is giving us the path of resources folder
        if (!file_exists($path)) {
//        dd('file does not exist'); die and dump kills the execution and shows something
//        abort(404);
            throw new ModelNotFoundException(); // throw an exception that this model doesn't exist
        }

        return cache()->remember("posts.{$slug}", now()->addMinutes(1), function () use ($path) {
//        var_dump('file_get_contents');
            return file_get_contents($path); // $post
        });
    }
}
