@extends('layouts.afterLogin')
@section('dash_link')
{{route('user.dash.admin')}}
@endsection
@section('content')
<h3>ID: {{$id}}</h3>
<h3>Name: {{$name}}</h3>
<h3>Email: {{$email}}</h3>
<h3>Type: {{$type}}</h3>
@endsection