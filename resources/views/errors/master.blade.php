<?php
use Illuminate\Support\Facades\Session;
?>
@section('header')
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>CreateX | Multipurpose Bootstrap Theme
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="CreateX - Multipurpose Bootstrap Theme">
    <meta name="keywords" content="multipurpose, portfolio, blog, shop, e-commerce, modern, flat style, responsive,  business, corporate, mobile, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" color="#343b43" href="/safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" href="/css/vendor/feather.css">
    <link rel="stylesheet" href="/css/vendor/iziToast.min.css">
    <link rel="stylesheet" href="/css/vendor/fancybox.min.css">
    <link rel="stylesheet" href="/css/vendor/noUISlider.min.css">
    <link rel="stylesheet" href="/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/vendor/socicon.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="/css/theme.css">
    <!-- Modernizr-->
    <script src="/js/modernizr.min.js"></script>

</head>
<!-- Body-->
<body>
<div class="wrapper">
    <!-- Off-Canvas Menu-->
    <div class="offcanvas-container is-triggered offcanvas-container-reverse" id="mobile-menu"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>

        <div class="offcanvas-scrollable-area border-top" style="height:calc(100% - 235px); top: 144px;">
            <!-- Mobile Menu-->
            <div class="accordion mobile-menu" id="accordion-menu">
                <!-- Home-->
                <div class="card">
                    <div class="card-header"><a class="mobile-menu-link active" href="/">صفحه اصلی</a></div>
                </div>

            </div>
        </div>
        <div class="offcanvas-footer px-4 pt-3 pb-2 text-center"><a class="social-btn sb-style-3 sb-twitter" href="#"><i class="socicon-twitter"></i></a><a class="social-btn sb-style-3 sb-facebook" href="#"><i class="socicon-facebook"></i></a><a class="social-btn sb-style-3 sb-pinterest" href="#"><i class="socicon-pinterest"></i></a><a class="social-btn sb-style-3 sb-instagram" href="#"><i class="socicon-instagram"></i></a></div>
    </div>

    <!-- Navbar: Default-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <header class="navbar-wrapper navbar-sticky">
        <div class="d-table-cell align-middle pl-md-3"><a class="navbar-brand ml-1" href="/"><img src="/img/logo/logo-dark.png" alt="CreateX"/></a></div>
        <div class="d-table-cell w-100 align-middle pl-md-3">
            <div class="navbar-top d-none d-lg-flex justify-content-between align-items-center">
                <div><a class="navbar-link ml-3"><i class="fe-icon-phone"></i>09190636309</a><a class="navbar-link ml-3" href="mailto:neysari@mdcco.ir"><i class="fe-icon-mail"></i>neysari@mdcco.ir</a><a class="social-btn sb-style-3 sb-twitter" href="#"><i class="socicon-twitter"></i></a><a class="social-btn sb-style-3 sb-facebook" href="#"><i class="socicon-facebook"></i></a><a class="social-btn sb-style-3 sb-pinterest" href="#"><i class="socicon-pinterest"></i></a><a class="social-btn sb-style-3 sb-instagram" href="#"><i class="socicon-instagram"></i></a></div>
            </div>

        </div>
    </header>

@endsection



@section('footer')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <!-- Footer-->
    <footer class="bg-dark pt-5">
        <!-- First Row-->
        <div class="container pt-2"  style="color: white;text-align: center">
            <div class="row">
                <p>این سایت برای نمونه کار می باشد</p>
            </div>
        </div>

    </footer>
</div>
<!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="fe-icon-chevron-up"></i></a>
<!-- Backdrop-->
<div class="site-backdrop"></div>
<!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
<script src="/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/js/vendor/popper.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
<script src="/js/vendor/imagesloaded.min.js"></script>
<script src="/js/vendor/isotope.min.js"></script>
<script src="/js/vendor/iziToast.min.js"></script>
<script src="/js/vendor/jquery.animateNumber.min.js"></script>
<script src="/js/vendor/jquery.countdown.min.js"></script>
<script src="/js/vendor/jquery.fancybox.min.js"></script>
<script src="/js/vendor/nouislider.min.js"></script>
<script src="/js/vendor/owl.carousel.min.js"></script>
<script src="/js/theme.js"></script>

<script type="text/javascript">

    function sabad(subid){
        $.ajaxSetup({
            headers: { 'x-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
        });

        $.ajax({
            url: '/add_sabad',
            type:'POST',
            data:'id='+subid,
            error: function (xhr, status, error) {
                alert(error);
            },
            success:function (data) {
                 $("#test").html(data);
            }
        });

    }

    function remove_sabad(subid){

        $.ajaxSetup({
            headers: { 'x-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
        });

        $.ajax({
            url: '/remove_sabad',
            type:'POST',
            data:'id='+subid,
            error: function (xhr, status, error) {
                alert(error);
            },
            success:function (data) {
                $("#test").html(data);
                // location.replace("/")
            }
        });
    }


    function add_sabad(subid)
    {
       var qty=document.getElementById("quantity").value;

        $.ajaxSetup({
            headers: { 'x-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
        });

        $.ajax({
            url: '/add_sabad_single',
            type:'POST',
            data:{id:subid,qtyy:qty},
            error: function (xhr, status, error) {
                alert(error);
            },
            success:function (data) {
                $("#test").html(data);
            }
        });
    }


    function add_fav(subid)
    {
        // var clas=$('#class').attr('class');
        // alert(clas);

        if ($('#class'+subid).hasClass('fe-icon-heart'))
        {

            $.ajaxSetup({
                headers: { 'x-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
            });

            $.ajax({
                url: '/add_fav',
                type:'POST',
                data:'id='+subid,
                error: function (xhr, status, error) {
                    alert(error);
                },
                success:function (data) {
                    $("#test").html(data);
                }
            });

            $('#class'+subid).removeClass('fe-icon-heart').addClass('fa fa-heart');

        }
         else
         {

             $.ajaxSetup({
                 headers: { 'x-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
             });
             $.ajax({
                 url: '/remove_fav',
                 type:'POST',
                 data:'id='+subid,
                 error: function (xhr, status, error) {
                     alert(error);
                 },
                 success:function (data) {
                     $("#test").html(data);
                 }
             });

            $('#class'+subid).removeClass('fa fa-heart').addClass('fe-icon-heart');
         }
    }


    function cart(subid) {

        $.ajaxSetup({
            headers: { 'x-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({
            url: '/remove_cart',
            type:'POST',
            data:'id='+subid,
            error: function (xhr, status, error) {
                alert(error);
            },
            success:function (data) {
                $("#sabad"+subid).remove();
                location.reload();
            }
        });
    }


</script>

</body>
</html>
@endsection