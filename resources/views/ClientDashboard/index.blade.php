@extends('ClientDashboard.layouts.layout')
@section('content')
    <style>
        .btn-app{
            width: 100%;
            height: 200px;
            color: #e39548;
            border: solid 2px #e39548;
        }

        #dsaf{
            width: 520px;
            height: 200px;
            border: 4px dashed #001f3f ;
        }
        #dsaf > p{
            width: 100%;
            height: 100%;
            text-align: center;
            line-height: 170px;
            color: black;
            font-family: Arial;
        }
        #frt {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 50%;
            outline: none;
            opacity: 0;
        }


    </style>
    <div class="">
        <section class="content-header">
            <div class="">
                <h3>
                   عميل خير عون
                    <small> برنامج خيرعون لإدارة الخدمات الهندسية </small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('EngineerDashboard') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </ol>
            </div>
        </section>
    </div>

    <div class="col-md-12">
        <div class="col-md-3">
            <!-- Profile Image -->
            @include('ClientDashboard.layouts.aside')
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">ملفات مراحل المشروع - <code>يمكنك عرض ملفات التصميم والموافقة عليها او الرفض او التعديل</code> </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="row">
                                <ul class="mailbox-attachments clearfix">
                                    <?php $Docs = App\Models\ProjectServices::where('Bennar_Code',$Data->Bennar)->get(); ?>
                                    @foreach($Docs as $Single )
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <li>
                                                <span class="mailbox-attachment-icon">
                                                    <a href="{{ url('ClientListFiles') }}/{{ $Single->ServiceCode }}/{{ $Data->Bennar }}" ><i class="fa fa-folder-open"></i></a>
                                                </span>
                                                <div class="mailbox-attachment-info">
                                                    <a href="{{ url('ClientListFiles') }}/{{ $Single->ServiceCode }}/{{ $Data->Bennar }}"  class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                                        {{Str::limit($Single->ServiceID, 20)}}
                                                    </a>
                                                    <span class="mailbox-attachment-size">
                                                          رمز المرحلة {{$Single->ServiceCode}}
                                                <a href="{{ url('ClientListFiles') }}/{{ $Single->ServiceCode }}/{{ $Data->Bennar }}"  class="btn btn-default btn-xs pull-right"></a>
                                                   </span>
                                                </div>
                                            </li>
                                        </div>
                                            <div class="modal fade" id="folder{{ $Single['ServiceCode'] }}" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">ملفات - {{$Single->ServiceCode}} - {{$Single->ServiceID}} </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <?php
                                                                    $file = \App\Models\Documents::
                                                                    where('projectID',$Data->Bennar)
                                                                        ->where('mission',$Single['ServiceCode'])
                                                                        ->get();
                                                                    ?>
                                                                    @if($file)
                                                                    @foreach($file as $item)

                                                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                                                <li>
                                                                                    <span class="mailbox-attachment-icon">
                                                                                        <a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" ><i class="fa fa-file-pdf-o"></i></a>
                                                                                    </span>
                                                                                    <div class="mailbox-attachment-info">
                                                                                        <a href="{{ url('storage/app/public') }}/{{ $item->Docs }}"  class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                                                                            {{Str::limit($item->DocName, 30)}}
                                                                                        </a>
                                                                                        <span class="mailbox-attachment-size">
                                                                                                  تفاصيل  {{$item->Docdetails}}
                                                                                        <a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" class="btn btn-default btn-xs pull-right"></a>
                                                                                           </span>
                                                                                    </div>
                                                                                </li>
                                                                            </div>
                                                                        @endforeach

                                                                        @else
                                                                    <span style="color: red">لا توجد ملفات</span>
                                                                        @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <li>
                                        <span class="mailbox-attachment-icon">
                                            <a href="#" id="folder"><i class="fa fa-folder-open"></i></a>
                                        </span>
                                                <div class="mailbox-attachment-info">
                                                    <a href="#" data-toggle="modal" data-target="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                                        {{Str::limit('ملفات اخري', 30)}}
                                                    </a>
                                                    <span class="mailbox-attachment-size">
                          ملفات المشروع
                                                <a href="#" class="btn btn-default btn-xs pull-right"></a>
                        </span>
                                                </div>
                                            </li>
                                        </div>
                                </ul>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">خير عون - 2020</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>

            </div>
        </div>
    </div>


@endsection
