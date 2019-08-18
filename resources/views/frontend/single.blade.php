<?php
use Illuminate\Support\Facades\Session;
?>
@include('frontend.master')
@yield('header')
<!-- Page Title-->
<div class="page-title d-flex" aria-label="Page title" style="background-image: url(/img/page-title/shop-pattern.jpg);">
    <div class="container text-right align-self-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">صفحه اصلی</a>
                </li>
                <li class="breadcrumb-item"><a href="">فروشگاه</a>
                </li>
            </ol>
        </nav>
        <h1 class="page-title-heading">صفحه محصول</h1>
    </div>
</div>
<!-- Page Content-->
<div class="container mb-2">
    <div class="row">
        <!-- Product Gallery-->
        <div class="col-md-6 pb-5">
            <div class="product-gallery" style="min-height: 513px">
                <div class="product-carousel owl-carousel" data-owl-carousel="{ &quot;rtl&quot;: true}"><a class="gallery-item" href="/img/prodoct/{{$data[0]->pic}}" data-fancybox="gallery1" data-hash="one"><img src="/img/prodoct/{{$data[0]->pic}}" alt="Product"></a></div>
            </div>
        </div>
        <!-- Product Info-->
        <div class="col-md-6 pb-5">
            <div class="product-meta"><i class="fe-icon-bookmark"></i><a href="/category/{{$dasteh1->seo_menu}}">{{$dasteh1->name_menu}},</a><a href="/category/{{$dasteh2->seo_menu}}">{{$dasteh2->name_menu}},</a><a href="/category/{{$dasteh3->seo_menu}}">{{$dasteh3->name_menu}}</a></div>
            <h2 class="h3 font-weight-bold">{{$data[0]->name}}</h2>
            <h3 class="h4 font-weight-light">
                @if($data[0]->takhfif>0)
                <del class="text-muted">{{number_format($data[0]->gheymat)}}</del>
                {{number_format($data[0]->takhfif)}}  تومان
                    @else
                    {{number_format($data[0]->gheymat)}}  تومان
                 @endif
            </h3>
                <?php $words=explode(" ",$data[0]->dis);  $dis = implode(" ",array_splice($words,0,100)); ?>
            <p class="text-muted">{{$dis}}  <a href='#details' class='scroll-to'>اطلاعات بیشتر</a></p>
            <div class="row mt-4">

            </div>
            <div class="row align-items-end pb-4">
                <div class="col-sm-4">
                    <div class="form-group mb-0">
                        <label for="quantity">تعداد</label>
                        <input type="number" class="form-control" id="quantity" value="1" min="1" max="10">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="pt-4 hidden-sm-up"></div>
                    <button class="btn btn-primary btn-block m-0" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="fe-icon-check-circle" data-toast-title="محصول" data-toast-message="با موفقیت به سبد خرید اضافه شد!" onclick="add_sabad({{$data[0]->id}})"><i class="fe-icon-shopping-cart"></i> افزودن به سبد خرید</button>
                </div>
            </div>


                @php
                    $classfave='fe-icon-heart';
                    $check=\App\prodoct::find($data[0]->id)->karbar()->where('karbar_id',session::get('login'))->get();
                    if ($check!='[]')
                     $classfave= 'fa fa-heart';
                     else
                     $classfave= 'fe-icon-heart';
                @endphp



            <hr class="mb-2">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="mt-2 mb-2">
                    @if(! session('login'))
                         <div class="btn btn-danger btn-sm my-2 mr-1"><a style="color:white;text-decoration: none" href="/account-login"><i class="fe-icon-heart"></i> علاقمندی </a></div>
                    @else
                        <div class="btn btn-danger btn-sm my-2 mr-1"><a style="color:white;text-decoration: none" href="#" onclick="add_fav({{$data[0]->id}})" data-toast data-toast-type="info" data-toast-position="topRight" data-toast-icon="fe-icon-info" data-toast-title="محصول" data-toast-message="به لیست علاقمندی های شما اضافه شد!"><i  id="class{{$data[0]->id}}" class="{{$classfave}}"></i> علاقمندی </a></div>
                    @endif
                </div>
                <div class="mt-2 mb-2"><span class="text-muted d-inline-block align-middle mb-2">اشتراک:&nbsp;&nbsp;</span>
                    <div class="d-inline-block"><a class="social-btn sb-style-3 sb-facebook my-1" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-btn sb-style-3 sb-twitter my-1" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-btn sb-style-3 sb-instagram my-1" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-btn sb-style-3 sb-google-plus my-1 mr-0" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Details-->
