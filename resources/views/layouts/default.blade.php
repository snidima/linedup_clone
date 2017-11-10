
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Школа видеомонтажа')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app" class="app">
@yield('html')
</div>

@section('assets')
<link rel="stylesheet" href="{{mix('css/app.css')}}">
<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>
@show

</body>
</html>