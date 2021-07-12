<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function allPosts(): \Illuminate\Support\Collection
    {
        return cache()->rememberForever('posts.all', function () {
            $files = File::files(resource_path("posts"));
            return collect($files)
                ->map(function ($file) {
                    $document = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                })
                ->sortByDesc('date');
        });

    }

    public static function find($slug)
    {
        // of all the blog posts, find the one with a slug that matches the one that was requested
        return static::allPosts()->firstWhere('slug', $slug);
    }
}
