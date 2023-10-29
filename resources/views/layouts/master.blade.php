
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    @include('components.style')
</head>
<body class="fix-header fix-sidebar">
    <div id="main-wrapper">
        @include('components.Header')
        @include('components.Sidebar')

        <div class="page-wrapper">
            @yield('content')
        </div>
        @include('components.Footer')

    </div>

    @include('components.script')
    @stack('scripts')
</body>
</html>
