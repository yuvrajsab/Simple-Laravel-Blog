@extends('layouts.master')

@section('title', 'Blog Archieve')

@section('content')

<div class="row">
    <div class="col-8 mx-auto">
        <h1>Blog</h1>
        @foreach ($posts as $post)
            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                <hr>
            </div>
        @endforeach
    </div>
</div>
@endsection