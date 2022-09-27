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
            <li class="active">Blog/Add</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Blog</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add Blog</div>
                <div class="panel-body">
                    <form method="POST" role="form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group col-sm-8">
                            <label>Blog name</label>
                            <input class="form-control" placeholder="Blog name" name="title"
                                   value="{{isset($item->title)?$item->title:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Blog describe</label>
                            <input class="form-control" type="text" placeholder="Blog describe" name="describe"
                                   value="{{isset($item->describe)?$item->describe:''}}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Blog content</label>
                            <br>
                            <textarea class="form-control ckeditor" rows="5" name="content"
                                      placeholder="Blog describe">{{isset($item->content)?$item->content:''}}</textarea>
                            <script type="text/javascript">
                                var editor = CKEDITOR.replace('content',{
                                    language:'vi',
                                    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
                                    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
                                    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                });
                            </script>
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Blog Img</label>
                            <input id="img" type="file" name="img" value="" class="form-control"
                                   onchange="changeImg(this)">
                            <img id="avatar" class="thumbnail" width="300px"
                                 src="{{isset($item->img)?asset('public/media/'.$item->img):asset('public/images/logo.png')}}">
                            <p class="help-block">Ảnh đại diện.</p>
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Blog Status</label>
                            <select name="status">
                                <option value="1">Hiện thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <button class="btn btn-lg btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Render Theme by <a href="https://kipo.vn">Kipo</a></p>
    </div>
    </div><!-- /.row -->
@stop
