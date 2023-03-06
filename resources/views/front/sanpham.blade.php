@extends('front.Base')
@section('title','Quản lý liên lạc')
@section('main')
    <div class="box-content">
        <input type="hidden" id="txtRouteId" value="4"/>
        <script type='text/javascript' src="js/jquery.slimscroll.min.js"></script>
        <script type='text/javascript' src="js/bootstrap-slider.js"></script>
        <div class="heading-area top-area">
            <div class="container">
                <div class="banner relative">
                    <a href="hang-moi.html" target="_blank">
                        <img class="lazyload" data-src="{{asset('public/images/banner3.jpg')}}">
                        <div class="banner_body center">
                            <div class="upcase banner_header"></div>
                            <div class="banner_description text-justify"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div> <!-- End heading area -->
        <div class="content-area home-content-area">
            <div class="container">
                <div class="navigation">
                    <a href="index.blade.php">Trang chủ</a> > <a href="sanpham.blade.php">Trang phục</a>
                </div>
                <div class="paging-top row">
                    <div class="col-md-12">
                        <div class="cat-name margin-top-30">
                            <div class="text-center ld-product-type" id="tag-filter">
                                <span class="upcase active">Bộ sưu tập</span>
                            </div>
                        </div>
                        <div class="cat-title-gray"><span>Sản phẩm</span></div>
                    </div>
                </div>
                <div class="row prod-list">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="">
                                    <style>
                                    </style>
                                    <div class="product-type">
                                        <ul>
                                            <li><a href="{{asset('search/Sale')}}">SALE</a></li>
                                            <li><a href="{{asset('search/Sản phẩm bán chạy')}}">SẢN PHẨM BÁN CHẠY</a></li>
                                            <li><a href="{{asset('search/Hàng mới')}}">HÀNG MỚI</a></li>
                                            <li><a href="{{asset('search/Dành riêng cho bạn')}}">DÀNH RIÊNG CHO BẠN</a></li>
                                        </ul>
                                    </div>
                                    <div class="product-price" id="product-price-tab">
                                        <form method="get" action="{{asset('searchprice')}}">
                                            <div class="row">
                                                <div class="col-xs-9 heading">Giá</div>
                                            </div>
                                            <div id="lblPrice"></div>
                                            <p>Min</p>
                                            <input class="form-control" type="number" name="min" value="1000">
                                            <p>Max</p>
                                            <input class="form-control" type="number" name="max" value="100000">
                                            <br>
                                            <button class="btn">Lọc</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row product-filter" style="display:hidden;">
                                    <div class="col-md-12 secondary-filters">
                                        <div class="leftnav-active-filter" id="filter-lists">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="list-product-ajax">
                                    @foreach($items as $item)
                                    <div class="col-sm-4  col-xs-6">
                                        <div class="prod-img1">
                                            <a href="{{asset('/product-render-'.$item->id)}}" class="">
                                                <img data-src="{{asset('public/media/'.$item->coverimg)}}"
                                                     class="lazyload"/>
                                            </a>
                                        </div>
                                        <div class="content ">
                                            <a href="{{asset('/product-render-'.$item->id)}}">
                                                <div class="title"><span>{{$item->title}}</span></div>
                                                <div class="desc"><span>{{$item->content}}
                                                                                                    <br>
                                                                                                        <strike class="color-red"><span
                                                                                                                    class="color-black">{{number_format($item->price,0,',','.')}} VND</span></strike>
                                                    <br>
                                                    <span class="color-red">
                                                        {{number_format($item->sale,0,',','.')}} VND | Giảm
                                                        {{100-($item->sale/$item->price)*100}}%</span>
                                                                                                        </span>
                                                    </span>
                                                </div>
                                            </a>

                                            <!-- <span class="status">Exclusive</span> -->
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="txtStyle" value=""/>
        </div><!-- End content area -->
    </div>
@stop
