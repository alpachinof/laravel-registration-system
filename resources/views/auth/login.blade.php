<html>
    <head>
        @vite('resources/css/app.css')
    </head>
    <body dir="rtl">
        <div class="mt-16">
            <div class="mt-16 flex justify-center items-center">
              <form
                class="w-[400px] py-4 border-2 border-gray-200 flex flex-col justify-center items-center rounded-xl"
              >
                <h1 class="text-4xl text-primary my-8">ورود به حساب کاربری</h1>
                <input type="number" placeholder="نام کاربری"
                 class="appearance-none border-2 border-gray-200 rounded-xl w-11/12 py-2 px-4 my-8 mx-4 placeholder:text-gray-500 leading-[40px] focus:outline-none focus:border-cyan-400"
                />
                <input type="password" placeholder="رمز عبور" class="appearance-none border-2 border-gray-200 rounded-xl w-11/12 py-2 px-4 my-8 mx-4 placeholder:text-gray-500 leading-[40px] focus:outline-none focus:border-cyan-400"
                />
                <p>حساب کاربری ندارید؟ <span><a class="text-cyan-700" href="/register">ثبت نام</a></span></p>
                <input @click.prevent="login" type="submit" value="ورود" class="bg-cyan-400 text-white text-center rounded-xl w-11/12 hover:cursor-pointer appearance-none border-2 border-gray-200 rounded-xl w-11/12 py-2 px-4 my-8 mx-4 placeholder:text-gray-500 leading-[40px] focus:outline-none focus:border-cyan-400" />

              </form>
            </div>
          </div> 


    </body>
</html>
