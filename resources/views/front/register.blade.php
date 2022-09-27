@extends('front.Base')
@section('title','Đăng ký | Thời trang cao cấp Render')
@section('main')
    <div class="content-area home-content-area top-area">
        <div class="container">
            <div class="navigation margin-top20">
                <a href="#">Trang chủ</a> &gt; <a href="">Đăng ký</a>
            </div>
            <div>
                <p class="text-center upcase size-20 times-new-roman">ĐĂNG KÝ</p>
                <div class="row box-gray">
                    <div class="col-xs-12">
                        <p class="title">MỞ TÀI KHOẢN VỚI Render</p>
                        <p>Trở thành thành viên của Render nhận các tin tức thời trang trong nước và quốc tế, các chương
                            trình khuyến mại duy nhất chỉ dành cho các thành viên của Render hay là những người đầu tiên
                            được thông báo khi có sản phẩm thiết kế mới. Bạn còn chờ gì nữa?</p>
                        <p>*Thông tin bắt buộc</p>
                    </div>
                    <form method="POST" id="frmregister" novalidate="novalidate" class="bv-form">
                        {{ csrf_field() }}
                        <div class="col-sm-6">
                            <div class="group">
                                <div class="relative row-control form-group">
                                    <label>Email *</label><input class="form-control" name="email" type="text" value=""
                                                                 id="txtEmail" data-bv-field="email">
                                    <small data-bv-validator="notEmpty" data-bv-validator-for="email" class="help-block"
                                           style="display: none;">Hòm thư bắt buộc phải nhập
                                    </small>
                                    <small data-bv-validator="regexp" data-bv-validator-for="email" class="help-block"
                                           style="display: none;">Định dạng hòm thư không đúng
                                    </small>
                                </div>

                                <div class="relative row-control form-group">
                                    <label>Mật khẩu *</label><input type="password" name="password" class="form-control"
                                                                    id="txtPassword" data-bv-field="password">
                                    <small data-bv-validator="notEmpty" data-bv-validator-for="password"
                                           class="help-block" style="display: none;">Mật khẩu bắt buộc phải nhập
                                    </small>
                                </div>
                                <div class="relative row-control form-group">
                                    <label>Địa chỉ *</label><input class="form-control" value="" placeholder=""
                                                                   name="address" type="text" id="txtAddress"
                                                                   data-bv-field="address" autocomplete="off">
                                    <small data-bv-validator="notEmpty" data-bv-validator-for="address"
                                           class="help-block" style="display: none;">Địa chỉ bắt buộc phải nhập
                                    </small>
                                </div>
                                <div class="relative row-control form-group">
                                    <label>Thành phố *</label>
                                    <input class="form-control" value="" placeholder=""
                                           name="city" type="text" id="txtcity"
                                           data-bv-field="address" autocomplete="off">
                                    <small data-bv-validator="notEmpty" data-bv-validator-for="province_id"
                                           class="help-block" style="display: none;">Thành phố bắt buộc phải chọn
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="col-sm-6">
                            <div class="group">
                                <div class="relative row-control form-group">
                                    <label>Họ tên *</label><input class="form-control" value="" name="username"
                                                                  type="text" id="txtFullName" data-bv-field="fullname">
                                    <small data-bv-validator="notEmpty" data-bv-validator-for="fullname"
                                           class="help-block" style="display: none;">Họ tên bắt buộc phải nhập
                                    </small>
                                </div>
                                <div class="relative row-control form-group">
                                    <label>Điện thoại *</label><input class="form-control" name="phone" type="text"
                                                                      value="" id="txtPhone" data-bv-field="phone">
                                    <small data-bv-validator="notEmpty" data-bv-validator-for="phone" class="help-block"
                                           style="display: none;">Số điện thoại bắt buộc phải nhập
                                    </small>
                                </div>
                                <div class="relative text-right">
                                    <button class="btn btn-black" id="btnRegister" type="submit">ĐĂNG KÝ NGAY</button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
