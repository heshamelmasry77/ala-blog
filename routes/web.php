<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

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

Route::get('/', function () {

//    $posts = array_map(function ($file) {
//
//    }, $files);
//    dd($posts);
//    // WHEN YOU GET TO THE HOME PAGE, LOAD THE welcome VIEW
    $posts = Post::allPosts();
////    dd($posts);
    return view('posts', [
        'posts' => $posts
    ]);
});
Route::get('posts/{post}', function ($slug) {  // {} is a wildcard
    // 1. Find a post by it's slug and pass it to a view called "post"
    $post = Post::find($slug);
    return view('post', [
        'post' => $post
    ]);
});
//->where('post', '[A-z_\-]+')
// in brackets look for anything could be Capital
// i could be lower case and the plus sign means : find one or more of the proceeding characters

Route::get('/hello', function () {
    return ['foo' => 'bar'];
});
