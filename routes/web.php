<?php

use App\Models\Post;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => "SMK GO"
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        "title" => "Info SMK",
        "posts" => Post::all()
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => ["ferdi", "ariq", "reyka", "kaka"],
        "img" => ["ferdi.jpg", "ariq.jpg", "reyka.jpg", "kaka.jpg"],
        "job" => ["Web Developer"],
        "describtion" => []
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

// single post
Route::get('posts/{slug}', function($slug) {
    return view('post', [
        "title" => "Single Post",
        "post" => Post::find($slug)
    ]);
});
