@extends("layouts.master")

@section('title', 'All Posts')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1 class="m-0">All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('post.create') }}" class="btn btn-primary btn-block">Create New Post</a>
        </div>
    </div>
    <hr>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            {{ substr(strip_tags($post->body), 0, 50) }}
                            {{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}
                        </td>
                        <td>{{ date("M j, Y", strtotime($post->created_at)) }}</td>
                        <td>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-secondary" role="button">view</a>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-secondary" role="button">edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection