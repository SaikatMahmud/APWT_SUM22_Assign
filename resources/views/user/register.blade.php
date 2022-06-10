@extends('layouts.beforeLogin')
@section('content')
    <form method="post" action="">
        {{ @csrf_field() }}
        Name: <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"><br>
        @error('name')
            {{ $message }}<br>
        @enderror

        Email: <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"><br>
        @error('email')
            {{ $message }} <br>
        @enderror
        
        Type: <select name="type">
            <option value="">Select</option>
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select> (default User) <br>

        Password: <input type="password" name="password"><br>
        @error('password')
            {{ $message }}<br>
        @enderror

        Confirm Password: <input type="password" name="confirmPass"><br>
        @error('confirmPass')
            {{ $message }}<br>
        @enderror


        <input type="submit" value="Create">
    </form>
@endsection
