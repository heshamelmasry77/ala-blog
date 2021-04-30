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
    return view('welcome'); // view IS SOMETHING THE USER SEES. SOMETHING THAT YOU CAN SEE WITH YOUR EYES
}); // NO NEED TO WRITE welcome.blade.php JUST WE CAN WRITE THE NAME OF THE FILE welcome and it will work.

Route::get('/hello', function () {
    return ['foo' => 'bar'];
});
