@extends('layouts.master')

@section('title', 'Reset Password')

@section('content')
    
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Reset Password</h1>
        <hr>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update', $token) }}" id="fp-reset-form">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email"> Email: </label>
                <input type="email" name="email" value="{{ $email }}" class="form-control" id="email" placeholder="Enter email" data-parsley-required="true" data-parsley-maxlength="255">
            </div>

            <div class="form-group">
                <label for="password"> Password: </label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" data-parsley-required="true" data-parsley-maxlength="255">
            </div>

            <div class="form-group">
                <label for="password_confirmation"> Confirm Password: </label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter confirm password" data-parsley-required="true" data-parsley-maxlength="255">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script>
    $("#fp-reset-form").parsley({
        "errorClass": 'is-invalid',
        "successClass": 'is-valid',
        "errorsWrapper": '<div class="invalid-feedback"></div>',
        "errorTemplate": '<p></p>'
    })
</script>
@endpush