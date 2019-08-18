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
                    <li class="breadcrumb-item"><a href="#">فروشگاه</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title-heading">فروشگاه</h1>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
        <div class="row">
            <div class="col-lg-3">
                <!-- Shop Sidebar-->
                <!-- Off-Canvas Toggle--><a class="offcanvas-toggle" href="#shop-sidebar" data-toggle="offcanvas"><i class="fe-icon-sidebar"></i></a>
                <!-- Off-Canvas Container-->
                <aside class="offcanvas-container" id="shop-sidebar">
                    <div class="offcanvas-scrollable-area px-4 pt-5 px-lg-0 pt-lg-0"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>
                        <!-- Categories-->
                        <div class="widget widget-categories">
                            <h4 class="widget-title">دسته بندی</h4>
                            <ul>
                          @php  $show='show'; @endphp
                            @foreach($menu as $val)
                                @if($val->level_menu==0)
                                <li>
                                    <a href="#{{$val->seo_menu}}" data-toggle="collapse">{{$val->name_menu}}</a>
                                    <div class="collapse {{$show}}" id="{{$val->seo_menu}}">
                                        <ul>
                                            @foreach($menu as $value)
                                                @if($value->parent_menu==$val->id)
                                                     <li><a href="/category/{{$value->seo_menu}}">{{$value->name_menu}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                    @php $show='null'; @endphp
                                 @endif
                            @endforeach

                            </ul>
                        </div>

                        <!-- Popular products-->
                        <div class="widget widget-featured-products">
                            <h4 class="widget-title">محصولات محبوب</h4>

                        @foreach($sabad as $val)
                            <?Php $fav=\Illuminate\Support\Facades\DB::table('prodocts')->where('id',$val->prodoct_id)->get(); ?>
                            @if($fav)
                            <a class="featured-product" href="/prodoct/{{$fav[0]->seo}}">
                                <div class="featured-product-thumb"><img src="/img/prodoct/{{$fav[0]->pic}}" alt="Product Image"/>
                                </div>
                                <div class="featured-product-info">
                                    <h5 class="featured-product-title">{{$fav[0]->name}}</h5>
                                  <span class="featured-product-price">
                                      @if($fav[0]->takhfif>0)

                                        {{$fav[0]->takhfif}}&nbsp;<del>{{$fav[0]->gheymat}}</del> تومان
                                          @else
                                          {{$fav[0]->gheymat}}&nbsp; تومان
                                        @endif
                                  </span>
                                </div>
                            </a>
                                @endif
                        @endforeach

                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-lg-9">
                <!-- Shop Grid-->
                <div class="row">
                @foreach($pro as $val)

                    @foreach($menu as $value)
                        @if($val->dasteh3==$value->id)
                            @php $cat=$value->name_menu; @endphp
                        @endif
                    @endforeach



                    @php
                        $classfave='fe-icon-heart';
                        $check=\App\prodoct::find($val->id)->karbar()->where('karbar_id',session::get('login'))->get();
                        if ($check!='[]')
                         $classfave= 'fa fa-heart';
                         else
                         $classfave= 'fe-icon-heart';
                    @endphp



                    <!-- Product-->
                    <div class="col-md-4 col-sm-6 mb-30">
                        <div class="product-card mx-auto mb-3">
                            <div class="product-head d-flex justify-content-between align-items-center">
                            </div><a class="product-thumb" href="/prodoct/{{$val->seo}}"><img src="/img/prodoct/{{$val->pic}}" alt="Product Thumbnail"/></a>
                            <div class="product-card-body"><a class="product-meta" href="">{{$cat}}</a>
                                <h5 class="product-title"><a href="/prodoct/{{$val->seo}}">{{$val->name}}</a></h5><span class="product-price">
                                    @if($val->takhfif>0)
                                       {{$val->takhfif}}<del>{{$val->gheymat}}</del> تومان
                                    @else
                                    {{$val->gheymat}}   تومان
                                    @endif
                                </span>
                            </div>
                            <div class="product-buttons-wrap">
                                <div class="product-buttons">
                                    @if(! session('login'))
                                        <div class="product-button"><a href="/account-login"><i class="fe-icon-heart"></i></a></div>
                                    @else
                                        <div class="product-button"><a href="#" onclick="add_fav({{$val->id}})" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="علاقه مندی" data-toast-message="با موفقیت انجام گردید"><i  id="class{{$val->id}}" class="{{$classfave}}"></i></a></div>
                                    @endif
                                    <div class="product-button"><a href="#" onclick="sabad({{$val->id}})" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="محصول" data-toast-message="با موفقیت به سبد خرید اضافه شد!"><i class="fe-icon-shopping-cart"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                </div>
                <br>
                <br>
                {{$pro->links()}}

            </div>
        </div>
    </div>
@yield('footer')