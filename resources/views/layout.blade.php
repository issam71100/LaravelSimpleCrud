<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Crud</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    @yield('stylesheet')
</head>
<body id="@yield('body_id')">
<nav class="navbar navbar-dark bg-dark">
    <div id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home')}}">Home</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
@yield('script')
</body>
</html>