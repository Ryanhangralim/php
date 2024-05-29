<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show(User $author){
    return view("authors", [
        "title" => "{{ $author->name }}'s Posts",
        "posts" => $author->posts,
        "author_name" => $author->name
    ]);
    }
}
