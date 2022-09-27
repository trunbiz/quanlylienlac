@extends('front.Base')
@section('title','Đăng nhập | Thời trang cao cấp Render')
@section('main')
    <div class="content-area home-content-area top-area">
        <div class="container">
            <div class="navigation margin-top20">
                <a href="#">Trang chủ</a> > <a href="#">Đăng nhập</a>
            </div>
            <div>
                <p class="text-center upcase size-20 times-new-roman">Đăng nhập</p>
                <div class="text-center nav-horizontal box-help-cart">
                    <span class="upcase">TRỢ GIÚP? </span><span
                            class="bold">1900 636 517</span>
                    <a href="chinh-sach-doi-tra.html">Ch&iacute;nh s&aacute;ch đổi trả</a>
                    <a href="chinh-sach-giao-hang.html">Ch&iacute;nh s&aacute;ch giao h&agrave;ng</a>
                    <a href="chinh-sach-thanh-toan.html">Ch&iacute;nh s&aacute;ch thanh to&aacute;n</a>
                    <a href="size-guide.html">Size Guide</a>
                </div>
                <div class="row box-gray relative">
                    <form method="POST" id="frmregister">
                        {{ csrf_field() }}
                        <div class="col-md-9">
                            <p class="title">KHÁCH HÀNG ĐÃ CÓ TÀI KHOẢN</p>
                            <p>Nếu bạn đã có tài khoản tại Render, vui lòng đăng nhập tại đây.<br>
                                Chú ý: Nếu bạn mới chỉ đăng ký theo dõi bản tin hàng tuần mà vẫn chưa đăng ký tài khoản
                                thành viên, vui lòng đăng ký bên dưới.</p>

                            <div class="relative row-control form-group">
                                <label>Email *</label><input class="form-control" name="email" type="text"
                                                             id="txtEmail"/>
                            </div>
                            <div class="relative row-control form-group">
                                <label>Mật khẩu *</label><input type="password" name="password" class="form-control"
                                                                id="txtPassword"/>
                            </div>
                        </div>
                        <div class="col-sm-3">
                        <button class="btn btn-black" type="submit" id="btnSignin" style="min-width: 184px;">Đăng nhập ngay</button>
                        </div>
                    </form>
                </div>
                <div class="row box-gray relative">
                    <div class="col-md-9">
                        <p class="title">BẠN CHƯA ĐĂNG KÝ TÀI KHOẢN?</p>
                        <p>Nếu bạn mới đến Render, vui lòng chọn “ĐĂNG KÝ NGAY”</p>
                    </div>
                    <a href="{{asset('register')}}">
                        <button class="btn btn-black" type="button" style="min-width: 184px;">ĐĂNG KÝ NGAY</button>
                    </a>
                </div>
            </div>
        </div>
    </div><!-- End content area -->
@stop
