<!doctype html>
<html lang="en">

@include('admin.partials.head')
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.partials.header')

        <div class="app-main">
            @include('admin.partials.sidebar')
            @yield('content')
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    @include('admin.partials.scripts')
</body>
</html>
