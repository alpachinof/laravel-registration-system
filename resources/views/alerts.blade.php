@if (session()->has('success'))
<div class="text-center text-green-500">
     خوش امدید
</div>
@endif

@if (session()->has('failed'))
<div class="text-center text-red-400">
    نام کاربری یا رمز عبور اشتباه است
</div>
@endif

@if (session()->has('registered'))
<div class="text-center text-green-500">
    ثبت نام با موفقیت انجام شد. لطفا وارد شوید
</div>
@endif

@if (session()->has('userExists'))
<div class="text-center text-green-500">
    نام کاربری در سیستم موجود است
</div>
@endif


