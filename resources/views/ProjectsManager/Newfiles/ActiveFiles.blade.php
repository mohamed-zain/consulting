@extends('ProjectsManager.layout')
@section('content')

    <div class="col-md-12">
        <h3>ادارة القبول  <small> الملفات النشطة </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>   الملفات المفعلة </a></li>

        </ol>
    </div>

    <div class="row">
        <!-- /.col -->

        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"> ملفات مفعلة</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div class="" style="margin-bottom: 20px">
                    </div>
                    <div class="col-xs-12 table-responsive" >
                        <ul class="mailbox-attachments clearfix">
                            @foreach($orders as $Single )
                                <li>
                                    <span class="mailbox-attachment-icon"><i class="far fa-file-pdf" style="color: #D65F0F"></i></span>
                                    <div class="mailbox-attachment-info">
                                        <a href="" class="mailbox-attachment-name" target="_blank">
                                            <i class="fa fa-paperclip"></i>
                                            {{$Single->Name}}
                                        </a>
                                        <span class="mailbox-attachment-size">
                          {{ $Single->FileCode }}

                        </span>
                                    </div>
                                </li>
                            @endforeach



                        </ul>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    @endsection