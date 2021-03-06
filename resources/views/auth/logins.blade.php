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

    <form name="login-form" class="login-form" action="{{ route('login_on') }}" method="post">
        @csrf
        <div class="header">
            <h1>Authorization</h1>
        </div>

        <div class="content">
            <input name="name" type="text" class="input username" value="Login" onfocus="this.value=''"/>
            <input name="password" type="password" class="input password" value="Пароль" onfocus="this.value=''"/>
        </div>

        <div class="footer">
            <input type="submit" name="submit" value="Login" class="button"/>
            <a href="{{route('register')}}">Registration</a>
        </div>

    </form>
</div>
<div class="gradient"></div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".username").focus(function () {
            $(".user-icon").css("left", "-48px");
        });
        $(".username").blur(function () {
            $(".user-icon").css("left", "0px");
        });

        $(".password").focus(function () {
            $(".pass-icon").css("left", "-48px");
        });
        $(".password").blur(function () {
            $(".pass-icon").css("left", "0px");
        });
    });
</script>
</body>
</html>
