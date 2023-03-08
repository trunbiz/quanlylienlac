@extends('admin.Base')
@section('title','Thông tin liên lạc')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Thông tin liên lạc</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin liên lạc</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Contact</div>
                <div class="panel-body">
                    <form method="POST" role="form" enctype="multipart/form-data"
                          action="{{empty($item) ? asset('admin/contacts/store') : asset('admin/contacts/update')}}">
                        {{csrf_field()}}
                        <input class="form-control" placeholder="id" name="id" type="hidden"
                               value="{{isset($item->id)?$item->id:''}}">
                        <div class="form-group col-sm-8">
                            <label>Phòng ban</label>
                            <select class="form-control" id="sel1" name="team_id">
                                @foreach($teams as $team)
                                    <option value="{{$team->id}}" {{(!empty($item) && ($item->team_id == $team->id)) ? 'selected' : ''}}>{{$team->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Họ tên</label>
                            <input class="form-control" placeholder="Họ và tên" name="full_name"
                                   value="{{isset($item->full_name)?$item->full_name:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="email" name="email"
                                   value="{{isset($item->email)?$item->email:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Số điện thoại cá nhân</label>
                            <input class="form-control" type="text" placeholder="Phone" name="phone"
                                   value="{{isset($item->phone)?$item->phone:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Số điện thoại cơ quan</label>
                            <input class="form-control" type="text" placeholder="Số điện thoại cơ quan"
                                   name="word_phone"
                                   value="{{isset($item->word_phone)?$item->word_phone:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Fax</label>
                            <input class="form-control" type="text" placeholder="Fax" name="fax"
                                   value="{{isset($item->fax)?$item->fax:''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Ngày sinh</label>
                            <input class="form-control" type="date" placeholder="birthday" name="birthday"
                                   value="{{isset($item->birthday)? date('Y-m-d', strtotime($item->birthday)):''}}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Đỉa chỉ</label>
                            <input class="form-control" type="text" placeholder="address" name="address"
                                   value="{{isset($item->address)?$item->address:''}}">
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <button class="btn btn-lg btn-primary">{{empty($item) ? 'Thêm mới' : 'Cập nhật'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Render Theme by <a href="https://kipo.vn">Render</a></p>
    </div>
    </div><!-- /.row -->
@stop
