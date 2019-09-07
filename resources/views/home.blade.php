@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div class="jumbotron">
    <h1 class="display-4">Welcome to My Blog!</h1>
    <p class="lead">This is a my awesome blog</p>
    <hr class="my-4">
    <a href="#" class="btn btn-primary" role="button">Popular Posts</a>
</div>

<div class="row">
    <div class="col-8">
        <h2>Top Posts</h2>
        @foreach ($posts as $post)
            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{ strip_tags($post->body) }}</p>
                <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                <hr>
            </div>
        @endforeach
    </div>
    
    <aside class="col-4">
        <h2>sidebar</h2>
    </aside>
</div>
@endsection