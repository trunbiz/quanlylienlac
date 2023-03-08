@extends('admin.Base')
@section('title','Quản lý nguời dùng')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản lý nguời dùng</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý nguời dùng</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="container">
            <div class="panel panel-container container">
                <form class="row" method="get" action="{{asset('admin/users')}}">
                    <div class="col-sm-3"><input type="text" class="form-control" id="search" name="search"
                                                 placeholder="Tìm kiếm"></div>
                    <div class="col-sm-9" style="text-align: right">
                        <button class="btn btn-info">Tìm kiếm</button>
                        <a href="{{asset('admin/users/store')}}" type="button" class="btn btn-primary">Tạo mới</a>
                    </div>
                </form>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Quyền</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->group_id}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a href="{{asset('admin/users/edit?id='. $item->id)}}" class="btn btn-info">Sửa</a>
                                <a href="{{asset('admin/users/delete?id='. $item->id)}}" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $items->links() }}
            </div>
        </div>
    </div>
    <div class="row">
    </div><!--/.row-->
@stop
