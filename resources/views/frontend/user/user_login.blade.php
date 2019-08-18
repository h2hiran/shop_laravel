<?php
use Illuminate\Support\Facades\Session;
?>
@include('frontend.master')
@yield('header')
    <!-- Page Title-->
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url(img/page-title/shop-pattern.jpg);">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">حساب کاربری</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">ورود / ثبت نام</h1>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container mb-3">
        <div class="row">
            <div class="col-md-6 pb-5">
                <form class="needs-validation wizard" novalidate method="post" action="/user_store">
                    {{csrf_field()}}
                    <div class="wizard-body pt-2">
                        @if(session('error'))
                        <div class="aler alert-danger" style="text-align: center;min-height: 50px;padding-top: 15px">{{session::get('error')}}</div>
                        @endif
                        <div class="input-group form-group" style="margin-top: 100px">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fe-icon-mail"></i></span></div>
                            <input class="form-control text-left placeholder-right" type="email" placeholder="ایمیل" required name="email">
                            <div class="invalid-feedback">لطفا آدرس ایمیل خود را وارد نمایید!</div>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fe-icon-lock"></i></span></div>
                            <input class="form-control" type="password" placeholder="رمز عبور" required name="pass">
                            <div class="invalid-feedback">لطفا رمز عبور معتبر را وارد کنید</div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" checked id="remember-me">
                                <label class="custom-control-label" for="remember-me">مرا به خاطر بسپار</label>
                            </div><a class="navi-link" href="account-password-recovery.html">رمز عبور را فراموش کرده اید ؟</a>
                        </div>
                    </div>
                    <div class="wizard-footer text-right">
                        <button class="btn btn-primary" type="submit" name="btnlogin">ورود</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 pb-5">
                <h3 class="h4 pb-1">حساب کاربری ندارید ؟ ثبت نام</h3>
                <p>ثبت نام کمتر از یک دقیقه طول می کشد اما به شما این امکان را می دهد که کنترل کامل بر سفارشات خود داشته باشید.</p>
                <form class="needs-validation" novalidate method="post" action="/user_store">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-fn">نام</label>
                                <input class="form-control" type="text" required id="reg-fn" name="name">
                                <div class="invalid-feedback">لطفا نام خود را وارد کنید!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-ln">نام خانوادگی</label>
                                <input class="form-control" type="text" required id="reg-ln" name="family">
                                <div class="invalid-feedback">لطفا نام خانوادگی خود را وارد کنید!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-email">آدرس ایمیل</label>
                                <input class="form-control" type="email" required id="reg-email" name="email">
                                <div class="invalid-feedback">لطفا یک آدرس ایمیل معتبر وارد کنید!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-phone">شماره تلفن</label>
                                <input class="form-control" type="text" required id="reg-phone" name="mobile">
                                <div class="invalid-feedback">لطفا شماره تلفن خود را وارد کنید!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-password">رمز عبور</label>
                                <input class="form-control" type="password" required id="reg-password">
                                <div class="invalid-feedback">لطفا رمز عبور را وارد کنید!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-password-confirm">تایید رمز عبور</label>
                                <input class="form-control" type="password" required id="reg-password-confirm" name="pass">
                                <div class="invalid-feedback">رمزهای ورود مطابقت ندارند!</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <button class="btn btn-primary" type="submit" name="btnregister">ثبت نام</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @yield('footer')