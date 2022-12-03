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
            <form action="{{route('registerinformation')}}" method="POST">
              @csrf
              <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="firstname" class="block text-sm font-medium text-gray-700">نام</label>
                      <input type="text" name="firstname" id="firstname" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-red-400 focus:ring-red-400 sm:text-sm">
                    </div>
      
                    <div class="col-span-6 sm:col-span-3">
                      <label for="lastname" class="block text-sm font-medium text-gray-700">نام خانوادگی</label>
                      <input type="text" name="lastname" id="lastname" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
      
                    <div class="col-span-6 sm:col-span-3">
                      <label for="birthplace" class="block text-sm font-medium text-gray-700">محل تولد</label>
                      <input type="text" name="birthplace" id="birthplace" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="birthplace" class="block text-sm font-medium text-gray-700">تاریخ تولد</label>
                      <input type="date" name="birthdate" id="birthdate" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="degree" class="block text-sm font-medium text-gray-700">مدرک تحصیلی</label>
                        <select id="degree" name="degree" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                          <option value="diploma">دیپلم</option>
                          <option value="associate">کاردانی</option>
                          <option value="bachlor">کارشناسی</option>
                          <option value="graduate">ارشد</option>
                          <option value="professional">دکترا</option>
                        </select>
                      </div>
      
                    <div class="col-span-6">
                      <label for="address" class="block text-sm font-medium text-gray-700">آدرس</label>
                      <textarea type="text" name="address" id="address" rows="4" class="mt-1 block w-full resize-none rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                    </div>
      
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <label for="profile_pic" class="block text-sm font-medium text-gray-700">عکس پروفایل</label>
                      <input type="file" name="profile_pic" id="profile_pic" class="block w-full text-sm text-slate-500 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                    </div>
                  </div>
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