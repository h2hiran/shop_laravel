
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
            <h1 class="page-title-heading">تنظیمات حساب کاربری</h1>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar-->
                <div class="author-card pb-3">
                    <div class="author-card-cover" style="background-image: url(/img/widgets/author/cover.jpg);"></div>
                    <div class="author-card-profile" style="margin-top: 8px">
                        <div class="author-card-details">
                            <h1 class="author-card-name text-lg"> خوش آمدید {{$user->name.' '.$user->family}}</h1>
                        </div>
                    </div>
                </div>
                <div class="wizard">
                    <nav class="list-group list-group-flush">


                        <a class="list-group-item active" href="/account-profile"><i class="fe-icon-user text-muted"></i>تنظیمات پروفایل</a>

                        <a class="list-group-item" href="/account-orders">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-shopping-bag ml-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">لیست سفارشات</div>
                                </div>
                            </div>
                        </a>


                        <a class="list-group-item" href="/account-wishlist">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-heart ml-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">علاقه مندی های من
                                    </div>
                                </div>
                            </div>
                        </a>



                    </nav>
                </div>
            </div>
            <!-- Profile Settings-->
            <div class="col-lg-8 pb-5">
                <form class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-fn">نام</label>
                            <input class="form-control" type="text" id="account-fn" value="{{$user->name}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-ln">نام خانوادگی</label>
                            <input class="form-control" type="text" id="account-ln" value="{{$user->family}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-email">آدرس ایمیل</label>
                            <input class="form-control" type="email" id="account-email" value="{{$user->email}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-phone">شماره تلفن</label>
                            <input class="form-control" type="text" id="account-phone" value="{{$user->mobile}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-pass">رمز عبور جدید</label>
                            <input class="form-control" type="password" id="account-pass">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-confirm-pass">تایید رمز عبور</label>
                            <input class="form-control" type="password" id="account-confirm-pass">
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                            <button class="btn btn-primary" type="button" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="موفق!" data-toast-message="اطلاعات شما با موفقیت به روز شد.">بروزرسانی پروفایل</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@yield('footer')