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
    <form>   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="search" name="search" class="block w-full p-4 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="جستجوی نام یا نام خانوادگی">
            <button type="submit" class="text-white absolute left-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">جستجو</button>
        </div>
    </form>
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
                    شماره دانشجویی
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    عملیات
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr class="bg-white border-b text-gray-900">
                    <th scope="row" class="py-4 px-6 font-medium">
                        {{$student->firstname}}
                    </th>
                    <td class="py-4 px-6">
                        {{$student->lastname}}
                    </td>
                    <td class="py-4 px-6">
                        {{$student->student_id}}
                    </td>
                    <td class="py-4 px-6 text-center">
                        <a href="/student/{{$student->id}}" class="w-16 h-6 bg-green-600 p-2.5 rounded-md font-medium text-white">ویرایش</a>
                        <a href="#" id="delete" data-id="{{$student->id}}" class="w-16 h-6 bg-red-600 p-2.5 rounded-md font-medium text-white">حذف</a>
                    </td>
                </tr>
            @empty
                
            @endforelse
            
        </tbody>
    </table>
</div>

</body>
</html>

<script>
    const deletebtn = document.querySelectorAll('[id=delete]');
    
    deletebtn.forEach((deletebtn, index) => {
          deletebtn.addEventListener("click", () => {
            const id = deletebtn.dataset.id;
            Swal.fire({
                title: 'حذف دانشجو',
                text: "دانشجو از سیستم حذف شود؟",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'انصراف',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'حذف'
                }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/student/delete/${id}`);
                    location.reload();
                }
                })
          })
        })
    
    
    
    </script>
@endsection
