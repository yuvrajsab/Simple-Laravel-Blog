@extends('layouts.master')

@section('title', 'Create New tag')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1>Create New tag</h1>
        <hr>

        <form method="post" action="{{ route('tag.store') }}" id="tag-create-form">
            @csrf
            <div class="form-group">
                <label for="name"> Name: </label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter name" data-parsley-required="true" data-parsley-maxlength="255">
            </div>
            <button type="submit" class="btn btn-success btn-block">create</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script>
    $("#tag-create-form").parsley({
        "errorClass": 'is-invalid',
        "successClass": 'is-valid',
        "errorsWrapper": '<div class="invalid-feedback"></div>',
        "errorTemplate": '<p></p>'
    })
</script>
@endpush