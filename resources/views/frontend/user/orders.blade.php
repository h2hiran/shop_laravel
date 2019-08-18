
@include('frontend.master')
@yield('header')
    <!-- Page Title-->
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url(img/page-title/shop-pattern.jpg);">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">صفحه اصلی</a>
                    </li>
                    <li class="breadcrumb-item"><a href="account-orders.html">حساب کاربری</a>
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


                        <a class="list-group-item" href="/account-profile"><i class="fe-icon-user text-muted"></i>تنظیمات پروفایل</a>

                        <a class="list-group-item active" href="">
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
            <div class="table-responsive col-lg-8">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>سفارش #</th>
                        <th>تاریخ خرید</th>
                        <th>وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($order != '[]')
                        @foreach($order as $val)
                    <tr>
                        <td><a class="navi-link" href="#order-details" data-toggle="modal">{{$val->peygiri}}</a></td>
                        <td>سه&zwnj;شنبه ۱۷ مرداد ۱۳۹۶</td>
                        @if($val->status==0)
                                  <td><span class="badge badge-danger m-0">لغو شده است</span></td>
                        @elseif($val->status==1)
                            <td><span class="badge badge-warning m-0">در انتظار بررسی</span></td>
                            @elseif($val->status==2)
                                  <td><span class="badge badge-primary m-0">تایید شده</span></td>
                               @elseif($val->status==3)
                                      <td><span class="badge badge-success m-0">فرستاده شده</span></td>
                            @endif
                    </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
                </form>
            </div>
        </div>
    </div>
@yield('footer')