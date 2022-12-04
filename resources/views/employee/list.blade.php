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
                        <a href="#" id="delete" data-id="{{$info->user_id}}" class="font-medium text-red-600 dark:text-blue-500 hover:underline">حذف</a>
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
            title: 'حذف کارمند',
            text: "کارمند از سیستم حذف شود؟",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'انصراف',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'حذف'
            }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/employee/delete/${id}`)
                Swal.fire(
                'حذف شد',
                'کارمند از سیستم حذف شد',
                'success'
                )
                location.reload();
            }
            })
      })
    })



</script>

@endsection