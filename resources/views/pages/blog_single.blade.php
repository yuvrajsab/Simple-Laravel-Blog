@extends('layouts.master')

@section('title', 'View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <hr>
            <p class="lead">{!! $post->body !!}</p>    
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <strong>Slug:</strong> <a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a>                
                        <br>
                        <strong>Category:</strong> {{ $post->category->name ?? 'No category' }} </a>
                        <br>
                        <strong>Created At:</strong> {{ date('d M Y h:ia', strtotime($post->created_at)) }}
                        <br>
                        <strong>LastEdit At:</strong> {{ date('d M Y h:ia', strtotime($post->updated_at)) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection