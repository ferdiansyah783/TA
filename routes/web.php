<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Tags\Tag;

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
Auth::routes();

Route::get('/', function () {
    return view('custom.pages.index', [
        "title" => "SMK GO",
    ]);
})->name('home');

Route::get('schools', [SchoolController::class, 'index'])->name('schools.index');

Route::get('/contact', function () {
    return view('contact');
});

Route::resource('posts', PostController::class)->parameters([
    'posts' => 'post:slug',
]);

Route::resource('users', UserController::class)->parameters([
    'users' => 'user:username',
]);

Route::get('/dashboard', function () {
    $createOrSearchTag = Tag::all()->toArray();
    dd(collect($createOrSearchTag));
})->middleware('auth')->name('dashboard');

Route::post('/upload', function () {
    $validate = request()->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // check if uploaded file is an image
    if ($validate) {
        // get file name
        $fileName = now()->timestamp . "_" . request()->file('image')->getClientOriginalName();
        // move file to storage
        request()->file('image')->storeAs('public/images', $fileName);
        // return file name
        return response()->json([
            'url' => asset('storage/images/' . $fileName),
        ]);
    } else {
        return response()->json(['error' => [
            'message' => 'File is not valid!',
        ]]);
    }
})->name('upload-image')->middleware('auth');