<!doctype html>
<html lang="en">

@include('front.partials.head')

<body>
    @include('front.partials.header')

    @yield('content')

    @include('front.partials.footer')

    @include('front.partials.scripts')
</body>

</html>