<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title","To Do Project")</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    @yield('style')
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    @yield("content")
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>

</html>