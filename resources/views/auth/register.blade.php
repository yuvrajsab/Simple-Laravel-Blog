@extends('layouts.master')

@section('title', 'Register')

@section('content')
    
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Register</h1>
        <hr>

        <form method="POST" action="{{ route('register') }}" id="register-form">
            @csrf
            <div class="form-group">
                <label for="name"> Name: </label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter name" data-parsley-required="true" data-parsley-maxlength="255">
            </div>
            <div class="form-group">
                <label for="email"> Email: </label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email" data-parsley-required="true" data-parsley-maxlength="255">
            </div>
            <div class="form-group">
                <label for="password"> Password: </label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" data-parsley-required="true" data-parsley-maxlength="255" minlength="5">
            </div>
            <div class="form-group">
                <label for="conf_password"> Confirm Password: </label>
                <input type="password" name="password_confirmation" class="form-control" id="conf_password" placeholder="Enter confirm password" data-parsley-required="true" data-parsley-maxlength="255" minlength="5">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script>
    $("#register-form").parsley({
        "errorClass": 'is-invalid',
        "successClass": 'is-valid',
        "errorsWrapper": '<div class="invalid-feedback"></div>',
        "errorTemplate": '<p></p>'
    })
</script>
@endpush