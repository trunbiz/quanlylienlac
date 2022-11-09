<!DOCTYPE html>
<html lang="en-US">


<!-- Mirrored from RENDER.vn/signin.html?url=https://RENDER.vn by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Mar 2020 17:12:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <base href="{{asset('public')}}/">
    <meta name="google-site-verification" content="1ZmmdFqf8YYS19y0dwjSKpu8-nBtXcn16MKeVUky_bg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Render.VN - website thương mại điện tử đầu tiênn tại Việt Nam tập trung v&agrave;o h&agrave;ng thời trang thiết kế cao cấp. RENDER cung cấp c&aacute;c sản phẩm thời trang thiết kế trực tiếp từ c&aacute;c nh&agrave; thiết kế c&oacute; t&ecirc;n tuổi tại Việt Nam tới c&aacute;c kh&aacute;ch h&agrave;ng muốn khẳng định vị tr&iacute; v&agrave; tầm v&oacute;c của m&igrave;nh trong x&atilde; hội th&ocirc;ng qua c&aacute;ch ăn mặc. Ch&uacute;ng t&ocirc;i cũng hi vọng sẽ g&oacute;p phần củng cố hơn nữa gi&aacute; trị của thời trang trong cuộc sống của con người, đặc biệt đến th&agrave;nh c&ocirc;ng của người phụ nữ Việt Nam, đồng thời l&agrave; cầu nối vững chắc giữa đội ngũ c&aacute;c nh&agrave; thiết kế trẻ của Việt Nam v&agrave; c&aacute;c kh&aacute;ch h&agrave;ng tiềm năng." />
    <link href="signin.html" rel="canonical" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Đăng nhập | Render | Thời trang thiết kế cao cấp" />
    <meta property="og:description" content="Render.VN - website thương mại điện tử đầu ti&ecirc;n tại Việt Nam tập trung v&agrave;o h&agrave;ng thời trang thiết kế cao cấp. RENDER cung cấp c&aacute;c sản phẩm thời trang thiết kế trực tiếp từ c&aacute;c nh&agrave; thiết kế c&oacute; t&ecirc;n tuổi tại Việt Nam tới c&aacute;c kh&aacute;ch h&agrave;ng muốn khẳng định vị tr&iacute; v&agrave; tầm v&oacute;c của m&igrave;nh trong x&atilde; hội th&ocirc;ng qua c&aacute;ch ăn mặc. Ch&uacute;ng t&ocirc;i cũng hi vọng sẽ g&oacute;p phần củng cố hơn nữa gi&aacute; trị của thời trang trong cuộc sống của con người, đặc biệt đến th&agrave;nh c&ocirc;ng của người phụ nữ Việt Nam, đồng thời l&agrave; cầu nối vững chắc giữa đội ngũ c&aacute;c nh&agrave; thiết kế trẻ của Việt Nam v&agrave; c&aacute;c kh&aacute;ch h&agrave;ng tiềm năng." />
    <meta property="og:url" content="signin.html" />
    <meta property="og:site_name" content="Render | Thời trang thiết kế cao cấp" />
    <meta property="article:author" content="©2016 Render | Số ĐKKD: 0107469891 do Sở kế hoạch và Đầu tư TP Hà Nội, cấp ngày 10/06/2016">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="vi">
    <meta name="keywords" content="">
    <meta name="news_keywords" content="">
    <meta name="language" content="vietnamese">
    <meta name="google-site-verification" content="2CpB1Z6I0VId1fTbBr8Dq26HuV5A0wQoSzep4tZtu5A" />  <link rel="shortcut icon" href="upload/files/RENDER_favicon_01.png">
    <link rel="manifest" href="manifest.json" />
    <link rel='stylesheet' href="css/bootstrap.min.css" type='text/css' media='all' />
    <link rel='stylesheet' href="css/bootstrap-slider.css" type='text/css' media='all' />
    <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/style2048.css?v=1.5">
    <link rel="stylesheet" type="text/css" href="css/responsivee67d.css?v=1.3">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="../maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/fonts-telo/css/fontello.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .buyonegetonefree:before {
            content: "";
            width: 80px;
            height: 80px;
            position: absolute;
            top: 5px;
            right: 5px;
            background-image: url('upload/files/tag-buy1-get1%20(1.html).png');
            background-repeat: no-repeat;
            background-size: contain;
            z-index: 9;
        }
    </style>  <script type='text/javascript' src="js/jquery-2.1.1.mind41d.js?"></script>
    <script type='text/javascript' src="js/bootstrap-3.1.1.min.js"></script>
    <script type='text/javascript' src="js/lazyload.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-slider.js"></script>
    <script type="text/javascript" src="js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type='text/javascript' src="js/main83a7.js?v=1.9"></script>
    <!-- harafunnel -->
    <script src="../assets.harafunnel.com/widget/552107388329416.js" async="async"></script>

    <script src="../cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MH7SMDT');
    </script>
    <!-- End Google Tag Manager -->
    <script>
        (function(i,s,o,g,r,a,m){i['EmaticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../api.ematicsolutions.com/v1/ematic.min.js','ematics');
        var ematicApikey = "21218b2f5d1a11ea939d0242ac110002-sg5";
        var opt = {
            email: "",
            country_iso: "vietnam",
            currency_iso: "vnd",
            language_iso: "vietnam"
        };
        //initialize
        ematics("create", ematicApikey, opt);
    </script>

    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "0ab5a5a9-7298-436c-b5ca-bde41d039f66",
            });
        });
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            '../connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1122064037846188');
        fbq('track', 'PageView');

    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1122064037846188&amp;ev=PageView%20%20&amp;noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
    <!-- <script>
        dataLayer = [];
      </script> -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-876282344"></script>

    <script>
        function gtag(){dataLayer.push(arguments);}

        gtag('js', new Date());

        gtag('config', 'AW-876282344');

    </script>

    <script>
        window.dataLayer = window.dataLayer || [];
    </script>      <style type="text/css">
        @media  screen and (max-width: 650px) {
            #callnowbutton {
                display: block;
                width: 100px;
                right: 0;
                border-bottom-left-radius: 40px;
                border-top-left-radius: 40px;
                height: 80px;
                position: fixed;
                bottom: -20px;
                background: url("images/phone.png") center 2px no-repeat;
                text-decoration: none;
                z-index: 9999;
                background-size: 58px 58px;
            }
        }
    </style>
    <script type="text/javascript">
        var siteUrl = "{{ url('')}}";
    </script>
