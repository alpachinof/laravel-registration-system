@extends('layouts.navbar')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>سیستم اتوماسیون</title>

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        @include('alerts')
        <h1 class="text-4xl">user panel</h1>
        <a href="{{route('logout')}}">logout</a>
    </body>
</html>
@endsection
