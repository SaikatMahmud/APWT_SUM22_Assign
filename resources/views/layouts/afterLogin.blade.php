<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div>
            <a href="@yield('dash_link')">Dashboard</a>
            | |
            <a href="{{route('user.login')}}">Logout</a>
        </div>
        <br>
        <div>
            @yield('content')
        </div>
    </body>
</html>