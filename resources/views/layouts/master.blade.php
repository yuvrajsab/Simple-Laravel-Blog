<!doctype html>
<html lang="en">

@include('layouts.partials._head')

<body>
    @include('layouts.partials._header')
    
    <div class="container py-4">
        @include('layouts.partials._flashMessages')
        @yield('content')
    </div>
    
    @include('layouts.partials._footer')
</body>
</html>