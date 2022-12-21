<html>
<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body dir="rtl">
@if (session()->has('success'))
<div id="swal" data-status="success" data-title="خوش آمدید" class="hidden">
</div>
@endif

@if (session()->has('registered'))
<div id="swal" data-status="success" data-title="ثبت نام با موفقیت انجام شد. لطفا وارد شوید" class="hidden">
</div>
@endif

@if (session()->has('WrongCredential'))
<div id="swal" data-status="error" data-title="نام کاربری یا رمز عبور اشتباه است" class="hidden">
</div>
@endif

@if (session()->has('created'))
<div id="swal" data-status="success" data-title="اطلاعات با موفقیت ثبت شد" class="hidden">
</div>
@endif

@if (session()->has('userExists'))
<div id="swal" data-status="error" data-title="نام کاربری در سیستم موجود است" class="hidden">
    نام کاربری در سیستم موجود است
</div>
@endif

@if (session()->has('updated'))
<div id="swal" data-status="success" data-title="اطلاعات با موفقیت بروزرسانی شد" class="hidden">
</div>
@endif

@if (session()->has('deleted'))
<div id="swal" data-status="success" data-title="کاربر از سیستم حذف شد" class="hidden">
</div>
@endif

<body>
<html>
<script>
const swal = document.querySelectorAll('[id=swal]');

swal.forEach((swal, index) => {
        const status = swal.dataset.status;
        const title = swal.dataset.title;
        Swal.fire({
            position: 'top',
            icon: `${status}`,
            title: `${title}`,
            showConfirmButton: false,
            timer: 2000,
            toast:true,
            timerProgressBar:true,
            })
        });

</script>


