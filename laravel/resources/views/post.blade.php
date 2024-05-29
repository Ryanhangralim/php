@extends('layouts.main')

@section("container")
<article class="mb-5">
    <h1>{{ $post->title }}</h1>

    <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}"  class="text-decoration-none">{{ $post->category->name }}</a></p>

    {{-- !! digunakan agar tidak dilakukan html escape --}}
    {!! $post->body !!}
</article>
<a href="/posts" class="d-block mt-3">Back to Post</a>
@endsection