<?php
use Illuminate\Support\Facades\Session;
?>
@include('frontend.master')
@yield('header')

      <!-- Page Content-->
      <!-- Hero Slider-->
<section class="featured-posts-slider d-lg-flex" style="margin-bottom: 100px">
    <div class="column">
        <div class="owl-carousel post-preview-img-carousel" data-owl-carousel="{ &quot;rtl&quot;: true, &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;mouseDrag&quot;: false, &quot;touchDrag&quot;: false, &quot;pullDrag&quot;: false }">
            @foreach($slider as $val)
                <a class="post-preview-img" style="background-image: url(/img/slider/{{$val->pic}})"></a>
            @endforeach
        </div>
    </div>
    <div class="column">
        <div class="owl-carousel post-cards-carousel" data-owl-carousel="{ &quot;rtl&quot;: true, &quot;nav&quot;: true, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoHeight&quot;: true }">
            @foreach($slider as $val)

                <div class="card-body" style="min-height: 300px">
                    <h2 class="block-title pb-4 mb-3">{{$val->name}}</h2>
                </div>
            @endforeach
        </div>
    </div>
</section>


      <section class="container pt-5 pb-4 mt-5" style="margin-bottom: 100px">
  <h2 class="h4 block-title text-center pt-4 mt-2">پیشنهاد ما</h2>
  <div class="owl-carousel carousel-flush pt-3 pb-4 owl-rtl owl-loaded owl-drag" data-owl-carousel="{ &quot;rtl&quot;: true, &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;630&quot;:{&quot;items&quot;:2},&quot;991&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:3}} }">
    <!-- Product category-->
    <div class="owl-stage-outer owl-height" style="height: 306px;"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.45s ease 0s; width: 1140px;">


    @foreach($suggestion as $value)
        <div class="owl-item active" style="width: 380px;"><a class="product-category-card mx-auto" href="/prodoct/{{$value->seo}}">
            <div class="product-category-card-thumb">
              <div class="main-img"><img src="img/prodoct/{{$value->pic}}" alt="Shop Category">
              </div>
            </div>
            <div class="product-category-card-body">
              <div class="product-price" style="color: black">
                 @if($value->takhfif>0)
                <del style="color:rgb(169, 169, 169);">{{$value->gheymat}}</del>
                {{$value->takhfif}} تومان

                 @else
                      {{$value->gheymat}} تومان
                  @endif

              </div>
              <h5 class="product-category-card-title">{{$value->name}}</h5>
            </div></a>
        </div>
    @endforeach


      </div>
    </div>
  </div>
</section>

      <!-- Featured Products-->
      <section class="container py-5 mb-4">
        <h2 class="h4 block-title text-center pt-3">آخرین محصولات</h2>
        <div class="row pt-4">
          @foreach($prodoct as $value)
          <!-- Product-->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
            <div class="product-card mx-auto mb-3">
              <a class="product-thumb" href="/prodoct/{{$value->seo}}"><img src="/img/prodoct/{{$value->pic}}" alt="Product Thumbnail"/></a>

              @foreach($menu as $val)
                @if($value->dasteh3==$val->id)
                  @php $cat=$val->name_menu; @endphp
                 @endif
               @endforeach


                @php
                    $classfave='fe-icon-heart';
                    $check=\App\prodoct::find($value->id)->karbar()->where('karbar_id',session::get('login'))->get();
                    if ($check!='[]')
                     $classfave= 'fa fa-heart';
                     else
                     $classfave= 'fe-icon-heart';
                @endphp

              {{--@php $classfave='fe-icon-heart'; @endphp--}}
               {{--@foreach($fav as $val)--}}
                  {{--@if($val->prodoct_id==$value->id)--}}
                   {{--@php $classfave= 'fa fa-heart'; break; @endphp--}}
                  {{--@else--}}
                   {{--@php  $classfave= 'fe-icon-heart'; @endphp--}}
                  {{--@endif--}}
               {{--@endforeach--}}




              <div class="product-card-body"><a class="product-meta" href="#">{{$cat}}</a>
                <h5 class="product-title"><a href="/prodoct/{{$value->seo}}">{{$value->name}}</a></h5>
                  <span class="product-price">
                  @if($value->takhfif!=0)

                          <del>{{number_format($value->gheymat)}}</del>
                          {{number_format($value->takhfif)}}
                    @else
                    {{number_format($value->gheymat)}}
                  @endif
                  تومان
                  </span>
              </div>
              <div class="product-buttons-wrap">
                <div class="product-buttons">
                  @if(! session('login'))
                  <div class="product-button"><a href="/account-login"><i class="fe-icon-heart"></i></a></div>
                    @else
                        <div class="product-button"><a href="#" onclick="add_fav({{$value->id}})" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="علاقه مندی" data-toast-message="با موفقیت انجام گردید"><i  id="class{{$value->id}}" class="{{$classfave}}"></i></a></div>
                  @endif
                  <div class="product-button"><a href="#" onclick="sabad({{$value->id}})" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="محصول" data-toast-message="با موفقیت به سبد خرید اضافه شد!"><i class="fe-icon-shopping-cart"></i></a></div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
        <div class="text-center pt-3"><a class="btn btn-style-5 btn-primary" href="/shop/last">مشاهده تمام محصولات</a></div>
      </section>


