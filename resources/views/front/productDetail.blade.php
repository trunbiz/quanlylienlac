@extends('front.Base')
@section('title','Quản lý liên lạc')
@section('main')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="content-area home-content-area top-area">
        <div class="container">
            <div class="navigation margin-top20">
                <a href="https://ferosh.vn">Trang chủ</a>
                &gt; <a href="https://ferosh.vn/san-pham">Sản phẩm</a>
                &gt; <a href="https://ferosh.vn/san-pham?types=dam-vay-lien">
                    {{$item->title}}
                </a>
            </div>
            <div class="row margin-top20">
                <div class="col-sm-8 col-md-6">
                    <div id="thumbnails">
                        <div id="up-arrow">
                            <span class="thumbnails-arrow"></span>
                        </div>
                        <div id="thumbnails-mask" style="height: auto;">
                            <div id="thumbnails-container">
                                <ul>
                                    <li color-id="22286" class="show active">
                                        <img class="lazyload"
                                             data-src="{{asset('public/media/'.$item->coverimg)}}"
                                             data-image="{{asset('public/media/'.$item->coverimg)}}"
                                             data-zoom-image="{{asset('public/media/'.$item->coverimg)}}"
                                             src="{{asset('public/media/'.$item->coverimg)}}">
                                    </li>
                                    @foreach($itemsMedia as $media)
                                        <li color-id="22286" class="show">
                                            <img class="lazyload"
                                                 data-src="{{asset('public/media/'.$media->url)}}"
                                                 data-image="{{asset('public/media/'.$media->url)}}"
                                                 data-zoom-image="{{asset('public/media/'.$media->url)}}"
                                                 src="{{asset('public/media/'.$media->url)}}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="down-arrow">
                            <span class="thumbnails-arrow"></span>
                        </div>
                    </div>
                    <div class="prod-image relative">
                        <img src="{{asset('public/media/'.$item->coverimg)}}"
                             data-zoom-image="{{asset('public/media/'.$item->coverimg)}}">
                        <div class="imageNav hide">
                            <div class="icon icon-imgnext"></div>
                            <div class="icon icon-imgprev"></div>
                        </div>
                    </div>
                </div>
                <div class="clear-xs margin-bottom20 hidden-lg"></div>
                <div class="col-sm-4 col-md-6 detail">
                    <ul>
                        <form method="POST" action="{{asset('/cart')}}">
                            {{ csrf_field() }}
                            <li>
                                <input type="hidden" id="product_id" name="id" value="{{$item->id}}">
                                <h3><span id="product_name">{{$item->title}}</span></h3>
                                <div class="desc">
                                    <input type="hidden" id="price" value="780000.0000">
                                    <input type="hidden" id="txtAlias" value="vay-nhun-sat-nach-cotton">
                                    <strike class="color-red"><span class="color-black">{{number_format($item->price,0,',','.')}}
                                            VND</span></strike>
                                    <br>
                                    <span class="color-red">
                                {{number_format($item->sale,0,',','.')}} VND | Giảm
                                        {{number_format(100-($item->sale/$item->price)*100, 2)}}%</span>
                                </div>
                            </li>

                            <li>
                                <div class="upcase">Chọn kích thước</div>
                                <?php
                                $colorSize = explode(",", $item->size);
                                array_pop($colorSize);
                                ?>
                                <div id="size" class="content">
                                    @foreach($colorSize as $size)
                                        <div class="radio" style="display: inline-block; margin-right: 10px;">
                                            <label size-id="1" class="box"><input type="radio" name="size"
                                                                                  value="{{$size}}">{{$size}}</label>
                                        </div>
                                    @endforeach
                                    <div class="clear"></div>
                                </div>
                                <div class="validator hide">Vui lòng chọn kích thước trước khi đặt mua</div>
                            </li>
                            <li>
                                <div class="upcase">Màu sắc</div>
                                <?php
                                $colorItems = explode(",", $item->color);
                                array_pop($colorItems);
                                ?>
                                <div id="color" class="content">
                                    @foreach($colorItems as $color)
                                        <div class="radio" style="display: inline-block; margin-right: 10px;">
                                            <label size-id="1" class="box" style="background: {{$color}};">
                                                <input style="background-color:{{$color}};" type="radio" name="color"
                                                       value="{{$color}}"></label>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <div class="upcase">Đánh giá</div>
                                <div class="ratting">
                                    <span class="fa fa-star {{$rate >= 1 ? 'checked' : ''}}"></span>
                                    <span class="fa fa-star {{$rate >= 2 ? 'checked' : ''}}"></span>
                                    <span class="fa fa-star {{$rate >= 3 ? 'checked' : ''}}"></span>
                                    <span class="fa fa-star {{$rate >= 4 ? 'checked' : ''}}"></span>
                                    <span class="fa fa-star {{$rate >= 5 ? 'checked' : ''}}"></span>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-black btnaddtocart">Đặt mua</button>
                                    </div>
                                </div>
                            </li>
                        </form>

                        <li class="collapse-toogle in">
                            <div class="upcase">MÔ TẢ SẢN PHẨM</div>
                            <div class="content product--content">
                                {{$item->content}}
                            </div>
                        </li>
                        <li class="collapse-toogle">
                            <div class="upcase">Chính sách đổi trả</div>
                            <div class="content">
                                Render chấp nhận đổi/trả hàng trong thời gian 03 ngày làm việc, áp dụng không đồng đều
                                đối với từng mặt hàng và sản phẩm khác nhau. Quý khách vui lòng kiểm tra chi tiết về
                                chính sách đổi và trả hàng theo link.
                                <div class="text-right margin-top10"><a class="view-all"
                                                                        href="https://ferosh.vn/chinh-sach-doi-tra.html">Xem
                                        chi tiết</a></div>
                            </div>
                        </li>
                        <li class="collapse-toogle">
                            <div class="upcase">Chính sách giao hàng</div>
                            <div class="content">
                                Đơn hàng sẽ được giao cho Quý khách trong vòng 07 - 10 ngày làm việc kể từ ngày đặt đơn.
                                Quý khách có thể liên hệ với Render qua Email, Điện thoại, Facebook để được biết về lộ
                                trình đơn hàng của mình . Chi tiết về chính sách giao hàng Quý khách vui lòng click vào
                                link.
                                <div class="text-right margin-top10"><a class="view-all"
                                                                        href="https://ferosh.vn/chinh-sach-giao-hang.html">Xem
                                        chi tiết</a></div>
                            </div>
                        </li>
                        <li class="collapse-toogle">
                            <div class="upcase">Chính sách thanh toán</div>
                            <div class="content">
                                Render cung cấp 4 hình thức thanh toán cho quý khách: Thanh toán khi nhận hàng (COD),
                                Chuyển khoản, Thanh toán qua thẻ tín dụng, Thanh toán qua thẻ ATM.
                                <div class="text-right margin-top10"><a class="view-all"
                                                                        href="https://ferosh.vn/chinh-sach-thanh-toan.html">Xem
                                        chi tiết</a></div>
                            </div>
                        </li>
                        <li>
                            <ul class="product-other">
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            {{--Review sản phẩm--}}
            <h4>Comments</h4>
            <div class="row product-review row" style="background: #20644d0d">
                <div class="col-sm-12" style="max-height: 200px;overflow-y: scroll;">
                    @foreach($reviews as $itemReview)
                    <div class="comment mt-4 text-justify float-left">
                        <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
                        <b>{{$itemReview->getUserReview->username ?? 'Người dùng ẩn danh'}}</b><br>
                        {{--<span>- {{$itemReview->created_at   }}</span>--}}
                        <br>
                        <p>{{$itemReview->review}}</p>
                    </div>
                        <hr>
                    @endforeach
                </div>
                <form method="POST" action="{{asset('/review')}}">
                    {{ csrf_field() }}
                    <input name="product_id" hidden value="{{$item->id}}">
                    <input name="user_id" hidden value="{{\Illuminate\Support\Facades\Auth::user()->id ?? ''}}">
                    <textarea class="form-control" id="review" name="review"
                              placeholder="Please enter your feedback here..." rows="5"></textarea>
                    <br>
                    <button class="btn btn-black" style="float: right;">Phản hồi</button>
                </form>
            </div>
        </div>
    </div>
    <style>
        .ratting .checked {
            color: orange;
        }

    </style>

@stop
