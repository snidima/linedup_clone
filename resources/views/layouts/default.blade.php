<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Онлайн курсы и школа видеомонтажа в Adobe After Effects - LinedUp')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/favicon.png" />
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


@if (\Illuminate\Support\Facades\Session::has('alert'))
    <script>
        alertify.alert("{{\Illuminate\Support\Facades\Session::get('alert')}}");
    </script>
@endif

@show

@if( \Illuminate\Support\Facades\App::environment() == 'production' )
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript' async>
(function(){ var widget_id = 'KLJez83FBH';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->

<!-- VK PIXEL -->
<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?159",t.onload=function(){VK.Retargeting.Init("VK-RTRG-273862-33vu2"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-273862-33vu2" style="position:fixed; left:-999px;" alt=""/></noscript>
<!-- VK PIXEL -->
@endif
</body>
</html>