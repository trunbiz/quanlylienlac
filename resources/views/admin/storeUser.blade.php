@extends('admin.Base')
@section('title','Danh mục sản phẩm')
@section('main')
    <script type="text/javascript">
        $('select').picker();
        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
            $('#avatar').click(function () {
                $('#img').click();
            });
        });
    </script>
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Thông tin người dùng</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin người dùng</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Thông tin người dùng</div>
                <div class="panel-body">
                    <form method="POST" role="form" enctype="multipart/form-data" action="{{empty($item) ? asset('admin/users/store') : asset('admin/users/update')}}">
                        {{csrf_field()}}
                        <input class="form-control" placeholder="id" name="id" type="hidden"
                               value="{{isset($item->id)?$item->id:''}}">

                        <div class="form-group col-sm-8">
                            <label>Quyền</label>
                            <select class="form-control" id="sel1" name="group_id" {{(\Illuminate\Support\Facades\Auth::user()->group_id != 1) ? 'disabled':''}}>
                                @foreach($groupUser as $key => $group)
                                    <option value="{{$key}}" {{(!empty($item) && ($item->group_id == $key)) ? 'selected' : ''}}>{{$group}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Username</label>
                            <input class="form-control" placeholder="username" name="username" {{!empty($item) ? 'disabled': ''}}
                                   value="{{isset($item->username)?$item->username:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="email" name="email"
                                   value="{{isset($item->email)?$item->email:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Phone</label>
                            <input class="form-control" type="text" placeholder="Phone" name="phone"
                                   value="{{isset($item->phone)?$item->phone:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="city" name="city"
                                   value="{{isset($item->city)?$item->city:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Address</label>
                            <input class="form-control" type="text" placeholder="address" name="address"
                                   value="{{isset($item->address)?$item->address:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Password</label>
                            <input class="form-control" type="text" placeholder="Nhập để thay password mới" name="password"
                                   value="">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Avatar</label>
                            <input id="img" type="file" name="img" value="" class="form-control"
                                   onchange="changeImg(this)">
                            <img id="avatar" class="thumbnail" width="300px"
                                 src="{{isset($item->img)?asset('public/media/'.$item->img):asset('public/images/logo.png')}}">
                            <p class="help-block">Avatar.</p>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <button class="btn btn-lg btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Render Theme by <a href="https://kipo.vn">Render</a></p>
    </div>
    </div><!-- /.row -->
@stop
