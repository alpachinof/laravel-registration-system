<html>
    <head>
        @vite('resources/css/app.css')
        <title>ورود به سیستم اتوماسیون</title>
    </head>
    <body dir="rtl">
      @include('alerts')
        <div class="mt-16">
            <div class="mt-16 flex justify-center items-center">
              <form method="POST" action="{{route('login')}}"
                class="w-[400px] py-4 border-2 border-gray-200 flex flex-col justify-center items-center rounded-xl"
              >
              @csrf
                <h1 class="text-4xl text-primary my-8">ورود به سیستم</h1>
                <input type="tel" placeholder="نام کاربری" name="username" maxlength="10" onkeypress="return onlyNumberKey(event)"
                 class="appearance-none border-2 border-gray-200 rounded-xl w-11/12 py-2 px-4 my-8 mx-4 placeholder:text-gray-500 leading-[40px] focus:outline-none focus:border-cyan-400"
                />
                <div class="w-full">
                <input type="password" placeholder="رمز عبور" name="password" id="password" onkeypress="return onlyNumberKey(event)"
                 class="appearance-none border-2 border-gray-200 rounded-xl w-11/12 py-2 px-4 my-8 mx-4 placeholder:text-gray-500 leading-[40px] focus:outline-none focus:border-cyan-400"
                />
                <span onclick="showHidePass()" class="cursor-pointer relative z-50 float-left -mt-[67px] ml-8"><i id="eye" class="fa-solid fa-eye"></i><i id="eyeslash" class="hidden fa-solid fa-eye-slash"></i></span>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-red-400">{{$error}}</div>
                    @endforeach
                @endif
                <p>حساب کاربری ندارید؟ <span><a class="text-cyan-700" href="/register">ثبت نام</a></span></p>
                <input @click.prevent="login" type="submit" value="ورود" class="bg-cyan-400 text-white text-center rounded-xl w-11/12 hover:cursor-pointer appearance-none border-2 border-gray-200 rounded-xl w-11/12 py-2 px-4 my-8 mx-4 placeholder:text-gray-500 leading-[40px] focus:outline-none focus:border-cyan-400" />

              </form>
            </div>
          </div> 


    </body>
</html>


<script>
  
  function onlyNumberKey(evt) {
        
      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
          return false;
      return true;
  }

  function showHidePass() {
  var x = document.getElementById("password");
  var eye = document.getElementById("eye");
  var eyeslash = document.getElementById("eyeslash");


  if (x.type === "password") {
    x.type = "text";
    eye.classList.add("hidden");
    eyeslash.classList.remove("hidden");
    eyeslash.classList.add("visible");
  } else {
    x.type = "password";
    eye.classList.remove("hidden");
    eye.classList.add("visible");
    eyeslash.classList.add("hidden");
  }
}
</script>
