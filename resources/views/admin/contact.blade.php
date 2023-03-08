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
                    <div class="col-sm-3"><input type="text" class="form-control" id="phone" name="phone"
                                                 placeholder="Số điện thoại"></div>
                    <div class="col-sm-3"><input type="text" class="form-control" id="full_name" name="full_name"
                                                 placeholder="Tên"></div>
                    <div class="col-sm-6" style="text-align: right">
                        <button class="btn btn-info">Tìm kiếm</button>
                        <a href="{{asset('admin/contacts/store')}}" type="button" class="btn btn-primary">Tạo mới</a>
                        <button type="button" class="btn btn-primary" onclick="exportData()">Xuất excel</button>
                        <a href="{{asset('admin/contacts/import')}}" class="btn btn-success">Import file</a>
                    </div>
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
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->team->title}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->full_name}}</td>
                            <td>{{$item->birthday}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->word_phone}}</td>
                            <td>{{$item->fax}}</td>
                            <td>
                                <a href="{{asset('admin/contacts/edit?id='. $item->id)}}" class="btn btn-info">Sửa</a>
                                <a href="{{asset('admin/contacts/delete?id='. $item->id)}}" class="btn btn-danger">Xóa</a>
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
    <script>
        function exportData() {
            var phone = document.getElementById('phone').value;
            var full_name = document.getElementById('full_name').value;
            var params = 'phone=' + phone + '&full_name=' + full_name;
            console.log(111, params)
            {{--location.replace("{{asset('admin/contacts/download?')}}" + params)--}}
            window.open("{{asset('admin/contacts/download?')}}" + params, '_blank');
        }
    </script>
@stop
