@extends('front.Base')
@section('title','Giỏ hàng')
@section('main')
    <div class="box-content">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/pages/cart02dc.css?v=1575887765">
        <script type='text/javascript' src="js/owl.carousel.min.js"></script>
        <div class="content-area home-content-area top-area">
            <div class="container">
                <div class="navigation margin-top20">
                    <a href="#">Trang chủ</a> > <a href="#">Giỏ hàng</a>
                </div>
                <div>
                    <p class="text-center upcase size-20 times-new-roman">Giỏ hàng</p>
                    <div class="text-center nav-horizontal box-help-cart">
                        <span class="upcase">TRỢ GIÚP? </span><span class="bold" style="margin-right: 10px;">1900 636 517</span>
                        <a href="{{asset('order-placed')}}">Đơn hàng đã đặt</a>
                    </div>
                    <div>
                        <div class="margin-top10">
                            <div class="table-responsive lstproducts visible-xs-block hidden-xs">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center" colspan="2">Sản phẩm</th>
                                        <th class="text-center" style="min-width:90px;">Kích thước</th>
                                        <th class="text-center" style="min-width:75px;">Số lượng</th>
                                        <th class="text-right" style="min-width:85px;">Đơn giá</th>
                                        <th class="text-right" style="min-width:85px;">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $total = 0; ?>
                                    @foreach($items as $item)
                                        <tr class="clear-border product-info-custom">
                                            <td><img class="lazyload"
                                                     data-src="{{asset('public/media/'.$item->options->img)}}"
                                                     src="{{asset('public/media/'.$item->options->img)}}">
                                            </td>
                                            <td>
                                                <span class="title">{{$item->name}}</span><br>
                                            </td>
                                            <td class="text-center">
                                                <!-- <a class="icon icon-minus size_prev"></a> -->
                                                <div style="border: 1px solid #ccc;display: inline-block;padding: 5px;min-width:30px;min-height:30px;">
                                                    {{$item->options->size}}
                                                </div>
                                                <!-- <a class="icon icon-plus size_next"></a> -->
                                            </td>
                                            <td class="text-center ">
                                                <a class="icon icon-minus quantity_minus" data-id="1586796539"
                                                   id="quantity__minus"></a>
                                                <input type="text"
                                                       class="text-center number bg-white quantity quantity--1586796539"
                                                       disabled="" value="{{$item->qty}}">
                                                <a class="icon icon-plus quantity_plus" id="quantity__plus"
                                                   data-id="1586796539"></a>
                                            </td>
                                            <td class="text-right">{{$item->price}} VND</td>
                                            <td class="text-right pricetotal">
                                                {{$item->price*$item->qty}} VND
                                                <?php $total += $item->price * $item->qty ?>
                                            </td>
                                        </tr>
                                        <tr class="delete-item">
                                            <td colspan="7" class="text-right">
                                                <a href="{{asset('cart/delete/'.$item->rowId)}}"
                                                   class="icon icon-trash delete-cart">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12 box-total">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 col-xs-12 order-report">
                                            <ul>
                                                <li class="collapse-toogle1">
                                                    <span class="upcase">Tổng tiền</span>
                                                    <span class="float-r bold subtotal" id="subtotal"
                                                          subtotal="798000">{{$total}} VND</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @if(!Auth::user())
                                <div class="row box-gray">
                                    <div class="col-xs-12">
                                        <p class="title">Khách hàng mới</p>
                                        <p>Trở thành thành viên của Render nhận các tin tức thời trang trong nước và
                                            quốc tế, các chương
                                            trình khuyến mại duy nhất chỉ dành cho các thành viên của Render hay là
                                            những người đầu tiên
                                            được thông báo khi có sản phẩm thiết kế mới. Bạn còn chờ gì nữa?</p>
                                        <p>*Thông tin bắt buộc</p>
                                    </div>
                                    <form method="POST" action="{{asset('cart/pay')}}" class="bv-form">
                                        {{ csrf_field() }}
                                        <div class="col-sm-6">
                                            <div class="group">
                                                <div class="relative row-control form-group">
                                                    <label>Email *</label><input class="form-control" name="email"
                                                                                 type="text" value=""
                                                                                 id="txtEmail" data-bv-field="email">
                                                    <small data-bv-validator="notEmpty" data-bv-validator-for="email"
                                                           class="help-block"
                                                           style="display: none;">Hòm thư bắt buộc phải nhập
                                                    </small>
                                                    <small data-bv-validator="regexp" data-bv-validator-for="email"
                                                           class="help-block"
                                                           style="display: none;">Định dạng hòm thư không đúng
                                                    </small>
                                                </div>
                                                <div class="relative row-control form-group">
                                                    <label>Địa chỉ *</label><input class="form-control" value=""
                                                                                   placeholder=""
                                                                                   name="address" type="text"
                                                                                   id="txtAddress"
                                                                                   data-bv-field="address"
                                                                                   autocomplete="off">
                                                    <small data-bv-validator="notEmpty" data-bv-validator-for="address"
                                                           class="help-block" style="display: none;">Địa chỉ bắt buộc
                                                        phải nhập
                                                    </small>
                                                </div>
                                                <div class="relative row-control form-group">
                                                    <label>Thành phố *</label>
                                                    <input class="form-control" value="" placeholder=""
                                                           name="city" type="text" id="txtcity"
                                                           data-bv-field="address" autocomplete="off">
                                                    <small data-bv-validator="notEmpty"
                                                           data-bv-validator-for="province_id"
                                                           class="help-block" style="display: none;">Thành phố bắt buộc
                                                        phải chọn
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="group">
                                                <div class="relative row-control form-group">
                                                    <label>Họ tên *</label><input class="form-control" value=""
                                                                                  name="username"
                                                                                  type="text" id="txtFullName"
                                                                                  data-bv-field="fullname">
                                                    <small data-bv-validator="notEmpty" data-bv-validator-for="fullname"
                                                           class="help-block" style="display: none;">Họ tên bắt buộc
                                                        phải nhập
                                                    </small>
                                                </div>
                                                <div class="relative row-control form-group">
                                                    <label>Điện thoại *</label><input class="form-control" name="phone"
                                                                                      type="text"
                                                                                      value="" id="txtPhone"
                                                                                      data-bv-field="phone">
                                                    <small data-bv-validator="notEmpty" data-bv-validator-for="phone"
                                                           class="help-block"
                                                           style="display: none;">Số điện thoại bắt buộc phải nhập
                                                    </small>
                                                </div>
                                                <div class="relative text-right">
                                                    <button class="btn btn-black">Đặt hàng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="text-right margin-top10 visible-xs-block hidden-xs">
                                    <p>
                                        <a href="{{asset('cart/pay')}}"
                                           class="btn btn-black btn--modal-login" type="button">Thanh toán</a>
                                        <a href="{{asset('cart/pay/online')}}"
                                           class="btn btn-black btn--modal-login" type="button">Thanh toán online</a>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="margin-bottom30 text-right">
                        <a href="{{asset('/')}}">
                            <button class="btn btn-black" type="button">Tiếp tục mua hàng</button>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- End content area -->
    </div>
@stop
