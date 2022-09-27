@extends('admin.Base')
@section('title','Danh sách Blog')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Cart</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cart</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <table id="tb1" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Cart Id</th>
                            <th>Date</th>
                            <th>Buyer</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="onRow">
                                <td scope="row">{{$item->id}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->total}}</td>
                                <td>{{$item->status==1?'Chưa giao hàng':'Đã giao hàng'}}</td>
                                <td>{{$item->pay=='SUCCESS'?'Đã thanh toán':'Chưa thanh toán'}}</td>
                                <td>
                                    <a href="{{asset('admin/cart/detail/'.$item->id)}}">Detail</a>
                                    <a href="{{asset('admin/cart/delete/'.$item->id)}}">Delete</a>
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
