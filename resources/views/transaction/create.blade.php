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
  <div class="mt-16 flex items-start justify-between gap-2 ml-4">
    <table class="w-full ml-4 text-sm text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    نام درس 
                </th>
                <th scope="col" class="px-6 py-3">
                    واحد
                </th>
                <th scope="col" class="px-6 py-3">
                    شهریه
                </th>
            </tr>
        </thead>
        <tbody>
          @if(Session::has('models'))
              @foreach( Session::get('models') as $model)
                <tr class="bg-white border-b text-gray-900">
                    <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        {{$model->name}}
                    </td>
                    <td class="text-right px-6 py-3">
                        {{$model->unit}}
                    </td>
                    <td class="text-right px-6 py-3">
                        {{$model->price . " تومان " }}
                    </td>
                </tr>
              @endforeach
            @endif
        </tbody>
    </table>

</div>

<form action="/transaction/store/@if(Session::has('id')){{ Session::get('id') }}@endif" method="POST">
  @csrf
    <div class="overflow-hidden shadow sm:rounded-md">
      <div class="bg-white px-4 py-5 sm:p-6">
        <div class="grid grid-cols-6 gap-6">

          <div class="col-span-6 sm:col-span-2">
            <label for="sum" class="block text-sm font-medium text-gray-700">مجموع</label>
            <input id="sum" type="number" name="sum" value="@if(Session::has('models')){{Session::get('models')->sum('price')}}@endif" readonly class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="rawdiscount" class="block text-sm font-medium text-gray-700">تخفیف</label>
            <input id="rawdiscount" type="number" value="" readonly class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
          </div>

          <div class="col-span-6 sm:col-span-2">
            <label for="amount" class="block text-sm font-medium text-gray-700">کل پرداختی</label>
            <input id="amount" type="number" value="" readonly name="amount" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
          </div>
          
          <div class="col-span-6 sm:col-span-3">
            <label for="type" class="block text-sm font-medium text-gray-700">نوع پرداختی</label>
            <select id="type" name="type" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              <option value="نقدی">نقدی</option>
              <option value="چک">چک</option>
            </select>
            </div>

          <div id="due_date" class="hidden col-span-6 sm:col-span-3">
            <label for="due_date" class="block text-sm font-medium text-gray-700">تاریخ وصول</label>
            <input id="date" type="date" name="due_date" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="debt" class="block text-sm font-medium text-gray-700">پرداختی</label>
            <input type="number" name="debt" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="discount" class="block text-sm font-medium text-gray-700">تخفیف</label>
            <select id="discount" name="discount" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @foreach ($discounts as $discount)
              <option value="{{$discount->percent}}">{{$discount->name . " (" . $discount->percent . " درصد)"}}</option>
              @endforeach
            </select>
            </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="origin_bank_id" class="block text-sm font-medium text-gray-700">بانک مبدا</label>
            <select name="origin_bank_id" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @foreach ($banks as $bank)
              <option value="{{$bank->id}}">{{" بانک " . $bank->name . " شعبه " . $bank->branch}}</option>
              @endforeach
            </select>
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="destination_bank_id" class="block text-sm font-medium text-gray-700">بانک مقصد</label>
              <select name="destination_bank_id" class="h-10 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  @foreach ($banks as $bank)
                <option value="{{$bank->id}}">{{" بانک " . $bank->name . " شعبه " . $bank->branch}}</option>
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
        <button id="submit" type="submit" class="inline-flex justify-center rounded-md border-2 border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">ذخیره</button>
      </div>
    </div>
  </form>
</body>
</html>
<script>
const select_element = document.getElementById("type");
const paid = document.getElementById("paid");
const date = document.getElementById("date");
const discount = document.getElementById("discount");
const sum = document.getElementById("sum");
const rawdiscount = document.getElementById("rawdiscount");
const amount = document.getElementById("amount");


select_element.addEventListener('change', (event) => {
  const value = select_element.value;
  if(value == "چک"){
  due_date.classList.remove("hidden");
  due_date.classList.add("visible");
  }else{
    due_date.classList.add("hidden");
    due_date.classList.remove("visible");
  }
});

discount.addEventListener('change', (event) => {
  const percent = discount.options[discount.selectedIndex].value;
  rawdiscount.value = Number(sum.value * percent) / 100;
  amount.value = Number(sum.value - rawdiscount.value);

});


</script>
@endsection