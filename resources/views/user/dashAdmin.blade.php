@extends('layouts.afterLogin')
@section('dash_link')
{{route('user.dash.admin')}}
@endsection
@section('content')
<h1>This is ADMIN dashboard</h1><br>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
@foreach ($clients as $cl)
<tr>
    <td>{{$cl->id}}</td>
    <td><a href="{{route('user.details',['id'=>$cl->id])}}">{{$cl->name}}</td>
    <td>{{$cl->email}}</td>
</tr>
@endforeach
</table>
@endsection