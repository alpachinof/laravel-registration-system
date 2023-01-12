<div dir="rtl">
    <div
      class="sidebar fixed top-0 bottom-0 right-[-300px] lg:right-0 duration-1000 p-2 w-[300px] overflow-y-auto text-center bg-gray-900 shadow h-screen"
    >
      <div class="text-gray-100 text-xl">
        <div>
          <div class="flex items-center p-4 rounded-md">
            <div class="w-14 h-14 rounded-full bg-cyan-400">
              <img class="w-full h-full bg-center rounded-full" src="{{ url('storage/avatars/' . Auth::user()->id )}}">
            </div>
            <div class="flex flex-col full truncate items-start px-4">
            <span class="text-xl">{{ Auth::user()->info?->firstname }} {{ Auth::user()->info?->lastname}}</span>
            <span class="text-sm">
              @if (Auth::user()->role == 1)
                  کاربر مدیر
              @elseif (Auth::user()->role == 2)
                  کاربر اداری
              @else
                  کاربر ثبت نام
              @endif
            </span>
            </div>
          </div>
          
            <a href="/">
            <div
              class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600"
            >
              <span class="text-[18px] ml-4 text-gray-200">داشبورد</span>
            </div>
            </a>

          <div id="title">
            <button type="button" class="w-full p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
               مدیریت کاربران
              <!-- Heroicon name: mini/chevron-down -->
              <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg>
            </button>
            </div>
          <div class="text-right menu hidden">
            <div id="title">
              <button type="button" class="w-full px-6 p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                اطلاعات کارمندان
                <!-- Heroicon name: mini/chevron-down -->
                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          
            <div class="menu hidden flex flex-col items-start rounded-md px-4 duration-300 cursor-pointer">
              <div class="w-full py-1">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="/employee/create" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-0">ثبت اطلاعات کارمندی</a>
                <a href="/employee" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-1">لیست کارمندان</a>
              </div>
            </div>

            <div class="text-right">
              <div id="title">
                <button type="button" class="w-full px-6 p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                  اطلاعات دانشجویان
                  <!-- Heroicon name: mini/chevron-down -->
                  <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            
              <div class="menu hidden flex flex-col items-start rounded-md px-4 duration-300 cursor-pointer">
                <div class="w-full py-1">
                  <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                  <a href="/student/create" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-0">ثبت نام دانشجو</a>
                  <a href="/student" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-1">لیست دانشجویان</a>
                  <a href="#" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-2">گزارش صندوق ثبت نام</a>
                  <a href="#" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-2">گزارش ثبت نام روزانه</a>
                </div>
              </div>
            </div>
          </div>
          

          <div class="text-right">
            <div id="title">
              <button type="button" class="w-full p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
              ثبت نام
                <!-- Heroicon name: mini/chevron-down -->
                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          
            <div class="menu hidden flex flex-col items-start rounded-md px-4 duration-300 cursor-pointer">
              <div class="w-full py-1">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="/course" class="block py-2 w-full rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-0">دروس</a>
                <a href="/lecturer" class="block py-2 w-full rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-1">اساتید</a>
              </div>
            </div>
          </div>

          <div id="title">
            <button type="button" class="w-full p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
              گزارشات
              <!-- Heroicon name: mini/chevron-down -->
              <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg>
            </button>
            </div>
          <div class="text-right menu hidden">
            <div id="title">
              <button type="button" class="w-full px-6 p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                 گزارشات مالی
                <!-- Heroicon name: mini/chevron-down -->
                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          
            <div class="menu hidden flex flex-col items-start rounded-md px-4 duration-300 cursor-pointer">
              <div class="w-full py-1">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="/employee/create" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-0">گزارشات مالی اساتید</a>
                <a href="/report/cheque" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-1">گزارشات چک</a>
                <a href="/report/debt" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-1">دانشجویان بدهکار</a>
              </div>
            </div>
          </div>


          <div id="title">
            <button type="button" class="w-full p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
              مدیریت اطلاعات پایه
              <!-- Heroicon name: mini/chevron-down -->
              <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg>
            </button>
            </div>
          <div class="text-right menu hidden">
            <div id="title">
              <button type="button" class="w-full px-6 p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                 مدیریت ترم های تحصیلی
                <!-- Heroicon name: mini/chevron-down -->
                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          
            <div class="menu hidden flex flex-col items-start rounded-md px-4 duration-300 cursor-pointer">
              <div class="w-full py-1">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="/semester/create" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-0">ایجاد ترم</a>
                <a href="/semester" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-1">لیست ترم ها</a>
              </div>
            </div>

            <div class="text-right">
              <div id="title">
                <button type="button" class="w-full px-6 p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600">
                  تعریف جزيیات سطح
                  <!-- Heroicon name: mini/chevron-down -->
                  <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            
              <div class="menu hidden flex flex-col items-start rounded-md px-4 duration-300 cursor-pointer">
                <div class="w-full py-1">
                  <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                  <a href="/discount" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-0">لیست تخفیف ها</a>
                  <a href="/bank" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-1">لیست بانک ها</a>
                  <a href="/location" class="block py-2 w-full rounded-md px-6 duration-300 cursor-pointer hover:bg-blue-600" id="menu-item-2">لیست مکان های برگزاری</a>
                </div>
              </div>
            </div>
          </div>


          <a href="/logout">
          <div
            class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600"
          >
            <div class="flex justify-between w-full items-center">
              <span class="text-[18px] ml-4 text-red-600">خروج از سیستم</span>
              <span class="text-sm rotate-180" id="arrow">
                <i class="bi bi-chevron-down"></i>
              </span>
            </div>
          </div>
        </a>

        </div>
      </div>
    </div>
    <div class="lg:mr-96">
    @yield('content')
    </div>
  </div>

  <style>
    a,button{
      font-size: 16px;
    }

  </style>

  <script>
    const title = document.querySelectorAll('[id=title]');
    const menu = document.querySelectorAll(".menu");


    title.forEach((title, index) => {
      title.addEventListener("click", () => {
        menu[index].classList.toggle("hidden");
      })
    })

  </script>