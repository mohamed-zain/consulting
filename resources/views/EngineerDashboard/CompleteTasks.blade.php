@extends('EngineerDashboard.layouts.layout')
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
                    مهندس خير عون
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
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <h3 class="profile-username text-center">@if(isset($Data->name)) {{ $Data->name }} @else {{ auth()->user()->id }} @endif</h3>

                    <p class="text-muted text-center">مهندس خيرعون</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>البريد</b> <a class="pull-left">@if(isset($Data->email)) {{ $Data->email }} @else {{ auth()->user()->email }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>الجوال</b> <a class="pull-left">@if(isset($Data->MobPhone)) {{ $Data->MobPhone }} @else {{ auth()->user()->phone }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b> العنوان</b> <a class="pull-left">@if(isset($Data->Address)) {{ $Data->Address }} @else '' @endif </a>
                        </li>
                    </ul>

                </div>
                <!-- /.box-body -->
            </div>
           @include('EngineerDashboard.layouts.notes')

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            @include('EngineerDashboard.layouts.statsBar')

            <div class="row">
                <div class="col-md-12">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">مهام جديدة</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th> رقم البينار</th>
                                    <th>المشروع</th>
                                    <th>اسم العميل</th>
                                    <th>الملفات</th>
                                    <th> المهمة</th>
                                    <th> موافقة العميل</th>
                                    <th> اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $single)

                                    <tr>
                                        <td><span class="badge bg-yellow ">{{ $single['number'] }}</span></td>
                                        <td><span class="" >{{ $single['FileCode'] }}</span></td>
                                        <td><span class="badge bg-primary ">{{$single['first_name'] }} {{$single['last_name'] }}</span></td>
                                        <td><a class="btn bg-blue-gradient btn-flat " href="{{ url('FilesProject') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($single['number']) }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($single->Mission) }}"  >عرض</a></td>

                                        <td><a class="btn bg-red-active btn-flat " href="#" >  {{ $single->Mission }}</a></td>

                                        <td>
                                            @if($single->Mission == 'E0')
                                            <a href="#" class="btn bg-black btn-flat " data-toggle="modal" data-target="#file{{ $single['number'] }}">استعراض</a>
                                            @else
                                                <span>---------------</span>
                                            @endif

                                                <?php
                                                $pro_aprove = \App\Models\ActivateFile::join('documents','documents.projectID','=','activate_files.Bennar')
                                                    ->join('users','users.id','=','documents.Usr_id')
                                                    ->where('documents.Usr_id',auth()->user()->id)
                                                    ->where('documents.projectID',$single['number'])
                                                    ->get();
                                                ?>
                                                <div class="modal fade" id="file{{ $single['number'] }}" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title"> الملفات المرفقة من طرفك </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table id="" class="table table-bordered table-striped table-responsive example">
                                                                    <thead>
                                                                    <tr>
                                                                        <th> اسم الملف</th>
                                                                        <th>الرابط </th>
                                                                        <th>رفض / قبول </th>
                                                                        <th> سبب الرفض </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($pro_aprove as $items)
                                                                        <tr>
                                                                            <td>{{ $items->DocName }} </td>
                                                                            <td><a href="{{ url('storage/app/public') }}/{{ $items->Docs }}">عرض</a> </td>
                                                                            <td>
                                                                                @if($items->reject_accept == '2')
                                                                                   <a class="btn bg-primary btn-flat " href="#" >تمت موافقة العميل</a>
                                                                                   @elseif($items->reject_accept == '0')
                                                                                       <a class="btn bg-green btn-flat " href="#" > في انتظار الموافقة</a>
                                                                                       @elseif($items->reject_accept == '1')
                                                                                           <a class="btn bg-red btn-flat " href="#" > تم رفض التصميم</a>
                                                                                   @endif
                                                                            </td>
                                                                            <td>
                                                                                @if( $items->reject_accept == '1' )
                                                                                    {{ $items->reject_reason }}
                                                                                @else
                                                                                <span>---------------</span>
                                                                                    @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>

                                                                </table>

                                                            </div>
                                                            <div class="modal-footer">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </td>

                                        <td>
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">إختر إجراء
                                                    <span class="fa fa-caret-down"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" >لا توجد خيارات</a></li>

                                                </ul>
                                            </div>
                                            <div class="modal fade" id="DONE{{ $single['number'] }}" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">ملفات المهمة</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <ul class="mailbox-attachments clearfix">
                                                                    <?php $Docs = App\Models\TasksFile::where('B_Code',$single['number'])->get(); ?>
                                                                    @foreach($Docs as $Single2 )
                                                                        <li>
                                                                            <span class="mailbox-attachment-icon"><a href="#" id="folder{{$Single2->Mission}}"><i class="fa fa-folder-open"></i></a></span>
                                                                            <div class="mailbox-attachment-info">
                                                                                <a href="{{ url('storage/app/public') }}/{{$Single2->FileName}}" target="_blank"  class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>

                                                                                    {{Str::limit($Single2->Mission, 20)}}
                                                                                </a>
                                                                                <span class="mailbox-attachment-size">
                         رقم المشروع {{$Single2->B_Code}}
                                                                                    <a href="#" class="btn btn-default btn-xs pull-right"></a>
                        </span>
                                                                            </div>
                                                                        </li>

                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase"></a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>

            </div>
        </div>
    </div>


@endsection
