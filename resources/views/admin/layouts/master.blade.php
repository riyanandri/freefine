<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layouts.header')
</head>
<body>
    @include('admin.layouts.loader')

    <div class="main-wrapper">
        @include('admin.layouts.navbar')

        @include('admin.layouts.sidebar')

        <div class="page-wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</body>
</html>