</head>

<body class="">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MH7SMDT" height="0" width="0"
                  style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="body">
    <div class="content-wrapper">
        <div id="fix-menu">
            <div id="promo-banner">
                <div class="promo-banner-content clearfix">
                    <div class="container">
                        <div class="row promo-detail">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div id="hotNews" class="carousel slide vertical" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="detail item active">
                                            <a style="color:#318f8f;" href="{{asset('product')}}" title="Sản phẩm Render - Đồng gi&aacute; chỉ từ 149K ">Sản phẩm Render - Đồng gi&aacute; chỉ từ 149K  - <span>MUA NGAY</span></a>
                                        </div>
                                    </div>
                                    <!-- Carousel nav -->
                                    <!--<a class="carousel-control left" href="#hotNews" data-slide="prev">‹</a>-->
                                    <a class="carousel-control right" href="#hotNews" data-slide="next">›</a>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-heading-area-v2">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 col-md-4 col-lg-3 visible-md-block hidden-md visible-sm-block hidden-sm visible-xs-block hidden-xs">
                            <a href="{{asset('/')}}" rel="nofollow"><img class="lazyload logo-RENDER" style="background: none; width: 40px;margin-bottom: 2px;" data-src="images/logo.png" /></a>
                        </div>

                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 col-lg-offset-3 col-md-offset-0">
                            <div class="site-heading-right">
                                <div class="top-menu">
                                    <ul>
                                        <li class="nav--toggle pull-left">
                                            <span type="button" class="icon-toggle"></span>
                                        </li>

                                        <li class="visible-lg-block hidden-lg" style="float:left; border:0; margin-left:35px;">
                                            <a href="index.blade.php"><img class="lazyload"
                                                                           data-src="upload/files/RENDER%20logo_website.png"
                                                                           style="max-height:15px;" /></a>
                                        </li>
                                        <li class="nav--search-v2">
                                            <a href="javascript:;" id="btn__toggle_search"><i class="demo-icon RENDERic-search"></i></a>
                                        </li>
                                        <li class="form-search-v2">
                                            <div id="search__form" class="search">
                                                <form method="GET" action="{{asset('search')}}">
                                                    <input type="text" id="txtSearch" class="search" name="search"
                                                           value=""
                                                           placeholder="Tìm kiếm sản phẩm ..." autocomplete="off" />
                                                    <button class="btnsearch"><i class="demo-icon RENDERic-search"></i></button>
                                                </form>
                                            </div>
                                        </li>
                                        <li class="btntooltip" id="lstitems" data-toggle="tooltip" data-placement="left" title="Giỏ hàng">
                                            <a class="btntooltip prod-cart-href" href="{{asset('cart')}}">
                                                <i class="demo-icon RENDERic-shopping-bag"></i>
                                                <span class="prod-cart-qty"></span>
                                            </a>
                                        </li>
                                        <li data-toggle="tooltip" data-placement="left" title="Tài khoản"><a href="{{asset('admin')}}"><i class="demo-icon RENDERic-user-1"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End site heading area -->
            <div class="mainmenu-area">
                <div class="container">
                    <div class="row">
                        <div id="submenus"></div>
                        <div class="navbar-collapse collapse">
                            <div class="menu-left">
                                <ul class="nav navbar-nav navbar-left">
                                    <li class=" bg-red" id="sale">
                                        <a href="{{asset('search/Sale')}}" id="sale_href">SALE</a>
                                    </li>
                                    <li class=" " id="new">
                                        <a href="{{asset('search/Hàng mới')}}" id="new_href">H&Agrave;NG MỚI</a>
                                    </li>
                                    <li class=" " id="product">
                                        <a href="{{asset('search/Trang phục')}}" id="product_href">Trang phục</a>
                                    </li>
                                    <li class=" " id="collection">
                                        <a href="{{asset('search/Bộ sưu tập')}}" id="collection_href">Bộ sưu tập</a>
                                    </li>
                                    <li class=" " id="designer">
                                        <a href="{{asset('search/SALE')}}" id="designer_href">Nh&agrave; thiết kế</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End mainmenu area -->
        </div>
        <div class="box-content">
        @yield('main')
            <div class="footer-area">
                <div class="footer-nav">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 fisrt-box-hide">
                                <h3 class="heading">Hỗ trợ khách hàng</h3>
                                <ul>
                                    <li><a href="lien-he.html">Th&ocirc;ng tin li&ecirc;n hệ</a></li>
                                    <li><a href="huong-dan-mua-hang.html">Hướng dẫn mua h&agrave;ng</a></li>
                                    <li><a href="chinh-sach-doi-tra.html">Ch&iacute;nh s&aacute;ch đổi trả</a></li>
                                    <li><a href="chinh-sach-giao-hang.html">Ch&iacute;nh s&aacute;ch giao h&agrave;ng</a></li>
                                    <li><a href="chinh-sach-thanh-toan.html">Ch&iacute;nh s&aacute;ch thanh to&aacute;n</a></li>
                                    <li><a href="size-guide.html">Size Guide</a></li>
                                    <li><a href="cau-hoi-thuong-gap1.html">FAQs</a></li>
                                    <li><a href="gift-card.html">Gift Card</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 fisrt-box-hide">
                                <h3 class="heading">Render</h3>
                                <ul>
                                    <li><a href="ve-chung-toi.html">Về ch&uacute;ng t&ocirc;i</a></li>
                                    <li><a href="hop-tac-ban-hang.html">Hợp t&aacute;c b&aacute;n h&agrave;ng</a></li>
                                    <li><a href="http://careers.RENDER.vn/">Tuyển dụng</a></li>
                                    <li><a href="chinh-sach-bao-mat.html">Ch&iacute;nh s&aacute;ch bảo mật</a></li>
                                    <li><a href="dieu-kien-dieu-khoan.html">Điều kiện &amp; Điều khoản</a></li>
                                    <li><a href="do-you-know.html">#Render doyouknow</a></li>
                                    <li><a href="chuong-trinh-quan-tri-thuc-tap-sinh.html">Ecommerce Graduate Programme</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-12 footer-box-center">
                                <h3 class="heading">Liên hệ chúng tôi</h3>
                                <p class="margin-top15">
                                    <a class="icon icon-fb icon-footer" target="_blank"
                                       href="https://www.facebook.com/www.RENDER.vn/"></a>
                                    <a class="icon icon-youtube icon-footer" target="_blank"
                                       href="https://www.youtube.com/channel/UCXdH1Tz7Epnvhs4ubp5gmvw"></a>
                                    <a class="icon icon-in icon-footer" target="_blank"
                                       href="https://www.linkedin.com/company/RENDER"></a>
                                </p>
                                <div class="hidden-xs">
                                    <p class="heading margin-top15" style="letter-spacing: 1px;">ĐĂNG KÝ CẬP NHẬT XU HƯỚNG THỜI
                                        TRANG VÀ CÁC ƯU ĐÃI ĐẶC BIỆT</p>
                                    <div class="frmReceiveEmail">
                                        <div class="form-group">
                                            <!-- <div class="col-lg-4"><label class="control-label">Ảnh đại diện</label></div> -->
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="email" placeholder="Email"
                                                       id="txtEmail">
                                                <span class="input-group-btn">
                                            <button class="btn btn-black btnReceiveEmail" style="min-width: 172px;"
                                                    type="button">Đăng ký</button>
                                        </span>
                                            </div>
                                            <div class="input-group hide box-label-alert-registerreviceemail"
                                                 style="padding-top:10px;">
                                                <p class="small"
                                                   style="padding: 10px 0; border-top: dashed 1px #f00; color: #F00; border-bottom: dashed 1px #f00;">
                                                    Quý khách đã đăng nhận bản tin thành công từ www.Render.vn!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-callus visible-xs">
                                    <a href="tel:1900636517" class="btn btn-black mobile-callus-btn" style="width: 70%;">Call
                                        us</a>
                                </div>
                                <div class="col-md-8 fisrt-box-hide" style="padding-left:0;">
                                    <p class="heading margin-top5">Thông tin công ty</p>
                                    <p>CÔNG TY TNHH Render<br>
                                        Địa chỉ: Tầng 3, Toà nhà Thăng Long. <br>
                                        99 Mạc Thái Tổ, Phố Trung Kính, Cầu Giấy, Hà Nội <br>
                                        P: <a href="tel:+84 24 710 86889">+84 24 710 86889</a> | CSKH: <a href="tel:1900 636 517">1900 636 517</a></p>
                                </div>
                                <div class="col-md-4 fisrt-box-hide" style="text-align:left;">
                                    <p class="heading margin-top5">Được chứng nhận</p>
                                    <ul class="list-inline">
                                        <li style="display:inherit;">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3 col-md-5 col-lg-6">
                                ©2016 Render | Số ĐKKD: 0107469891 do Sở kế hoạch và Đầu tư TP Hà Nội, cấp ngày 10/06/2016
                            </div>
                            <div class="col-sm-5 col-md-4 col-lg-3 text-left">
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                                <a href="#" class="card card-visa"></a>
                                <a href="#" class="card card-mastercard"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End footer area -->
        </div>
        <div class="modal fade bs-example-modal-md dlg dlg-notify" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title upcase"></h4>
                    </div>
                    <div class="modal-body text-center">
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : "344562976437007",
                    cookie     : true,  // enable cookies to allow the server to access
                                        // the session
                    xfbml      : true,  // parse social plugins on this page
                    version    : 'v2.8' // use graph api version 2.8
                });
            };

            (function ($) {
                $( document ).ready(function() {
                    $("#loginWithFacebook" ).click(function() {
                        var redirect_url = $(this).data('url');
                        FB.login(function(response) {
                            console.log(response);
                            if (response.status === 'connected') {
                                loginAPI(redirect_url);
                            } else if (response.status === 'not_authorized') {
                                console.log('Please log into this app.');
                            } else {
                                console.log('Please log into Facebook.');
                            }
                        }, {scope: 'public_profile,email'});
                    });
                });

                // Load the SDK asynchronously
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    //js.src = "//connect.facebook.net/en_US/sdk.js";
                    js.src = '../connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));

                function loginAPI(redirect_url) {
                    FB.api('/me?fields=id,name,email,gender', function(response) {
                        $.ajax({
                            url: "/registerfb.html",
                            type: "POST",
                            cache: false,
                            contentType: 'application/x-www-form-urlencoded',
                            dataType: 'json',
                            data: $.param(response),
                            success: function(data){
                                if(data['error'] == 0){
                                    if(redirect_url) {
                                        return window.location.href = redirect_url;
                                    } else {
                                        return window.location.href = 'index.blade.php';
                                    }
                                    //location.reload('/');
                                }
                            },error: function(xhr, err) {
                                console.log("Error Login");
                                return location.reload('index.blade.php');
                            }
                        });

                        console.log(response);
                    });
                }

            })(jQuery);
        </script>
        <script type="text/javascript">
            var screenWidth = parseInt($(window).width());
            if(screenWidth<=990){
                /*document.getElementById("designer_href").href="javascript:;";
                document.getElementById("product_href").href="javascript:;";
                document.getElementById("style_href").href="javascript:;";*/
            }
        </script><div class="loading-modal">
            <!-- Place at bottom of page -->
        </div>    </div>
    <!--<a href="tel:1900636517" id="callnowbutton">&nbsp;</a>    -->
</div>
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 876282344;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="../www.googleadservices.com/pagead/f.txt"></script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="http://googleads.g.doubleclick.net/pagead/viewthroughconversion/876282344/?value=0&amp;guid=ON&amp;script=0" />
    </div>
</noscript>
</body>


<!-- Mirrored from RENDER.vn/signin.html?url=https://RENDER.vn by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Mar 2020 17:12:21 GMT -->
</html>



