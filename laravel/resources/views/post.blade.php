@extends('layouts.main')

@section("container")
<article class="mb-5">
    <h2>{{ $post->title }}</h2>
    {{-- !! digunakan agar tidak dilakukan html escape --}}
    {!! $post->body !!}
</article>
<a href="/posts">Back to Post</a>
@endsection