@extends('layouts.navbar')
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>سیستم اتوماسیون</title>

    @vite('resources/css/app.css')
</head>

@section('content')

<body dir="rtl">
  @include('alerts')
    <div class="mt-16">
            <form action="/bank/store" method="POST">
              @csrf
              <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="name" class="block text-sm font-medium text-gray-700">نام</label>
                      <input type="text" name="name" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400 sm:text-sm">
                    </div>
      
                    <div class="col-span-6 sm:col-span-3">
                      <label for="branch" class="block text-sm font-medium text-gray-700">شعبه</label>
                      <input type="text" name="branch" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                  </div>
                  @if ($errors->any())
                  @foreach ($errors->all() as $error)
                      <div class="text-red-400">{{$error}}</div>
                  @endforeach
                  @endif
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center rounded-md border-2 border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">ذخیره</button>
                </div>
              </div>
            </form>
    </div>
</body>
@endsection
</html>