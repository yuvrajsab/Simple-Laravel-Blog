@extends('layouts.master')

@section('title', 'Forgot Password')

@section('content')
    
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Forgot Password</h1>
        <hr>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" id="fp-email-form">
            @csrf
            <div class="form-group">
                <label for="email"> Email: </label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email" data-parsley-required="true" data-parsley-maxlength="255">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script>
    $("#fp-email-form").parsley({
        "errorClass": 'is-invalid',
        "successClass": 'is-valid',
        "errorsWrapper": '<div class="invalid-feedback"></div>',
        "errorTemplate": '<p></p>'
    })
</script>
@endpush