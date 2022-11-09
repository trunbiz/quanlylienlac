@extends('admin.Base')
@section('title','Danh sách coupon')
@section('main')
    <script type="text/javascript">
        var id;
        var title;
        var code;
        var quantity;
        var active;
        var discount_amount;
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus');
        });
        $(document).ready(function(){
            $('#tb1 tr').click(function (e) {
                id = $(this).closest('.onRow').find('td:nth-child(1)').text();
                title = $(this).closest('.onRow').find('td:nth-child(2)').text();
                code = $(this).closest('.onRow').find('td:nth-child(3)').text();
                quantity = $(this).closest('.onRow').find('td:nth-child(4)').text();
                discount_amount = $(this).closest('.onRow').find('td:nth-child(5)').text();
                active = $(this).closest('.onRow').find('td:nth-child(6)').text();
                $('.id').val(id);
                $('.title').val(title);
                $('.code').val(code);
                $('.quantity').val(quantity);
                $('.active').val(active);
                $('.discount_amount').val(discount_amount);
            });
        });
    </script>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">edit coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="myForm" role="form" method="post"  action="{{ url('/admin/coupons/update') }}">
                        {{csrf_field()}}
                        <input class="form-control id" type="hidden" placeholder="Coupon id" name="id">
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control title" placeholder="Coupon title" name="title">
                        </div>
                        <div class="form-group">
                            <label>Code</label>
                            <input class="form-control code" placeholder="Coupon title" name="code">
                        </div>
                        <div class="form-group">
                            <label>quantity</label>
                            <input class="form-control quantity" type="number" placeholder="quantity title" name="quantity">
                        </div>
                        <div class="form-group">
                            <label>discount amount</label>
                            <input class="form-control" placeholder="discount_amount" name="discount_amount" type="number">
                        </div>
                        <div class="form-group">
                            <label>Active</label>
                            <select name="active" class="active form-control form-control-sm">
                                <option value="1" selected >active</option>
                                <option value="0">inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Save changes</button>
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
            <li class="active">Coupons</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">List coupons</div>
                <div class="panel-body">
                    <div class="col-md-3">
                        <form method="POST" action="{{asset('admin/coupons')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" placeholder="title" name="title">
                            </div>
                            <div class="form-group">
                                <label>Code</label>
                                <input class="form-control" placeholder="code" name="code">
                            </div>
                            <div class="form-group">
                                <label>quantity</label>
                                <input class="form-control" placeholder="quantity" name="quantity" type="number">
                            </div>
                            <div class="form-group">
                                <label>discount amount</label>
                                <input class="form-control" placeholder="discount_amount" name="discount_amount" type="number">
                            </div>
                            <div class="form-group">
                                <label>Active</label>
                                <select class="form-control form-control-sm" name="active">
                                    <option value="1" selected >active</option>
                                    <option value="0">inactive</option>
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
                                <th>Code</th>
                                <th>Quantity</th>
                                <th>Discount Amount</th>
                                <th>Active</th>
                                <th>Option</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($items as $item)
                                <tr class="onRow">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->discount_amount}}</td>
                                    <td>{{$item->active==1?'Active':'Inactive'}}</td>
                                    <td>
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">edit</a>
                                        <a href="{{asset('admin/coupons/delete/'.$item->id)}}">delete</a>
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
