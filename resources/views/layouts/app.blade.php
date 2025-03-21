<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        @yield('content')
        <script src="{{ asset('js/auth.js') }}"></script>
    </div>
</body>
</html>
