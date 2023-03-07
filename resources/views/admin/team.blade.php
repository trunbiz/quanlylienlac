@extends('admin.Base')
@section('title','Quản lý')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản lý phòng ban</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý phòng ban</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="container">
            <div class="panel panel-container container">
                <form class="row" method="get" action="{{asset('admin/teams')}}">
                    <div class="col-sm-3"><input type="text" class="form-control" id="search" name="search" placeholder="Tên hoặc mã phòng ban"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"><button class="btn btn-info">Tìm kiếm</button> <a href="{{asset('admin/teams/store')}}" type="button" class="btn btn-primary">Tạo mới</a></div>
                </form>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Tên phòng ban</th>
                        <th>Mô tả</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td><a href="{{asset('admin/teams/edit?id='. $item->id)}}" class="btn btn-info">Sửa</a>
                            <a href="{{asset('admin/teams/delete?id='. $item->id)}}" class="btn btn-danger">Xóa</a>
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