<div class="bg-secondary pt-5 pb-4" id="details">
    <div class="container py-2">
        <div class="row">
            <div class="col-md-12">
                <h3 class="h6">جزئیات</h3>
                <p class="mb-4 pb-2">{{htmlspecialchars_decode($data[0]->dis)}}</p>
                <h3 class="h6">امکانات</h3>
                <ul class="list-icon mb-4 pb-2">
                    @foreach($vizh as $val)
                    <li><i class="fe-icon-check text-success"></i>{{$val}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Reviews-->
{{--<div class="container pt-5">--}}
    {{--<div class="row pt-2">--}}
        {{--<div class="col-md-4 pb-5 mb-3">--}}
            {{--<div class="card border-default">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="text-center">--}}
                        {{--<div class="d-inline align-baseline display-4 mr-1">۴.۲</div>--}}
                        {{--<div class="d-inline align-baseline text-sm text-warning ml-2">--}}
                            {{--<div class="rating-stars"><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star"></i>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="pt-3"><span class="progress-label">۵ ستاره <span class='text-muted'>- ۳۸</span></span>--}}
                        {{--<div class="progress progress-style-3 mb-3">--}}
                            {{--<div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div><span class="progress-label">۴ ستاره <span class='text-muted'>- ۱۰</span></span>--}}
                        {{--<div class="progress progress-style-3 mb-3">--}}
                            {{--<div class="progress-bar bg-warning" role="progressbar" style="width: 20%;;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div><span class="progress-label">۳ ستاره <span class='text-muted'>- ۳</span></span>--}}
                        {{--<div class="progress progress-style-3 mb-3">--}}
                            {{--<div class="progress-bar bg-warning" role="progressbar" style="width: 7%;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div><span class="progress-label">۲ ستاره <span class='text-muted'>- ۱</span></span>--}}
                        {{--<div class="progress progress-style-3 mb-3">--}}
                            {{--<div class="progress-bar bg-warning" role="progressbar" style="width: 3%;" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div><span class="progress-label">۱ ستاره <span class='text-muted'>- ۰</span></span>--}}
                        {{--<div class="progress progress-style-3 mb-3">--}}
                            {{--<div class="progress-bar bg-warning" role="progressbar" style="width: 0;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="pt-3"><a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#leaveReview">ارسال دیدگاه</a></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-8 pb-5 mb-3">--}}
            {{--<div class="d-flex flex-wrap justify-content-between pb-2">--}}
                {{--<h3 class="h4">آخرین نظرات</h3><a class="btn btn-primary btn-sm" href="#">مشاهده تمام نظرات</a>--}}
            {{--</div>--}}
            {{--<!-- Review-->--}}
            {{--<div class="blockquote comment mb-4">--}}
                {{--<div class="d-sm-flex mb-2">--}}
                    {{--<h6 class="text-lg mb-0">واقعا عالیه...</h6><span class="d-none d-sm-inline mx-3 text-muted opacity-50">|</span>--}}
                    {{--<div class="rating-stars"><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star"></i>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>--}}
                {{--<footer class="testimonial-footer">--}}
                    {{--<div class="testimonial-avatar"><img src="/img/testimonials/01.jpg" alt="Review Author Avatar"/>--}}
                    {{--</div>--}}
                    {{--<div class="d-table-cell align-middle pr-2">--}}
                        {{--<div class="blockquote-footer">سارا بیات--}}
                            {{--<cite>۱۲ خرداد, ۱۳۹۸ در ۳:۱۰بعداظهر </cite>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</footer>--}}
            {{--</div>--}}
            {{--<!-- Review-->--}}
            {{--<div class="blockquote comment">--}}
                {{--<div class="d-sm-flex mb-2">--}}
                    {{--<h6 class="text-lg mb-0"> کیفیت عالی و قیمت مناسب</h6><span class="d-none d-sm-inline mx-3 text-muted opacity-50">|</span>--}}
                    {{--<div class="rating-stars"><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>--}}
                {{--<footer class="testimonial-footer">--}}
                    {{--<div class="testimonial-avatar"><img src="/img/testimonials/02.jpg" alt="Review Author Avatar"/>--}}
                    {{--</div>--}}
                    {{--<div class="d-table-cell align-middle pr-2">--}}
                        {{--<div class="blockquote-footer">سام نعمتی--}}
                            {{--<cite>۱۲ خرداد, ۱۳۹۸ در ۳:۴۰بعداظهر </cite>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</footer>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<br>
<br>
<br>
<div class="container pt-3 pb-5">
    <!-- Related Products Carousel-->
    <h3 class="h4 text-center pb-4">شاید دوست داشته باشید</h3>
    <div class="owl-carousel carousel-flush" data-owl-carousel="{ &quot;rtl&quot;: true,&quot;nav&quot;: false, &quot;dots&quot;: true,&quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">


        @foreach($love as $value)
        <!-- Product-->
        <div class="product-card mx-auto mb-5" style="height:475px;">
            <div class="product-head d-flex justify-content-between align-items-center" >
            </div><a class="product-thumb" href="/prodoct/{{$value->seo}}"><img src="/img/prodoct/{{$value->pic}}" alt="Product Thumbnail"/></a>
            <div class="product-card-body"><a class="product-meta" href="shop-categories.html">اسپیکر(بلندگو)</a>
                <h5 class="product-title"><a href="shop-single.html">{{$value->name}}</a></h5><span class="product-price">
                    @if($value->takhfif>0)
                        {{$value->takhfif}}<del>{{$value->gheymat}}</del> تومان</span>
                        @else
                         {{$value->gheymat}}
                    @endif

            </div>
            <div class="product-buttons-wrap">
                <div class="product-buttons">


                    @php
                        $classfave='fe-icon-heart';
                        $check=\App\prodoct::find($value->id)->karbar()->where('karbar_id',session::get('login'))->get();
                        if ($check!='[]')
                         $classfave= 'fa fa-heart';
                         else
                         $classfave= 'fe-icon-heart';
                    @endphp


                    @if(! session('login'))
                        <div class="product-button"><a href="/account-login"><i class="fe-icon-heart"></i></a></div>
                    @else
                        <div class="product-button"><a href="#" onclick="add_fav({{$value->id}})" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="علاقه مندی" data-toast-message="با موفقیت انجام گردید"><i  id="class{{$value->id}}" class="{{$classfave}}"></i></a></div>
                    @endif

                    <div class="product-button"><a href="#" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="محصول" data-toast-message="با موفقیت به سبد خرید اضافه شد!" onclick="sabad({{$value->id}})"><i class="fe-icon-shopping-cart"></i></a></div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>


@yield('footer')