@if($special!='[]')
      <!-- Promo #1-->
      <section class="container-fluid pt-5" style="margin-top: 70px;">
        <h2 class="h4 block-title text-center pt-4 mt-2">پیشنهادات ویژه</h2>
        <div style="margin-top: 30px;" class="row justify-content-center">




          <div class="col-xl-5 col-lg-6 mb-30">
            <div class="bg-secondary position-relative pb-5"><span class="badge badge-danger mt-4 ml-4">پیشنهاد محدود</span>
              <div class="text-center pt-4">
               <a class="product-thumb" href="/prodoct/{{$special[0]->seo}}"><img src="/img/prodoct/{{$special[0]->pic}}" alt="Product Thumbnail" style="height: 400px;width: 500px;padding-bottom: 60px"></a>
                <h2 class="mb-2 pb-1">{{$special[0]->name}}</h2>
                <h5 class="font-family-body font-weight-light mb-5">قیمت با تخفیف. عجله کن!</h5>
                <br><a class="btn btn-style-5 btn-gradient mb-3" href="/prodoct/{{$special[0]->seo}}">مشاهده پیشنهاد</a>
              </div>
            </div>
          </div>


          <div class="col-xl-5 col-lg-6 mb-30">
            <div class="bg-secondary position-relative pb-5"><span class="badge badge-danger mt-4 ml-4">پیشنهاد محدود</span>
              <div class="text-center pt-4">
              <a class="product-thumb" href="/prodoct/{{$special[1]->seo}}"><img src="/img/prodoct/{{$special[1]->pic}}" alt="Product Thumbnail" style="height: 400px;width: 500px;padding-bottom: 60px"></a>
                <h2 class="mb-2 pb-1">{{$special[1]->name}}</h2>
                <h5 class="font-family-body font-weight-light mb-5">قیمت با تخفیف. عجله کن!</h5>
                <br><a class="btn btn-style-5 btn-gradient mb-3" href="/prodoct/{{$special[1]->seo}}">مشاهده پیشنهاد</a>
              </div>
            </div>
          </div>




        </div>
      </section>
      <!-- Promo #1-->
@endif

      <!-- Featured Products-->
      <section class="container py-5 mb-4">
  <h2 class="h4 block-title text-center pt-3">محصولات تخفیف دار</h2>
  <div class="row pt-4">
    @foreach($takhfif as $value)
    <!-- Product-->
    <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
      <div class="product-card mx-auto mb-3">
        <a class="product-thumb" href="/prodoct/{{$value->seo}}"><img src="img/prodoct/{{$value->pic}}" alt="Product Thumbnail"/></a>

        @foreach($menu as $val)
          @if($value->dasteh3==$val->id)
            @php $cat=$val->name_menu; @endphp
          @endif
        @endforeach

        <div class="product-card-body"><a class="product-meta" href="#">{{$cat}}</a>
          <h5 class="product-title"><a href="/prodoct/{{$value->seo}}">{{$value->name}}</a></h5><span class="product-price">
                  {{$value->takhfif}}<del>{{$value->gheymat}}</del> تومان</span>
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

              <div class="product-button"><a href="#" onclick="sabad({{$value->id}})" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="محصول" data-toast-message="با موفقیت به سبد خرید اضافه شد!"><i class="fe-icon-shopping-cart"></i></a></div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="text-center pt-3"><a class="btn btn-style-5 btn-primary" href="shop/Discount">مشاهده تمام محصولات</a></div>
