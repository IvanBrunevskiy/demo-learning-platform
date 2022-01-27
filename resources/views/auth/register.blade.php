<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{asset('css/style_login.css')}}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
    <link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
</head>
<body>

<!--/ vladmaxi top bar -->

<div id="wrapper">
    <div class="user-icon"></div>
    <div class="pass-icon"></div>

    <form name="login-form" class="login-form" action="{{ route('registration') }}" method="post">
        @csrf
        <div class="header">
            <h1>Registration</h1>
        </div>

        <div class="content">
            <label>Login</label>
            <input name="name" type="text" class="input username"/>
            <label>Email</label>
            <input name="email" type="text" class="input username"/>
            <label>Password</label>
            <input name="password" type="password" class="input username"/>
            {{--        <label>Подтвердите пароль</label>--}}
            {{--        <input name="password" type="password" class="input username"/>--}}
        </div>

        <div class="footer">
            <button type="submit" class="button">Registr</button>
            <a href="{{route('login')}}">Login</a>
        </div>

    </form>
</div>
</body>
</html>
