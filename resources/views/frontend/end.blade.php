
@include('frontend.master')
@yield('header')
    <!-- Page Title-->
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url(img/page-title/shop-pattern.jpg);">
        <div class="container text-right align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">صفحه اصلی</a>
                    </li>
                    <li class="breadcrumb-item"><a href="shop-boxed-ls.html">فروشگاه</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">پرداخت</h1>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
        <!-- Checkout: Complete-->
        <div class="wizard pb-3">
            <div class="wizard-body pt-2 text-center">
                <h3 class="h4 pb-3">از سفارش شما متشکریم!</h3>
                <p class="mb-2">سفارش شما قرار داده شده است و در اسرع وقت پردازش می شود.</p>
                <p class="mb-2">دقت کنید که شماره سفارش خود را یادداشت کنید<strong>{{ $peygiri }}</strong></p>
                <a class="btn btn-secondary mt-3 ml-3" href="shop-boxed-ls.html">بازگشت </a><a class="btn btn-primary mt-3" href="order-tracking.html"><i class="fe-icon-map-pin"></i>&nbsp;پیگیری سفارش</a>
            </div>
        </div>
    </div>
@yield('footer')