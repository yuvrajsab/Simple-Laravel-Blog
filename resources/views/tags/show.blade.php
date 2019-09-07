@extends('layouts.master')

@section('title', 'View Tag')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }}</h1>
            <hr>    

            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Tags</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($tag->posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                @foreach ($post->tags as $post_tags)
                                    <span class="badge badge-secondary">{{ $post_tags->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-primary">view</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection