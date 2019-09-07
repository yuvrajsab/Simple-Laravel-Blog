@extends("layouts.master")

@section('title', 'All tags')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1 class="m-0">All tags</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tag.create') }}" class="btn btn-primary btn-block">Create New Tag</a>
        </div>
    </div>
    <hr>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td><a href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a></td>
                        <td>
                            <form method="POST" action="{{ route('tag.destroy', $tag->id) }}">
                                @csrf
                                @method('DELETE')
        
                                <button class="btn btn-sm btn-secondary" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tags->links() }}
    </div>
@endsection