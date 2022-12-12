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
        <div class="mt-16 px-4 flex justify-center lg:justify-start flex-wrap gap-4 w-full text-center">
            <div class="w-full h-32 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">کاربران ثبت نام</h5>
                <span class="mb-2 font-bold text-gray-700">{{$registerusers}}</span>
            </div>
            <div class="w-full h-32 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">کاربران مدیر</h5>
            <span class="mb-3 font-bold text-gray-700">{{$admins}}</span>
            </div>
            <div class="w-full h-32 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">کاربران اداری</h5>
            <span class="mb-3 font-bold text-gray-700">{{$officeusers}}</span>
            </div>
            <div class="w-full h-32 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">دانشجویان</h5>
            <span class="mb-3 font-bold text-gray-700">2600</span>
            </div>

        </div>
    </body>
</html>
@endsection
