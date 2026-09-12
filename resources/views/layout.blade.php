<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        main {
            min-height: 300px;
            padding: 30px;
            text-align: center;
        }
    </style>

    @stack('styles')
</head>
<body>
    @include('partial.header')

    <main>
        @yield('content')
    </main>

    @include('partial.footer')
</body>
</html>
