@extends('layouts.navbar')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>سیستم اتوماسیون</title>
        @vite('resources/css/app.css')
        @vite('resources/js/chart.js')
    </head>
    <body>
        @include('alerts')
        <div class="mt-16 px-4 flex justify-center lg:justify-start flex-wrap gap-4 w-full text-center">

            <a href="/employee/role/0" class="w-full h-32 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">کاربران ثبت نام</h5>
                    <span class="mb-2 font-bold text-gray-700">{{$registerusers}}</span>
            </a>

            <a href="/employee/role/1" class="w-full h-32 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">کاربران مدیر</h5>
            <span class="mb-3 font-bold text-gray-700">{{$admins}}</span>
            </a>

            <a href="/employee/role/2" class="w-full h-32 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">کاربران اداری</h5>
            <span class="mb-3 font-bold text-gray-700">{{$officeusers}}</span>
            </a>

            <a href="/student" class="w-full h-32 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">دانشجویان</h5>
                <span class="mb-3 font-bold text-gray-700">{{$students}}</span>
            </a>

            @admin
            <div class="flex flex-col lg:flex-row flex-wrap items-center justify-center w-full h-full">
            <div class="w-full max-w-sm h-full">
                <canvas id="myChart"></canvas>
            </div>

            <div class="w-full max-w-sm h-full">
                <canvas id="myChart2"></canvas>
            </div>

            <div class="w-full max-w-sm h-full">
                <canvas id="myChart3"></canvas>
            </div>

            <div class="w-full max-w-sm h-full">
                <canvas id="myChart4"></canvas>
            </div>

            </div>
            @endadmin
        </div>
    </body>
</html>

<script>
//lecturer's course count
const labels = {!! json_encode($courses->toArray()) !!};

courses = labels.map(x => (x.courses_count));

const lecturers = labels.map(x => (x.firstname + " " + x.lastname));

//student per course count
const labels2 = {!! json_encode($studentpercourses->toArray()) !!};

students = labels2.map(x => (x.name));

const courses2 = labels2.map(x => (x.count));

//students per semester
const labels3 = {!! json_encode($studentpersemesters->toArray()) !!};

semesters = labels3.map(x => (x.code));

const students3 = labels3.map(x => (x.count));

//income and expense
const income = {!! json_encode($income->toArray()) !!};
const expense = {!! json_encode($expense->toArray()) !!};

incomes = income.map(x => (x.income));

expenses = expense.map(x => (x.expense));
</script>
@endsection
