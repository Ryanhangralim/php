<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Ryan Hangralim", 
        "email" => "hangralim.2208561030@student.unud.ac.id"]);
});


Route::get('/posts', [PostController::class, 'index']);
//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

//halaman categories
Route::get('/categories', [CategoryController::class, 'index']);

//halaman category
Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

//halaman blog penulis
Route::get('/authors/{author:username}', [AuthorController::class, 'show']);