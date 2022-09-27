@extends('admin.Base')
@section('title','Danh mục sản phẩm')
@section('main')
    <script type="text/javascript">
        var id;
        var title;
        var describe;
        var status;
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus');
        });
        $(document).ready(function(){
            $('#tb1 tr').click(function (e) {
                id = $(this).closest('.onRow').find('td:nth-child(1)').text();
                title = $(this).closest('.onRow').find('td:nth-child(2)').text();
                describe = $(this).closest('.onRow').find('td:nth-child(3)').text();
                $('.title').val(title);
                $('.describe').val(describe);
            });
        });
        function updateItem() {
            var titlecate=$('.title').val();
            var describecate=$('.describe').val();
            var statuscate=$('.status').val();

            $.get(
                '{{url('admin/category/update')}}',
                {id:id,title:titlecate,describe:describecate,status:statuscate},
                function() {
                    location.reload();
                }
            );
        }
    </script>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="myForm" role="form" method="post"  action="{{ url('/admin/category/update') }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control title" placeholder="Category Name" name="title">
                        </div>
                        <div class="form-group">
                            <label>Describe Category</label>
                            <input class="form-control describe" placeholder="Describe" name="describe">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="status">
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary save" onclick="updateItem()">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--code popup---------------------------------------------------------------------}}
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">product</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{asset('admin/product/add')}}">Add Product</a>
                </div>
                <div class="panel-body">

                        <table id="tb1" class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Sale</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Content</th>
                                <th>Img Cover</th>
                                <th>Count</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="onRow">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->sale}}</td>
                                    <td>{{$item->size}}</td>
                                    <td>{{$item->color}}</td>
                                    <td>{{$item->content}}</td>
                                    <td><img class="thumbnail" width="100px" src="{{isset($item->coverimg)?asset('public/media/'.$item->coverimg):asset('public/images/logo.png')}}" ></td>
                                    <td>{{$item->count}}</td>
                                    <td>
                                        <a href="{{asset('admin/product/update/'.$item->id)}}">Edit</a>
                                        <a href="{{asset('admin/product/delete/'.$item->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Render Theme by <a href="https://kipo.vn">Kipo</a></p>
    </div>
    </div><!-- /.row -->
@stop
