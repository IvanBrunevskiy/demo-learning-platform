<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>24 News — Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">{{ $user_name }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</div>
@yield('content')
</body>
</html>
