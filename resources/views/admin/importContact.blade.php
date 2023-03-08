@extends('admin.Base')
@section('title','Import file')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Import file</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Import file</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Import file</div>
                <div class="panel-body">
                    <form method="POST" role="form" enctype="multipart/form-data"
                          action="{{asset('admin/contacts/import')}}">
                        {{csrf_field()}}
                        <div class="form-group col-sm-8">
                            <label>Import file</label>
                            <input class="form-control" placeholder="File" name="fileExcel" type="file"
                                   value="">
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-lg btn-primary">Thêm</button>
                            <a href="{{asset('admin/contacts/template-import')}}" class="btn btn-lg btn-link">Download template</a>
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
