@extends('layouts.navbar')
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>سیستم اتوماسیون</title>
    @vite('resources/css/app.css')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

@section('content')
<body>
    @include('alerts')
    <div class="relative mt-16">
        <a href="/lecturer/create" class="text-white right-2.5 bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-3">ثبت استاد جدید</a>
    </div>
<div class="mt-6 px-4 relative shadow-md sm:rounded-lg">

    <table class="w-full text-sm text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 px-6">
                    نام
                </th>
                <th scope="col" class="py-3 px-6">
                    نام خانوادگی
                </th>
                <th scope="col" class="py-3 px-6">
                    سمت
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    عملیات
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lecturers as $lecturer)
                <tr class="bg-white border-b text-gray-900">
                    <th scope="row" class="py-4 px-6 font-medium">
                        {{$lecturer->firstname}}
                    </th>
                    <td class="py-4 px-6">
                        {{$lecturer->lastname}}
                    </td>
                    <td class="py-4 px-6">
                        {{$lecturer->role}}
                    </td>
                    <td class="py-4 px-6 text-center">
                        <a href="/lecturer/{{$lecturer->id}}/courses" class="w-16 h-6 bg-green-600 p-2.5 rounded-md font-medium text-white">لیست دروس</a>
                        {{-- <a href="#" id="delete" data-id="{{$student->id}}" class="w-16 h-6 bg-red-600 p-2.5 rounded-md font-medium text-white">حذف</a> --}}
                    </td>
                </tr>
            @empty
                
            @endforelse
            
        </tbody>
    </table>
</div>

</body>
</html>
@endsection
