<?php
use Illuminate\Support\Facades\Session;
?>
@include('errors.master')
@yield('header')
    <!-- Page Content-->
    <div class="container py-5 mb-4 text-center">
        <h1 class="display-404">۴۰۴</h1>
        <h2 class="h3">صفحه یافت نشد</h2>
        <p class="text-muted">به نظر می رسد ما نمی توانیم صفحه مورد نظر شما را پیدا کنیم. <a href='/' class='font-weight-medium'>بازگشت به صفحه اصلی</a><br> یا سعی کنید از جستجو در گوشه بالا سمت چپ صفحه استفاده کنید.</p>
    </div>
@yield('footer')