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
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/bb.png') }}" alt="User profile picture" style="margin-right:20%">

                    <h3 class="profile-username text-center">{{ $Data->name }}</h3>

                    <p class="text-muted text-center">مهندس خيرعون</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>البريد</b> <a class="pull-left">{{ $Data->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>الجوال</b> <a class="pull-left">{{ $Data->MobPhone }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>قيمة الاشتراك</b> <a class="pull-left"> {{ $Data->Address }}  </a>
                        </li>
                    </ul>

                </div>
                <!-- /.box-body -->
            </div>

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="col-md-4">
                <a href="{{url('UpdateProfile')}}" class="btn btn-app" style="">
                    <i class="fa fa-user fa-3x"  style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>الملف الشخصي
                </a>
            </div>
            <div class="col-md-4" style="align-items: center;">

                <a href="{{url('InCompleteTasks')}}" class="btn btn-app">

                    <i class="fa fa-list fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>  المهام الغير منجزة
                </a>
            </div>
            <div class="col-md-4" style="align-items: center;">

                <a href="{{url('CompleteTasks')}}" class="btn btn-app">
                    <i class="fa fa-edit fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i> مهام منجزة
                </a>
            </div>
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
                                    <th>  الباقة</th>
                                    <th>اسم العميل</th>
                                    <th> الايميل</th>
                                    <th> الجوال</th>
                                    <th>الدولة</th>
                                    <th> المهمة</th>
                                    <th> موافقة العميل</th>
                                    <th> اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $single)
                                    <?php $RQ = DB::table('out_design_required')
                                        ->where('yourfilenumber',$single['number'])
                                        ->first(); ?>
                                    <tr>
                                        <td><span class="badge bg-yellow ">{{ $single['number'] }}</span></td>
                                        <td><span class="badge bg-red-gradient ">{{ $single['name'] }}</span></td>
                                        <td><span class="badge bg-primary ">{{$single['first_name'] }} {{$single['last_name'] }}</span></td>
                                        <td>  <span>{{ $single['email'] }} </span></td>
                                        <td>  <span>{{ $single['phone'] }} </span></td>
                                        <td>  <span>{{ $single['country'] }} </span></td>
                                        <td><a class="btn bg-red-active btn-flat " href="#" >  {{ $single->Mission }}</a></td>

                                        <td>
                                            @if($single->TaskAccept == 'yes')
                                            <a class="btn bg-primary btn-flat " href="#" >تمت موافقة العميل</a>
                                            @elseif($single->TaskAccept == 'hold')
                                                <a class="btn bg-green btn-flat " href="#" > في انتظار الموافقة</a>
                                                @elseif($single->TaskAccept == 'reject')
                                                    <a class="btn bg-red btn-flat " href="#" > تم رفض التصميم</a>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">إختر إجراء
                                                    <span class="fa fa-caret-down"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#"  data-toggle="modal" data-target="#DONE{{ $single['number'] }}">عرض ملفات المهمة</a></li>

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
