@extends('layouts.navbar')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>سیستم اتوماسیون</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        @include('alerts')
        <div class="mt-16 flex flex-wrap gap-4 w-full text-center">
            <div class="w-64 h-32 bg-red-400 p-4">
                <h1>کاربران ثبت نام</h1>
                
                <span>{{$registerusers}}</span>
            </div>
            <div class="w-64 h-32 bg-red-400 p-4">
                <h1>کاربران اداری</h1>
                <span>{{$officeusers}}</span>
            </div>
            <div class="w-64 h-32 bg-red-400 p-4">
                <h1>کاربران مدیر</h1>
                <span>{{$admins}}</span>
            </div>
            <div class="w-64 h-32 bg-red-400 p-4">
                <h1>دانشجویان</h1>
                <span>4700</span>
            </div>

        </div>
    </body>
</html>
@endsection
