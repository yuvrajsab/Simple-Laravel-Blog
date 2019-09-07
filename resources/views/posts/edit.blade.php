@extends('layouts.master')

@section('title', "Edit Post - $post->id")

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1>Edit Post {{ $post->id }}</h1>
        <hr>

        <form method="POST" action="{{ route('post.update', $post->id) }}" id="post-edit-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title"> Title: </label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control" id="title" placeholder="Enter title" data-parsley-required="true" data-parsley-maxlength="255">
            </div>
            <div class="form-group">
                <label for="slug"> Slug: </label>
                <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" class="form-control" id="slug" placeholder="Enter slug" data-parsley-required="true" data-parsley-maxlength="255" data-parsley_minlength="5">
            </div>
            <div class="form-group">
                <label for="category"> Category: </label>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == $post->category_id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags"> Tags: </label>
                <select name="tags_id[]" id="tags" class="form-control" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @foreach ($post->tags()->allRelatedIds() as $ids)
                            @if ($tag->id == $ids)
                                selected
                                @break
                            @endif
                        @endforeach>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image"> Image: </label>
                <input type="file" id="image" name="image" value="{{ $post->image }}">

            </div>
            <div class="form-group">
                <label for="body"> Body: </label>
                <textarea name="body" class="form-control" id="body" cols="30" rows="10" data-parsley-required="true">{{ old('body', $post->body) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block">create</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    $("#post-edit-form").parsley({
        "errorClass": 'is-invalid',
        "successClass": 'is-valid',
        "errorsWrapper": '<div class="invalid-feedback"></div>',
        "errorTemplate": '<p></p>'
    })

    tinymce.init({
        selector: '#body'
    });
</script>
@endpush