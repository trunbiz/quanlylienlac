@extends('admin.Base')
@section('title','Danh sách Blog')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Blog</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Blog</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{asset('admin/blog/add')}}">Add Blog</a>
                </div>
                <div class="panel-body">

                    <table id="tb1" class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Describe</th>
                            <th>Img</th>
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
                                <td><img class="thumbnail" width="100px" src="{{isset($item->img)?asset('public/media/'.$item->img):asset('public/images/logo.png')}}" ></td>
                                <td>{{$item->status==1?'Hiện thị':'Ẩn'}}</td>
                                <td>
                                    <a href="{{asset('admin/blog/update/'.$item->id)}}">Edit</a>
                                    <a href="{{asset('admin/blog/delete/'.$item->id)}}">Delete</a>
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