</section>


    @if($special!='[]')
      <!-- Promo #1-->
      <section class="container-fluid pt-5" style="margin-top: 100px;">
        <h2 class="h4 block-title text-center pt-4 mt-2">پیشنهادات ویژه</h2>
        <div style="margin-top: 30px;" class="row justify-content-center">



            <div class="col-xl-5 col-lg-6 mb-30">
                <div class="bg-secondary position-relative pb-5"><span class="badge badge-danger mt-4 ml-4">پیشنهاد محدود</span>
                    <div class="text-center pt-4">
                        <a class="product-thumb" href="/prodoct/{{$special[2]->seo}}"><img src="/img/prodoct/{{$special[2]->pic}}" alt="Product Thumbnail" style="height: 400px;width: 500px;padding-bottom: 60px"></a>
                        <h2 class="mb-2 pb-1">{{$special[2]->name}}</h2>
                        <h5 class="font-family-body font-weight-light mb-5">قیمت با تخفیف. عجله کن!</h5>
                        <br><a class="btn btn-style-5 btn-gradient mb-3" href="/prodoct/{{$special[2]->seo}}">مشاهده پیشنهاد</a>
                    </div>
                </div>
            </div>


            <div class="col-xl-5 col-lg-6 mb-30">
                <div class="bg-secondary position-relative pb-5"><span class="badge badge-danger mt-4 ml-4">پیشنهاد محدود</span>
                    <div class="text-center pt-4">
                        <a class="product-thumb" href="/prodoct/{{$special[3]->seo}}"><img src="/img/prodoct/{{$special[3]->pic}}" alt="Product Thumbnail" style="height: 400px;width: 500px;padding-bottom: 60px"></a>
                        <h2 class="mb-2 pb-1">{{$special[3]->name}}</h2>
                        <h5 class="font-family-body font-weight-light mb-5">قیمت با تخفیف. عجله کن!</h5>
                        <br><a class="btn btn-style-5 btn-gradient mb-3" href="/prodoct/{{$special[3]->seo}}">مشاهده پیشنهاد</a>
                    </div>
                </div>
            </div>

        </div>
      </section>
      <!-- Promo #1-->
    @endif


      <!-- Popular Brands-->
      <section class="bg-secondary pt-5 pb-4">
        <div class="container pt-3 pb-2">
          <h2 class="h4 block-title text-center">برند های محبوب</h2>
          <div class="owl-carousel carousel-flush pt-3" data-owl-carousel="{ &quot;rtl&quot;: true, &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 3500, &quot;loop&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
              @foreach($brand as $val)
              <a class="d-block bg-white box-shadow py-4 py-sm-5 px-2 mb-30" href="#"><img class="d-block mx-auto" src="img/brand/{{$val->pic}}" style="width: 165px;" alt="Partner"></a>
              @endforeach

          </div>
        </div>
      </section>
      <!-- Shop Services-->
      <section class="container py-5">
        <div class="row pt-3">
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="mx-auto mb-4" src="img/shop/services/01.png" width="90" alt="Free Worldwide Shipping">
            <h3 class="text-lg mb-2 text-body">حمل و نقل رایگان در سراسر جهان</h3>
            <p class="text-sm text-muted mb-0">حمل و نقل رایگان برای تمام سفارشات بیشتر از 100 دلار</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="mx-auto mb-4" src="img/shop/services/02.png" width="90" alt="Money Back Guarantee">
            <h3 class="text-lg mb-2 text-body">تضمین بازگشت پول</h3>
            <p class="text-sm text-muted mb-0">ما پول را در عرض ۳۰ روز برمی گردانیم.</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="mx-auto mb-4" src="img/shop/services/03.png" width="90" alt="24/7 Customer Support">
            <h3 class="text-lg mb-2 text-body">پشتیبانی مشتری 24/7</h3>
            <p class="text-sm text-muted mb-0">پشتیبانی دوستانه</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="mx-auto mb-4" src="img/shop/services/04.png" width="90" alt="Secure Online Payment">
            <h3 class="text-lg mb-2 text-body">پرداخت آنلاین ایمن</h3>
            <p class="text-sm text-muted mb-0">ما دارای گواهی SSL / Secure هستیم</p>
          </div>
        </div>
      </section>

@yield('footer')