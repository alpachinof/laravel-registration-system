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
                    حقوق
                </th>
                <th scope="col" class="py-3 px-6">
                    دریافتی
                </th>
                <th scope="col" class="py-3 px-6">
                    تفاوت
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($balances as $balance)
                <tr class="bg-white border-b text-gray-900">
                    <th scope="row" class="py-4 px-6 font-medium">
                        {{$balance->firstname . " " . $balance->lastname}}
                    </th>
                    <td class="py-4 px-6">
                        {{$balance->salary}}
                    </td>
                    <td class="py-4 px-6">
                        {{$balance->income}}
                    </td>
                    <td class="py-4 px-6">
                        {{$balance->income - $balance->salary }}
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
