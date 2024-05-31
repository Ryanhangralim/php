<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show(User $author){
        $name = $author->name;
    return view("authors", [
        "title" => $name . "'s Posts",
        "posts" => $author->posts->load('category', 'author'),
        "author_name" => $name
    ]);
    }
}
