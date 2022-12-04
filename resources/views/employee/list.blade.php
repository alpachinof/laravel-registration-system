@extends('layouts.navbar')
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>سیستم اتوماسیون</title>

    @vite('resources/css/app.css')
</head>

@section('content')
<body>
<div class="mt-16 overflow-x-auto relative shadow-md sm:rounded-lg">
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
                    عملیات
                </th>
                <th scope="col" class="py-3 px-6">
                    عملیات
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($infos as $info)
                <tr class="bg-white border-b text-gray-900">
                    <th scope="row" class="py-4 px-6 font-medium">
                        {{$info->firstname}}
                    </th>
                    <td class="py-4 px-6">
                        {{$info->lastname}}
                    </td>
                    <td class="py-4 px-6">
                        <a href="/employee/{{$info->user_id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ویرایش</a>
                    </td>
                    <td class="py-4 px-6">
                        <a href="#" class="font-medium text-red-600 dark:text-blue-500 hover:underline">حذف</a>
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