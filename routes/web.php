<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { // WHEN YOU GET TO THE HOME PAGE, LOAD THE welcome VIEW
    return view('posts'); // view IS SOMETHING THE USER SEES. SOMETHING THAT YOU CAN SEE WITH YOUR EYES
}); // NO NEED TO WRITE welcome.blade.php JUST WE CAN WRITE THE NAME OF THE FILE welcome and it will work.

Route::get('posts/{post}', function ($slug){  // {} is a wildcard
    $path = __DIR__."/../resources/posts/{$slug}.html";
//    dd($path);
    if(! file_exists($path)){
//        dd('file does not exist');
//        abort(404);
        return redirect('/');
    }
    $post = file_get_contents($path); // $post
    return view('post', [
        'post' => $post
    ]);
//    return $slug;
})->where('post', '[A-z_\-]+');
//in brackets look for anything could be Capital i could be lower case and the plus sign means : find one or more of the proceeding characters

Route::get('/hello', function () {
    return ['foo' => 'bar'];
});
