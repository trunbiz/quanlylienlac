@extends('admin.Base')
@section('title','Quản lý liên lạc')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản lý liên lạc</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý liên lạc</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="container">
            <div class="panel panel-container container">
                <form class="row" method="get" action="{{asset('admin/contacts')}}">
                    <div class="col-sm-3"><input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại"></div>
                    <div class="col-sm-3"><input type="text" class="form-control" id="fullname" name="fullname" placeholder="Tên"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"><button type="button" class="btn btn-info">Tìm kiếm</button> <a href="{{asset('admin/contacts/store')}}" type="button" class="btn btn-primary">Tạo mới</a></div>
                </form>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Phòng ban</th>
                        <th>Email</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Số điện thoại làm việc</th>
                        <th>Fax</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                        <td>John</td>
                        <td>Doe</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
    </div><!--/.row-->
@stop
