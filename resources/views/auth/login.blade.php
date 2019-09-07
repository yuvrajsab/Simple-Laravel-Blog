@extends('layouts.master')

@section('title', 'Login')

@section('content')
    
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Login</h1>
        <hr>

        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf
            <div class="form-group">
                <label for="email"> Email: </label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email" data-parsley-required="true" data-parsley-maxlength="255">
            </div>
            <div class="form-group">
                <label for="password"> Password: </label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" data-parsley-required="true" data-parsley-maxlength="255" minlength="5">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <a href="{{ route('password.request') }}">Forgot Password</a>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script>
    $("#login-form").parsley({
        "errorClass": 'is-invalid',
        "successClass": 'is-valid',
        "errorsWrapper": '<div class="invalid-feedback"></div>',
        "errorTemplate": '<p></p>'
    })
</script>
@endpush