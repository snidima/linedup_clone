<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Школа видеомонтажа')</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>