@extends('layouts.master')

@section('title', 'View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p> Category: {{ $post->category->name ?? 'No Category' }} </p>
            <p> Tags: 
                @forelse ($post->tags as $tag)
                    <span class="badge badge-secondary">{{ $tag->name }}</span>
                @empty
                    No Tags
                @endforelse
            </p>
            <hr>
            @empty(!$post->image)
                <img src="{{ asset("storage/{$post->image}") }}" width="100%" height="auto" alt="">
                <form action="{{ route('file_delete', [$post->id, $post->image]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">delete</button>
                </form>
            @endempty
            <p class="lead">{!! $post->body !!}</p>
            <hr>
            <h6>Comments</h6>
            @forelse ($post->comments as $comment)
                <div class="card">
                    <div class="card-body">
                        <p class="card-text"> {{ $comment->message }} </p>
                        @if ($comment->user_id == Auth::id())
                            <form action="/comment/{{ $comment->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <div class="card card-body">
                    <p class="card-text">No commments yet.</p>
                </div>
            @endforelse
            <hr>
            <form action="/comment/{{ $post->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="comment" class="form-control"></textarea>    
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-dark">submit</button>
                </div>
            </form>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <strong>Slug:</strong> <a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a>
                    <br>
                        <strong>Created At:</strong> {{ date('d M Y h:ia', strtotime($post->created_at)) }}
                    <br>
                        <strong>LastEdit At:</strong> {{ date('d M Y h:ia', strtotime($post->updated_at)) }}
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-block btn-warning" role="button">Edit</a>
                        </div>
                        <div class="col-sm">
                            <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-block btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection