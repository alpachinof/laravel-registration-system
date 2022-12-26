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
            <form action="/course/store" method="POST">
              @csrf
              <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="name" class="block text-sm font-medium text-gray-700">نام</label>
                      <input type="text" name="name" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400 sm:text-sm">
                    </div>
      
                    <div class="col-span-6 sm:col-span-3">
                      <label for="unit" class="block text-sm font-medium text-gray-700">واحد</label>
                      <input type="number" name="unit" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="weekday" class="block text-sm font-medium text-gray-700">روز هفته</label>
                        <select name="weekday" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                          <option value="شنبه">شنبه</option>
                          <option value="بکشنبه">بکشنبه</option>
                          <option value="دوشنبه">دوشنبه</option>
                          <option value="سه شنبه">سه شنبه</option>
                          <option value="چهارشنبه">چهارشنبه</option>
                          <option value="پنج شنبه">پنج شنبه</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="start_time" class="block text-sm font-medium text-gray-700">ساعت شروع</label>
                        <input type="time" name="start_time" class="h-10 mt-1 w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="end_time" class="block text-sm font-medium text-gray-700">ساعت اتمام</label>
                        <input type="time" name="end_time" class="h-10 mt-1 w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="location" class="block text-sm font-medium text-gray-700">مکان برگزاری</label>
                        <select name="location" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach ($locations as $location)
                          <option value="{{$location->id}}">{{$location->site . " " . $location->room}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="lecturer" class="block text-sm font-medium text-gray-700">استاد درس</label>
                        <select name="lecturer" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach ($lecturers as $lecturer)
                          <option value="{{$lecturer->id}}">{{$lecturer->firstname . " " . $lecturer->lastname}}</option>
                          @endforeach
                        </select>
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
                  <a href="{{ url()->previous() }}" class="inline-flex justify-center rounded-md border-2 border-indigo-600 py-2 px-4 text-sm font-medium text-indigo-600 shadow-sm">بازگشت</a>
                </div>
              </div>
            </form>
    </div>
</body>
@endsection
</html>