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
        <form>   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="flex items-center gap-4 relative">
                <label for="start" class="block text-sm font-medium text-gray-700">تاریخ شروع</label>
                <input type="date" name="start" class="block w-64 p-4 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                <label for="end" class="block text-sm font-medium text-gray-700">تاریخ پایان</label>
                <input type="date" name="end" class="block w-64 p-4 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                <button type="submit" class="text-white bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">جستجو</button>
            </div>
        </form>
    </div>

<div class="mt-6 px-4 relative shadow-md sm:rounded-lg">
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
                    مبلع
                </th>
                <th scope="col" class="py-3 px-6">
                    تاریخ وصول
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cheques as $cheque)
                <tr class="bg-white border-b text-gray-900">
                    <th scope="row" class="py-4 px-6 font-medium">
                        {{$cheque->firstname . " " . $cheque->lastname}}
                    </th>
                    <td class="py-4 px-6">
                        {{$cheque->student_id}}
                    </td>
                    <td class="py-4 px-6">
                        {{$cheque->debt}}
                    </td>
                    <td class="py-4 px-6">
                        {{$cheque->due_date}}
                    </td>
                    {{-- <td class="py-4 px-6 text-center">
                        <a href="/discount/{{$discount->id}}" class="w-16 h-6 bg-green-600 p-2.5 rounded-md font-medium text-white">ویرایش</a>
                        <a href="#" id="delete" data-id="{{$student->id}}" class="w-16 h-6 bg-red-600 p-2.5 rounded-md font-medium text-white">حذف</a>
                    </td> --}}
                </tr>
            @empty
                
            @endforelse
            
        </tbody>
    </table>
</div>

</body>
</html>
@endsection
