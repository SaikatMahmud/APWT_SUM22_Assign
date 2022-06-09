<html>
    <head></head>
    <body>
        <div>
            <a href="{{route('user.login')}}">Login</a>
            | |
            <a href="{{route('user.register')}}">Register</a>
        </div>
        <br>
        <div>
            @yield('content')
        </div>
    </body>
</html>