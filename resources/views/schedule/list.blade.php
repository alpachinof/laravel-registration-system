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

    <form action="/schedule/store" method="POST">
    @csrf
    <div class="mt-16 relative ml-4 shadow-md sm:rounded-lg">

        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4">
                        انتخاب
                    </th>
                    <th scope="col" class="px-6 py-3">
                        نام درس 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        واحد
                    </th>
                    <th scope="col" class="px-6 py-3">
                        زمان برگزاری
                    </th>
                    <th scope="col" class="px-6 py-3">
                        استاد
                    </th>
                    <th scope="col" class="px-6 py-3">
                        شهریه
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="bg-white border-b text-gray-900">
                        <td class="w-4 p-4">
                            <div class="flex items-center justify-center">
                                <input type="checkbox" value="{{$course->id}}" name="checkbox[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{$course->name}}
                        </th>
                        <td class="text-center py-4">
                            {{$course->unit}}
                        </td>
                        <td class="text-center py-4">
                             {{$course->weekday . " " . $course->start_time . " " . $course->end_time}}
                        </td>
                        <td class="text-center py-4">
                            {{$course->firstname . " " . $course->lastname}}
                        </td>
                        <td class="text-center py-4">
                            {{$course->price}} تومان
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <button type="submit" class="inline-flex justify-center rounded-md border-2 border-transparent bg-indigo-600 my-8 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">ذخیره</button>
</form>

</body>
</html>
@endsection