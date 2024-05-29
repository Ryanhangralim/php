@extends('layouts.main')

@section("container")
<article class="mb-5">
    <h1>{{ $post->title }}</h1>

    <p>By. Ryan Hangralim in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

    {{-- !! digunakan agar tidak dilakukan html escape --}}
    {!! $post->body !!}
</article>
<a href="/posts">Back to Post</a>
@endsection