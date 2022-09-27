@extends('admin.Base')
@section('title','Danh mục sản phẩm')
@section('main')
    <script type="text/javascript">
        $('select').picker();
        function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            });
        });
    </script>
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Product/Add</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Product</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                    <form method="POST" role="form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Product category</label><br>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Danh mục
                                    sản phẩm <span class="caret"></span></button>
                                <ul class="dropdown-menu" style="color: black !important;">
                                    @foreach($listCate as $itemCate)
                                        @if($itemCate->status==1)
                                            <?php $check = 0?>
                                            @if(isset($itemCatecheck))
                                                @foreach($itemCatecheck as $itemCheck)
                                                    @if($itemCate->id==$itemCheck->idca)
                                                        <?php $check = 1;?>
                                                        <li><input type="checkbox" value="{{$itemCate->id}}"
                                                                   checked="checked"
                                                                   name="idcategory[]">{{$itemCate->title}}</li>
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($check==0)
                                                <li><input type="checkbox" value="{{$itemCate->id}}"
                                                           name="idcategory[]">{{$itemCate->title}}</li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Product name</label>
                            <input class="form-control" placeholder="Prodcut name" name="title" value="{{isset($item->title)?$item->title:''}}">
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Product price</label>
                            <input class="form-control" type="number" placeholder="Prodcut price" name="price" value="{{isset($item->price)?$item->price:''}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Product sale</label>
                            <input class="form-control" type="number" placeholder="Prodcut sale" name="sale" value="{{isset($item->sale)?$item->sale:''}}">
                        </div>
                        </div>
                        <div class="row">
                        {{--<div class="form-group col-sm-6">--}}
                            {{--<label>Product size</label><br>--}}
                            {{--<select id="boot-multiselect-demo" class="form-control" rows="5" multiple="multiple" name="size[]">--}}
                                {{--<option {{isset($item->size)?(strpos($item->size,'S')>=0?'selected':''):''}} value="S">S</option>--}}
                                {{--<option {{isset($item->size)?(strpos($item->size,'M')>=0?'selected':''):''}} value="M">M</option>--}}
                                {{--<option {{isset($item->size)?(strpos($item->size,'L')>=0?'selected':''):''}} value="L">L</option>--}}
                                {{--<option {{isset($item->size)?(strpos($item->size,'XL')>=0?'selected':''):''}} value="XL" >XL</option>--}}
                            {{--</select>--}}

                        {{--</div>--}}
                        {{--<div class="form-group col-sm-6">--}}
                            {{--<label>Product Color</label>--}}
                            {{--<select id="boot-multiselect-demo" multiple="multiple" class="form-control" rows="5" name="color[]">--}}
                                {{--<option {{isset($item->color)?(strpos($item->color,'red')>=0?'selected':''):''}} value="red">Red</option>--}}
                                {{--<option {{isset($item->color)?(strpos($item->color,'white')>=0?'selected':''):''}} value="white">White</option>--}}
                                {{--<option {{isset($item->color)?(strpos($item->color,'yellow')>=0?'selected':''):''}} value="yellow">Yellow</option>--}}
                                {{--<option {{isset($item->color)?(strpos($item->color,'black')>=0?'selected':''):''}} value="black" >Black</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        </div>
                        <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Number of product</label>
                            <input class="form-control" type="number" placeholder="Number of product" name="count" value="{{isset($item->count)?$item->count:''}}">
                        </div>
                        <div class="form-group col-sm-6">
                                <label>Product describe</label>
                                <br>
                                <textarea class="form-control" rows="5" name="content" placeholder="Product describe">{{isset($item->content)?$item->content:''}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Ảnh đại diện</label>
                                <input id="img" type="file" name="coverimg" value="" class="form-control" onchange="changeImg(this)">
                                <img id="avatar" class="thumbnail" width="300px" src="{{isset($item->coverimg)?asset('public/media/'.$item->coverimg):asset('public/images/logo.png')}}" >
                                <p class="help-block">Ảnh đại diện.</p>
                            </div>
                            <script>
                                function preview_image() {
                                    var total_file = document.getElementById("upload_file").files.length;
                                    for (var i = 0; i < total_file; i++) {
                                        $('#image_preview').append("<img class='col-sm-3 click-hide' src='" + URL.createObjectURL(event.target.files[i]) + "'>");
                                    }
                                }

                                $(document).ready(function () {
                                    $("#upload_file").click(function () {
                                        $(".click-hide").hide();
                                    });
                                });
                            </script>
                            <div class="form-group col-sm-6">
                                <label>Chọn nhiều ảnh</label>
                                <input id="upload_file" multiple type="file" name="media[]"
                                       onchange="preview_image();" value="" class="form-control">
                                <div id="image_preview" class="row">
                                    @if(isset($media))
                                        @foreach($media as $mediaItem)
                                            <img class='col-sm-3 click-hide'
                                                 src='{{asset('public/media/'.$mediaItem->url)}}'>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary">Add</button>
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
