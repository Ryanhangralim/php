<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/blog', function () {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Ryan Hangralim",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia accusamus quo eligendi! Officia ipsum fugit tempora labore ipsa error neque soluta quia quis deleniti autem ad tempore at, voluptas modi maxime recusandae! Consequatur sequi nobis quam ipsam magni itaque et consectetur odit mollitia hic. Deserunt praesentium mollitia consequatur inventore neque illum necessitatibus amet, ducimus itaque labore ut vero! Sit, quos recusandae officia fugiat velit cumque rem atque ipsa doloremque, quidem fugit animi minima vitae optio dicta aliquam numquam sed mollitia."
        ], 
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Hangralim Ryan",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur quidem ipsam autem ex ut tenetur nemo, assumenda alias quas! Vel debitis quibusdam id deserunt ipsam quasi officia nisi repudiandae quisquam sequi similique, deleniti in sunt rem veniam illo voluptas aspernatur illum recusandae a atque corporis. Laborum tempore aperiam ipsa officia incidunt, minima enim, odit cupiditate sit error iure. Fugit rerum quam alias aspernatur tempore ullam, excepturi adipisci ea soluta similique error autem nam aut in reprehenderit, cupiditate nihil quos? Blanditiis ut placeat quas, quae inventore labore? Non vero ex corporis aperiam dolorum delectus, laudantium, temporibus laboriosam atque quasi, debitis corrupti."
        ], 
    ];
    return view('posts', [
        "title" => "Posts",
        "posts" => $blog_posts,
    ]);
});


//halaman single post
Route::get('posts/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Ryan Hangralim",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia accusamus quo eligendi! Officia ipsum fugit tempora labore ipsa error neque soluta quia quis deleniti autem ad tempore at, voluptas modi maxime recusandae! Consequatur sequi nobis quam ipsam magni itaque et consectetur odit mollitia hic. Deserunt praesentium mollitia consequatur inventore neque illum necessitatibus amet, ducimus itaque labore ut vero! Sit, quos recusandae officia fugiat velit cumque rem atque ipsa doloremque, quidem fugit animi minima vitae optio dicta aliquam numquam sed mollitia."
        ], 
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Hangralim Ryan",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur quidem ipsam autem ex ut tenetur nemo, assumenda alias quas! Vel debitis quibusdam id deserunt ipsam quasi officia nisi repudiandae quisquam sequi similique, deleniti in sunt rem veniam illo voluptas aspernatur illum recusandae a atque corporis. Laborum tempore aperiam ipsa officia incidunt, minima enim, odit cupiditate sit error iure. Fugit rerum quam alias aspernatur tempore ullam, excepturi adipisci ea soluta similique error autem nam aut in reprehenderit, cupiditate nihil quos? Blanditiis ut placeat quas, quae inventore labore? Non vero ex corporis aperiam dolorum delectus, laudantium, temporibus laboriosam atque quasi, debitis corrupti."
        ], 
    ];

    foreach($blog_posts as $post){
        if($post["slug"] === $slug){
            $selected_post = $post;
        }
    }

    return view('post', [
        "title" => "Single Post",
        "post" => $selected_post
    ]);
});