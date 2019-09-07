@extends("layouts.master")

@section('title', 'All Categories')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1 class="m-0">All Categories</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('category.create') }}" class="btn btn-primary btn-block">Create New</a>
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
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('category.destroy', $category->id) }}">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-secondary" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection