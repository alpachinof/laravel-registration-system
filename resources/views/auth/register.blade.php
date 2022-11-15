<html>
    <head>
        @vite('resources/css/app.css')
    </head>
    <body dir="rtl">
      @include('alerts')
        <div class="mt-16">
            <div class="mt-16 flex justify-center items-center">
              <form method="POST" action="{{route('register')}}"
                class="w-[400px] py-4 border-2 border-gray-200 flex flex-col justify-center items-center rounded-xl"
              >
              @csrf
                <h1 class="text-4xl text-primary my-8">ثبت نام</h1>
                <input type="number" name="username" placeholder="نام کاربری"
                 class="appearance-none border-2 border-gray-200 rounded-xl w-11/12 py-2 px-4 my-8 mx-4 placeholder:text-gray-500 leading-[40px] focus:outline-none focus:border-cyan-400"
                />
                <input type="password" name="password" placeholder="رمز عبور" class="appearance-none border-2 border-gray-200 rounded-xl w-11/12 py-2 px-4 my-8 mx-4 placeholder:text-gray-500 leading-[40px] focus:outline-none focus:border-cyan-400"
                />
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-red-400">{{$error}}</div>
                    @endforeach
                @endif
                <p>از قبل حساب کاربری دارید؟<span><a class="text-cyan-700" href="/login">ورود</a></span></p>
                <input @click.prevent="login" type="submit" value="ثبت نام" class="bg-cyan-400 text-white text-center rounded-xl w-11/12 hover:cursor-pointer appearance-none border-2 border-gray-200 rounded-xl w-11/12 py-2 px-4 my-8 mx-4 placeholder:text-gray-500 leading-[40px] focus:outline-none focus:border-cyan-400" />
              </form>
            </div>
          </div> 


    </body>
</html>
