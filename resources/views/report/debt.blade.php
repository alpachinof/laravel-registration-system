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
                    نام
                </th>
                <th scope="col" class="py-3 px-6">
                    شماره دانشجویی
                </th>
                <th scope="col" class="py-3 px-6">
                    بدهی
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($debts as $debt)
                <tr class="bg-white border-b text-gray-900">
                    <th scope="row" class="py-4 px-6 font-medium">
                        {{$debt->firstname . " " . $debt->lastname}}
                    </th>
                    <td class="py-4 px-6">
                        {{$debt->student_id}}
                    </td>
                    <td class="py-4 px-6">
                        {{$debt->debt . " تومان "}}
                    </td>
                    <td class="py-4 px-6 text-center">
                        {{-- <a href="/discount/{{$discount->id}}" class="w-16 h-6 bg-green-600 p-2.5 rounded-md font-medium text-white">ویرایش</a> --}}
                        {{-- {{-- <a href="#" id="delete" data-id="{{$student->id}}" class="w-16 h-6 bg-red-600 p-2.5 rounded-md font-medium text-white">حذف</a> --}}
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

</body>
</html>
@endsection
