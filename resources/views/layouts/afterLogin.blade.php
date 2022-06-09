<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div>
            <a href="{{route('user.dash')}}">Dashboard</a>
            | |
            <a href="{{route('user.details')}}">Your Profile</a>
        </div>
        <br>
        <div>
            @yield('content')
        </div>
    </body>
</html>