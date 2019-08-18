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
                    <li class="breadcrumb-item"><a href="index.html">صفحه اصلی</a>
                    </li>
                    <li class="breadcrumb-item"><a href="shop-boxed-ls.html">فروشگاه</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">سبد خرید</h1>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2">
        <!-- Alert-->
    <form method="post" action="/update_sabad">
        {{csrf_field()}}
        @foreach(Cart::content() as $value)
        <!-- Cart Item-->
        <div id="sabad{{$value->id}}" class="cart-item d-md-flex justify-content-between"><span onclick="cart({{$value->id}})" class="remove-item"><i class="fe-icon-x"></i></span>
            <div class="px-3 my-3"><a class="cart-item-product" href="shop-single.html">
                    <div class="cart-item-product-thumb"><img src="/img/prodoct/{{$value->options->img}}" alt="Product"></div>
                    <div class="cart-item-product-info">
                        <h4 class="cart-item-product-title">{{$value->name}}</h4>
                    </div></a></div>
            <div class="px-3 my-3 text-center">
                <div class="cart-item-label">تعداد</div>
                <div class="count-input">
                   <input type="number" name="{{$value->rowId}}" class="form-control" value="{{$value->qty}}" required>
                </div>
            </div>
            <div class="px-3 my-3 text-center">
                <div class="cart-item-label">قیمت</div><span class="text-xl font-weight-medium">{{number_format($value->price)}}</span>
            </div>
        </div>
        @endforeach



        <!-- Coupon + Subtotal-->
        <div class="d-sm-flex justify-content-between align-items-center text-center text-sm-right">
            <div class="form-inline py-2"></div>
            <div class="py-2"><span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase ml-2">مجموع:</span><span class="d-inline-block align-middle text-xl font-weight-medium">{{Cart::subtotal()}}</span></div>
        </div>
        <!-- Buttons-->
        <hr class="my-2">
        <div class="row pt-3 pb-5 mb-2">
            <div class="col-sm-6 mb-3"><input type="submit" value="به روز رسانی سبد خرید" class="btn btn-secondary btn-block"></div>
            <div class="col-sm-6 mb-3"><a class="btn btn-primary btn-block" href="checkout-address.html"><i class="fe-icon-credit-card"></i>&nbsp; پرداخت</a></div>
        </div>
    </form>
    </div>
@yield('footer')