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
            <li class="active">Forms</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Category</div>
                <div class="panel-body">
                    <div class="col-md-3">
                        <form method="POST" action="{{asset('admin/category')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Category name</label>
                                <input class="form-control" placeholder="Category name" name="title">
                            </div>
                            <div class="form-group">
                                <label>Describe</label>
                                <input class="form-control" placeholder="describe" name="describe">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control form-control-sm" name="status">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Không hoạt động</option>
                                </select>
                            </div>
                            <button class="btn btn-lg btn-primary">Add</button>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <table id="tb1" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Describe</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($items as $item)
                                <tr class="onRow">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->describe}}</td>
                                    <td>{{$item->status==1?'Action':'No Action'}}</td>
                                    <td>
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</a>
                                        <a href="{{asset('admin/category/delete/'.$item->id)}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Render Theme by <a href="https://kipo.vn">Kipo</a></p>
    </div>
</div><!-- /.row -->
@stop
