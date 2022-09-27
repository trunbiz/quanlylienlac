@extends('admin.Base')
@section('title','Danh sách Blog')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Detail Cart</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Detail Cart</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="tb1" class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="onRow">
                                <td scope="row">Mã hóa đơn</td>
                                <td>{{$itemCart[0]->id}}</td>
                            </tr>
                            <tr class="onRow">
                                <td scope="row">Ngày tạo</td>
                                <td>{{$itemCart[0]->created_at}}</td>
                            </tr>
                            <tr class="onRow">
                                <td scope="row">Người mua hàng</td>
                                <td>{{$itemCart[0]->username}}</td>
                            </tr>
                            <tr class="onRow">
                                <td scope="row">Điện thoại</td>
                                <td>{{$itemCart[0]->phone}}</td>
                            </tr>
                            <tr class="onRow">
                                <td scope="row">Địa chỉ</td>
                                <td>{{$itemCart[0]->address}}</td>
                            </tr>
                            <tr class="onRow">
                                <td scope="row">Email</td>
                                <td>{{$itemCart[0]->email}}</td>
                            </tr>
                            <tr class="onRow">
                                <td scope="row">Total</td>
                                <td>{{$itemCart[0]->total}}</td>
                            </tr>
                            <tr class="onRow">
                                <td scope="row">Status Cart</td>
                                <td><a class="btn btn-info" href="{{asset('admin/cart/update/'.$itemCart[0]->id.'/'.($itemCart[0]->status==1?'0':'1'))}}">{{$itemCart[0]->status==1?'Chưa giao hàng':'Đã giao hàng'}}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="tb1" class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID Product</th>
                            <th>Count</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="onRow">
                                <td scope="row">{{$item->id}}</td>
                                <td>{{$item->countsale}}</td>
                                <td>{{$item->pricesale}}</td>
                                <td>{{$item->size}}</td>
                                <td>{{$item->color}}</td>
                                <td>{{$item->countsale*$item->pricesale}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
        <div class="col-sm-12">
            <p class="back-link">Render Theme by <a href="https://kipo.vn">Kipo</a></p>
        </div>
    </div><!-- /.row -->
@stop
