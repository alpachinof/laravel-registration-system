@if (session()->has('success'))
<div class="alert alert-success">
     خوش امدید
</div>
@endif

@if (session()->has('failed'))
<div class="alert alert-success">
    نام کاربری یا رمز عبور اشتباه است
</div>
@endif

@if (session()->has('registered'))
<div class="alert alert-success">
    ثبت نام با موفقیت انجام شد. لطفا وارد شوید
</div>
@endif

