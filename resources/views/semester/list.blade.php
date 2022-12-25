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
<div class="mt-16 px-4 relative shadow-md sm:rounded-lg">

    <table class="w-full text-sm text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 px-6">
                    سال
                </th>
                <th scope="col" class="py-3 px-6">
                    نیمسال
                </th>
                <th scope="col" class="py-3 px-6">
                    وضعیت
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    عملیات
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($semesters as $semester)
                <tr class="bg-white border-b text-gray-900">
                    <th scope="row" class="py-4 px-6 font-medium">
                        {{$semester->year}}
                    </th>
                    <td class="py-4 px-6">
                        {{$semester->semester}}
                    </td>
                    <td class="py-4 px-6">
                        {{$semester->current == 1 ? "ترم فعلی" : "پایان یافته" }}
                    </td>
                    <td class="py-4 px-6 text-center">
                        <a href="/semester/{{$semester->id}}" class="w-16 h-6 bg-green-600 p-2.5 rounded-md font-medium text-white">ویرایش</a>
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
