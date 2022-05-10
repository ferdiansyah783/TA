<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('custom.pages.index', [
        "title" => "SMK GO",
    ]);
})->name('home');

Route::get('/contact', function () {
    return view('contact');
});

// Route::resource('posts', PostController::class)->parameters([
//     'posts' => 'post:slug',
// ]);

// Route::resource('users', UserController::class)->parameters([
//     'users' => 'user:username',
// ]);

/**
 * Ini adalah route resources untuk
 * CRUD data jurusan.
 */
Route::resource('jurusan', JurusanController::class)->parameters([
    'jurusans' => 'jurusan:slug',
])->only(['show']);

/**
 * Ini adalah route resources untuk
 * CRUD data sekolah.
 */
Route::resource('sekolah', SchoolController::class)->parameters([
    'schools' => 'sekolah:slug',
])->only(['index', 'create', 'edit', 'show']);

Route::get('/dashboard', function () {
    return view('custom.pages.dashboard.index', [
        "title" => "Dashboard",
    ]);
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

Route::get('/daftar-sekolah', function () {
    return \view('custom.pages.schools', [
        "title" => "Daftar Sekolah",
    ]);
})->name('daftar-sekolah');