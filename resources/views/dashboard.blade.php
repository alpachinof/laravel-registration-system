@extends('layouts.navbar')

@section('content')
<html>
    
    <head>
        @vite('resources/css/app.css')
    </head>

    <body>
        @include('alerts')
        <h1 class="text-4xl">admin panel</h1>
        <a href="{{route('logout')}}">logout</a>
    </body>
    </html>
@endsection