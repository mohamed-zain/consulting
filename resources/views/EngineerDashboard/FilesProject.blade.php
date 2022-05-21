@extends('EngineerDashboard.layouts.layout')
@section('content')
{{--    <div class="notify bottom-right do-show" data-notification-status="success" style="direction: rtl;">--}}
{{--<p>ملاحظة : الملفات المقبولة هي بالصيغ التالية</p>--}}
{{--        <ul>--}}
{{--                <li>PDF</li>--}}
{{--                <li>JPG</li>--}}
{{--                <li>RVT</li>--}}
{{--                <li>DWG</li>--}}
{{--        </ul>--}}

{{--    </div>--}}
    <style>
        .btn-app{
            width: 100%;
            height: 200px;
            color: #e39548;
            border: solid 2px #e39548;
        }
        .users-list>li {
            width: 33%;
            float: right;
        }


        .stepwizard-step p {
            margin-top: 0px;
            color:#666;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }
        .stepwizard-step button[disabled] {
            /*opacity: 1 !important;
            filter: alpha(opacity=100) !important;*/
        }
        .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
            opacity:1 !important;
            color:#bbb;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content:" ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 50%;
        }
        .stp {
            border-radius: 50% !important;
            padding: 6px 2px !important;
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
           {{-- <div class="box box-primary">
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
            </div>--}}
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">فريق عمل المشروع</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        @foreach($tsk as $team)
                            <?php

                            $eng = App\Models\Tasks::join('users','users.id','=','tasks.EmpID')
                            ->where('Mission','=',$team->ServiceCode)
                            ->where('Bennar_Code','=',$bennar)
                                ->first();
                            //dd($eng);
                            ?>
                        <li>
                            <img src="{{ asset('dist/architect.png') }}" alt="User Image">
                            <a class="users-list-name" href="#">@if(isset($eng)) <small>{{ $eng->name }}</small> @else <span style="color: red">لم يتم تحديده</span> @endif</a>
                            <span class="users-list-date">{{ $team->ServiceCode }}</span>
                            @if($team->status == 'yes')
                            <span class="label label-success">تم الانجاز</span>
                            @else
                                <span class="label label-danger">لم يتم الانجاز</span>
                                @endif
                        </li>
                            @endforeach


                    </ul><!-- /.users-list -->
                </div><!-- /.box-body -->
                {{--<div class="box-footer text-center">
                    <a href="#" class="uppercase" id="">فتح دردشة في المشروع</a>
                </div>--}}

            </div>
            <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">دردشة في المشروع</h3>
                    <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts"><i class="fa fa-comments"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->


                        @livewire('show', ['messages' => $messages, 'bennar' => $bennar])


            </div>


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            @include('EngineerDashboard.layouts.statsBar')

            <div class="">
                <div class="box box-default" style="height: 207px ">
                    <div class="box-header with-border">
                        <h3 class="box-title"> مهامك الفرعية للمشروع {{ $proc }} </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <?php

                    $main = DB::table('main_stage')->where('StageCode',$mission)->first();
                    $sub =  DB::table('main_sub_stage')->where('main_stage',$main->id)->get();
                    //$Ser = \App\Models\ProjectServices::where('Bennar_Code',$bennar)->get();
                    // dd($sub);
                    ?>
                    <div class="box-body" style="padding-top: 50px">
                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                @foreach($sub  as $key =>$item78)
                                    <?php $sub2 = DB::table('project_services_sub')
                                        ->where('sub_bennar','=',$bennar)
                                        ->where('sub_main','=',$mission)
                                        ->where('sub_code','=',$item78->SubCode)
                                        ->first();
                                    //dd($sub);
                                    ?>
                                    <div class="stepwizard-step col-xs-1.5">
                                        <a href="#step-1" type="button" class="@if(isset($sub2)) btn btn-warning @elseif(!isset($sub2) ) btn btn-danger @else btn btn-default @endif btn-circle stp" >
                                            @if(isset($sub2)) <i class="fa fa-check"></i> @else {{ $item78->SubCode }} @endif</a>
                                        <p><small>{{ $item78->SubName }}</small></p>
                                        @if(!isset($sub2))<p><small><code>غير منجزة</code></small></p>@endif
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="row" id="repodrop">
                <div class="col-md-12">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <?php
                            $E0Stat = \App\Models\Documents::where('projectID',$bennar)->where('mission','E0')->first();
                            if (isset($E0Stat)){
                                if ($E0Stat->reject_accept == '0'){
                                    $e0 = "<span class='text-yellow'>في انتظار التعميد</span>";
                                }elseif($E0Stat->reject_accept == '2'){
                                    $e0 = "<span class='text-green'>تم تعميد المعماري</span>";
                                }elseif($E0Stat->reject_accept == '1'){
                                    $e0 = "<span class='text-red'>لم يتم تعميد المعماري</span>";
                                }else{
                                    $e0 = "<span class='text-aqua'>لا يوجد ملف معماري</span>";
                                }

                            }else{
                                $e0 = "<span class='text-aqua'>لا يوجد ملف معماري</span>";
                            }
                            ?>
                            <h3 class="box-title">ملفات المشروع - حالة المعماري - {!! $e0 !!}  </h3>
                                @if($m->Status == 'onprogress' || $m->TaskDone == 'yes')
                                    <?php $reqDesign = DB::table('out_design_required')->where('fileNumber',$bennar)->first(); ?>
                                        <div class="box-tools pull-right">
                                            <button data-toggle="modal" data-target="#Modal3333" class="btn btn-danger pull-left" id="Modal3333id">إضافة ملف مهمة</button>
                                        </div>
                               {{-- @if(isset($reqDesign))
                                    <div class="box-tools pull-right">
                                        <button data-toggle="modal" data-target="#Modal3333" class="btn btn-danger pull-left" id="Modal3333id">إضافة ملف مهمة</button>
                                    </div>
                                        @else

                                            <div class="box-tools pull-right">
                                                <button  class="btn btn-danger pull-left" id="Modal3333id"  onclick='swal("عفوا", "لا يوجد متطلبات تصميم للمشروع الرجاء التواصل مع العميل لتعبئة متطلبات التصميم", "error") ;
                                                var audio = document.getElementById("audioError");
                                                audio.play();'>إضافة ملف مهمة</button>
                                            </div>
                                        @endif--}}
                                @else
                                    <div class="box-tools pull-right">
                                        <button  class="btn btn-danger pull-left" id="Modal3333id"  onclick='swal("عفوا", "لا يمكنك رفع الملفات اذا كانت المهمة غير مفعلة", "error") ;
                                    var audio = document.getElementById("audioError");
                                    audio.play();'>إضافة ملف مهمة</button>
                                    </div>

                                @endif

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <?php $Ser = \App\Models\ProjectServices::where('Bennar_Code',$bennar)->get(); ?>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs pull-right">

                                    @foreach($Ser as $item45)
                                        <li class="@if($item45->ServiceCode=='E0' or $item45->ServiceCode=='S0') active @endif"><a href="#{{ $bennar }}{{ $item45->ServiceCode }}" data-toggle="tab">{{ $item45->ServiceCode }}</a></li>
                                    @endforeach
                                    <li class=""><a href="#{{ $bennar }}prFiles" data-toggle="tab">ملفات من العميل</a></li>
                                </ul>
                                <div class="tab-content">

                                    @foreach($Ser as $item88)
                                        <div class="tab-pane @if($item88->ServiceCode=='E0' or $item88->ServiceCode=='S0') active @endif" id="{{ $bennar }}{{ $item88->ServiceCode }}"  style="min-height: 300px">
                                            <?php
                                            $chart = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','1')->get();
                                            $facade = \App\Models\Documents::where('projectID',$bennar)->where('mission','E0')->where('cat','5')->get();
                                            $Reports = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','2')->get();
                                            $Recomends = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','3')->get();
                                            $interior10 = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','10')->get();
                                            $interior11 = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','11')->get();
                                            $interior12 = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','12')->get();
                                            $interior13 = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','13')->get();
                                            $interior14 = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','14')->get();
                                            $interior15 = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','15')->get();
                                            $interior16 = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','16')->get();

                                            ?>
                                            <div class="nav-tabs-custom">
                                                <ul class="nav nav-tabs">
                                                    @if($item88->ServiceCode == 'S3')
                                                        <li class="active"><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_10" data-toggle="tab"> Mood Board</a></li>
                                                        <li class=""><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_11" data-toggle="tab"> المخططات المعتمدة</a></li>
                                                        <li class=""><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_12" data-toggle="tab"> ملفات الاستاندرد</a></li>
                                                        <li class=""><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_13" data-toggle="tab"> التصميم الداخلي</a></li>
                                                        <li class=""><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_14" data-toggle="tab"> تصميم الاثات</a></li>
                                                        <li class=""><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_15" data-toggle="tab"> المخططات التنفيذية</a></li>
                                                        <li class=""><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_16" data-toggle="tab"> ملفات الكميات</a></li>
                                                        @else
                                                    <li class="active"><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_1" data-toggle="tab"> المخططات</a></li>
                                                    @if($item88->ServiceCode == 'E0')
                                                    <li><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_4" data-toggle="tab"> الواجهات</a></li>
                                                    @endif
                                                    <li><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_2" data-toggle="tab">تقارير الكميات</a></li>
                                                    <li><a href="#{{ $bennar }}{{ $item88->ServiceCode }}tab_3" data-toggle="tab">التوصيات</a></li>
                                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-file-alt"></i></a></li>
                                                    @endif
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_1">
                                                        <ul class="mailbox-attachments clearfix">
                                                        @foreach($chart as $it)
                                                                <?php
                                                                $infoPath = pathinfo(public_path($it->Docs));
                                                                $extension = $infoPath['extension'];
                                                                if ($extension == 'pdf'){
                                                                    $icon = 'fa fa-file-pdf-o';
                                                                    $color = 'red';
                                                                }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                    $icon = 'fa fa-picture-o';
                                                                    $color = 'cadetblue';
                                                                }elseif ($extension == 'dwg'){
                                                                    $icon = 'fa fa-file-code-o';
                                                                    $color = 'violet';
                                                                }elseif ($extension == 'xls'){
                                                                    $icon = 'fa fa-excel-o';
                                                                    $color = 'darkcyan';
                                                                }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                    $icon = 'fa fa-file-archive-o';
                                                                    $color = 'seagreen';
                                                                }else{
                                                                    $icon = 'fa fa-file';
                                                                    $color = 'seagreen';
                                                                }
                                                                ?>
                                                            <li>
                                                                <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                <div class="mailbox-attachment-info">
                                                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it->DocName, 40)}}</a>
                                                                    <span class="mailbox-attachment-size">
                                                                      {{ date('F d, Y', strtotime($it->created_at)) }}
                                                                        <br>
                                                                       @if($it->mission == 'E0')
                                                                            @if($it->reject_accept == '2')
                                                                                <span class="text-green">تم تعميد هذا الملف</span>
                                                                            @endif
                                                                            @if($it->reject_accept == '1')
                                                                                <span class="text-red">تم رفض هذا الملف</span>
                                                                            @endif
                                                                            @if($it->reject_accept == '0')
                                                                                <span class="text-yellow">في انتظار التعميد</span>
                                                                            @endif
                                                                        @endif
                                                                      <a href="{{ url('storage/app/public') }}/{{$it->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>

                                                                </div>
                                                            </li>

                                                        @endforeach
                                                        </ul>
                                                    </div><!-- /.tab-pane -->
                                                    @if($item88->ServiceCode == 'S3')
                                                        <div class="tab-pane" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_10">
                                                            <ul class="mailbox-attachments clearfix">
                                                                @foreach($interior10 as $it2)
                                                                    <?php
                                                                    $infoPath = pathinfo(public_path($it2->Docs));
                                                                    $extension = $infoPath['extension'];
                                                                    if ($extension == 'pdf'){
                                                                        $icon = 'fa fa-file-pdf-o';
                                                                        $color = 'red';
                                                                    }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                        $icon = 'fa fa-picture-o';
                                                                        $color = 'cadetblue';
                                                                    }elseif ($extension == 'dwg'){
                                                                        $icon = 'fa fa-file-code-o';
                                                                        $color = 'violet';
                                                                    }elseif ($extension == 'xls'){
                                                                        $icon = 'fa fa-excel-o';
                                                                        $color = 'darkcyan';
                                                                    }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                        $icon = 'fa fa-file-archive-o';
                                                                        $color = 'seagreen';
                                                                    }else{
                                                                        $icon = 'fa fa-file';
                                                                        $color = 'seagreen';
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                        <div class="mailbox-attachment-info">
                                                                            <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it2->DocName, 40)}}</a>
                                                                            <span class="mailbox-attachment-size">
                                                                      {{$it2->created_at}}
                                                                      <a href="{{ url('storage/app/public') }}/{{$it2->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                        </div>
                                                                    </li>

                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_11">
                                                            <ul class="mailbox-attachments clearfix">
                                                                @foreach($interior11 as $it2)
                                                                    <?php
                                                                    $infoPath = pathinfo(public_path($it2->Docs));
                                                                    $extension = $infoPath['extension'];
                                                                    if ($extension == 'pdf'){
                                                                        $icon = 'fa fa-file-pdf-o';
                                                                        $color = 'red';
                                                                    }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                        $icon = 'fa fa-picture-o';
                                                                        $color = 'cadetblue';
                                                                    }elseif ($extension == 'dwg'){
                                                                        $icon = 'fa fa-file-code-o';
                                                                        $color = 'violet';
                                                                    }elseif ($extension == 'xls'){
                                                                        $icon = 'fa fa-excel-o';
                                                                        $color = 'darkcyan';
                                                                    }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                        $icon = 'fa fa-file-archive-o';
                                                                        $color = 'seagreen';
                                                                    }else{
                                                                        $icon = 'fa fa-file';
                                                                        $color = 'seagreen';
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                        <div class="mailbox-attachment-info">
                                                                            <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it2->DocName, 40)}}</a>
                                                                            <span class="mailbox-attachment-size">
                                                                      {{$it2->created_at}}
                                                                      <a href="{{ url('storage/app/public') }}/{{$it2->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                        </div>
                                                                    </li>

                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_12">
                                                            <ul class="mailbox-attachments clearfix">
                                                                @foreach($interior12 as $it2)
                                                                    <?php
                                                                    $infoPath = pathinfo(public_path($it2->Docs));
                                                                    $extension = $infoPath['extension'];
                                                                    if ($extension == 'pdf'){
                                                                        $icon = 'fa fa-file-pdf-o';
                                                                        $color = 'red';
                                                                    }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                        $icon = 'fa fa-picture-o';
                                                                        $color = 'cadetblue';
                                                                    }elseif ($extension == 'dwg'){
                                                                        $icon = 'fa fa-file-code-o';
                                                                        $color = 'violet';
                                                                    }elseif ($extension == 'xls'){
                                                                        $icon = 'fa fa-excel-o';
                                                                        $color = 'darkcyan';
                                                                    }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                        $icon = 'fa fa-file-archive-o';
                                                                        $color = 'seagreen';
                                                                    }else{
                                                                        $icon = 'fa fa-file';
                                                                        $color = 'seagreen';
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                        <div class="mailbox-attachment-info">
                                                                            <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it2->DocName, 40)}}</a>
                                                                            <span class="mailbox-attachment-size">
                                                                      {{$it2->created_at}}
                                                                      <a href="{{ url('storage/app/public') }}/{{$it2->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                        </div>
                                                                    </li>

                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_13">
                                                            <ul class="mailbox-attachments clearfix">
                                                                @foreach($interior13 as $it2)
                                                                    <?php
                                                                    $infoPath = pathinfo(public_path($it2->Docs));
                                                                    $extension = $infoPath['extension'];
                                                                    if ($extension == 'pdf'){
                                                                        $icon = 'fa fa-file-pdf-o';
                                                                        $color = 'red';
                                                                    }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                        $icon = 'fa fa-picture-o';
                                                                        $color = 'cadetblue';
                                                                    }elseif ($extension == 'dwg'){
                                                                        $icon = 'fa fa-file-code-o';
                                                                        $color = 'violet';
                                                                    }elseif ($extension == 'xls'){
                                                                        $icon = 'fa fa-excel-o';
                                                                        $color = 'darkcyan';
                                                                    }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                        $icon = 'fa fa-file-archive-o';
                                                                        $color = 'seagreen';
                                                                    }else{
                                                                        $icon = 'fa fa-file';
                                                                        $color = 'seagreen';
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                        <div class="mailbox-attachment-info">
                                                                            <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it2->DocName, 40)}}</a>
                                                                            <span class="mailbox-attachment-size">
                                                                      {{$it2->created_at}}
                                                                      <a href="{{ url('storage/app/public') }}/{{$it2->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                        </div>
                                                                    </li>

                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_14">
                                                            <ul class="mailbox-attachments clearfix">
                                                                @foreach($interior14 as $it2)
                                                                    <?php
                                                                    $infoPath = pathinfo(public_path($it2->Docs));
                                                                    $extension = $infoPath['extension'];
                                                                    if ($extension == 'pdf'){
                                                                        $icon = 'fa fa-file-pdf-o';
                                                                        $color = 'red';
                                                                    }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                        $icon = 'fa fa-picture-o';
                                                                        $color = 'cadetblue';
                                                                    }elseif ($extension == 'dwg'){
                                                                        $icon = 'fa fa-file-code-o';
                                                                        $color = 'violet';
                                                                    }elseif ($extension == 'xls'){
                                                                        $icon = 'fa fa-excel-o';
                                                                        $color = 'darkcyan';
                                                                    }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                        $icon = 'fa fa-file-archive-o';
                                                                        $color = 'seagreen';
                                                                    }else{
                                                                        $icon = 'fa fa-file';
                                                                        $color = 'seagreen';
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                        <div class="mailbox-attachment-info">
                                                                            <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it2->DocName, 40)}}</a>
                                                                            <span class="mailbox-attachment-size">
                                                                      {{$it2->created_at}}
                                                                      <a href="{{ url('storage/app/public') }}/{{$it2->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                        </div>
                                                                    </li>

                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_15">
                                                            <ul class="mailbox-attachments clearfix">
                                                                @foreach($interior15 as $it2)
                                                                    <?php
                                                                    $infoPath = pathinfo(public_path($it2->Docs));
                                                                    $extension = $infoPath['extension'];
                                                                    if ($extension == 'pdf'){
                                                                        $icon = 'fa fa-file-pdf-o';
                                                                        $color = 'red';
                                                                    }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                        $icon = 'fa fa-picture-o';
                                                                        $color = 'cadetblue';
                                                                    }elseif ($extension == 'dwg'){
                                                                        $icon = 'fa fa-file-code-o';
                                                                        $color = 'violet';
                                                                    }elseif ($extension == 'xls'){
                                                                        $icon = 'fa fa-excel-o';
                                                                        $color = 'darkcyan';
                                                                    }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                        $icon = 'fa fa-file-archive-o';
                                                                        $color = 'seagreen';
                                                                    }else{
                                                                        $icon = 'fa fa-file';
                                                                        $color = 'seagreen';
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                        <div class="mailbox-attachment-info">
                                                                            <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it2->DocName, 40)}}</a>
                                                                            <span class="mailbox-attachment-size">
                                                                      {{$it2->created_at}}
                                                                      <a href="{{ url('storage/app/public') }}/{{$it2->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                        </div>
                                                                    </li>

                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_16">
                                                            <ul class="mailbox-attachments clearfix">
                                                                @foreach($interior16 as $it2)
                                                                    <?php
                                                                    $infoPath = pathinfo(public_path($it2->Docs));
                                                                    $extension = $infoPath['extension'];
                                                                    if ($extension == 'pdf'){
                                                                        $icon = 'fa fa-file-pdf-o';
                                                                        $color = 'red';
                                                                    }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                        $icon = 'fa fa-picture-o';
                                                                        $color = 'cadetblue';
                                                                    }elseif ($extension == 'dwg'){
                                                                        $icon = 'fa fa-file-code-o';
                                                                        $color = 'violet';
                                                                    }elseif ($extension == 'xls'){
                                                                        $icon = 'fa fa-excel-o';
                                                                        $color = 'darkcyan';
                                                                    }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                        $icon = 'fa fa-file-archive-o';
                                                                        $color = 'seagreen';
                                                                    }else{
                                                                        $icon = 'fa fa-file';
                                                                        $color = 'seagreen';
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                        <div class="mailbox-attachment-info">
                                                                            <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it2->DocName, 40)}}</a>
                                                                            <span class="mailbox-attachment-size">
                                                                      {{$it2->created_at}}
                                                                      <a href="{{ url('storage/app/public') }}/{{$it2->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                        </div>
                                                                    </li>

                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    @if($item88->ServiceCode == 'E0')
                                                    <div class="tab-pane" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_4">
                                                        <ul class="mailbox-attachments clearfix">
                                                            @foreach($facade as $it2)
                                                                <?php
                                                                $infoPath = pathinfo(public_path($it2->Docs));
                                                                $extension = $infoPath['extension'];
                                                                if ($extension == 'pdf'){
                                                                    $icon = 'fa fa-file-pdf-o';
                                                                    $color = 'red';
                                                                }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                    $icon = 'fa fa-picture-o';
                                                                    $color = 'cadetblue';
                                                                }elseif ($extension == 'dwg'){
                                                                    $icon = 'fa fa-file-code-o';
                                                                    $color = 'violet';
                                                                }elseif ($extension == 'xls'){
                                                                    $icon = 'fa fa-excel-o';
                                                                    $color = 'darkcyan';
                                                                }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                    $icon = 'fa fa-file-archive-o';
                                                                    $color = 'seagreen';
                                                                }else{
                                                                    $icon = 'fa fa-file';
                                                                    $color = 'seagreen';
                                                                }
                                                                ?>
                                                                <li>
                                                                    <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                    <div class="mailbox-attachment-info">
                                                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it2->DocName, 40)}}</a>
                                                                        <span class="mailbox-attachment-size">
                                                                      {{$it2->created_at}}
                                                                      <a href="{{ url('storage/app/public') }}/{{$it2->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                    </div>
                                                                </li>

                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    <div class="tab-pane" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_2">
                                                        <ul class="mailbox-attachments clearfix">
                                                        @foreach($Reports as $it2)
                                                                <?php
                                                                $infoPath = pathinfo(public_path($it2->Docs));
                                                                $extension = $infoPath['extension'];
                                                                if ($extension == 'pdf'){
                                                                    $icon = 'fa fa-file-pdf-o';
                                                                    $color = 'red';
                                                                }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                    $icon = 'fa fa-picture-o';
                                                                    $color = 'cadetblue';
                                                                }elseif ($extension == 'dwg'){
                                                                    $icon = 'fa fa-file-code-o';
                                                                    $color = 'violet';
                                                                }elseif ($extension == 'xls'){
                                                                    $icon = 'fa fa-excel-o';
                                                                    $color = 'darkcyan';
                                                                }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                    $icon = 'fa fa-file-archive-o';
                                                                    $color = 'seagreen';
                                                                }else{
                                                                    $icon = 'fa fa-file';
                                                                    $color = 'seagreen';
                                                                }
                                                                ?>
                                                                <li>
                                                                    <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                    <div class="mailbox-attachment-info">
                                                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it2->DocName, 40)}}</a>
                                                                        <span class="mailbox-attachment-size">
                                                                      {{$it2->created_at}}
                                                                      <a href="{{ url('storage/app/public') }}/{{$it2->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                    </div>
                                                                </li>

                                                        @endforeach
                                                        </ul>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                    <div class="tab-pane" id="{{ $bennar }}{{ $item88->ServiceCode }}tab_3">
                                                        <ul class="mailbox-attachments clearfix">
                                                        @foreach($Recomends as $it3)
                                                                <?php
                                                                $infoPath = pathinfo(public_path($it3->Docs));
                                                                $extension = $infoPath['extension'];
                                                                if ($extension == 'pdf'){
                                                                    $icon = 'fa fa-file-pdf-o';
                                                                    $color = 'red';
                                                                }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                    $icon = 'fa fa-picture-o';
                                                                    $color = 'cadetblue';
                                                                }elseif ($extension == 'dwg'){
                                                                    $icon = 'fa fa-file-code-o';
                                                                    $color = 'violet';
                                                                }elseif ($extension == 'xls'){
                                                                    $icon = 'fa fa-excel-o';
                                                                    $color = 'darkcyan';
                                                                }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                    $icon = 'fa fa-file-archive-o';
                                                                    $color = 'seagreen';
                                                                }else{
                                                                    $icon = 'fa fa-file';
                                                                    $color = 'seagreen';
                                                                }
                                                                ?>
                                                                <li>
                                                                    <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                                    <div class="mailbox-attachment-info">
                                                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it3->DocName, 40)}}</a>
                                                                        <span class="mailbox-attachment-size">
                                                                            {{ date('F d, Y', strtotime($it3->created_at)) }}

                                                                      <a href="{{ url('storage/app/public') }}/{{$it3->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                    </div>
                                                                </li>

                                                        @endforeach
                                                        </ul>
                                                    </div><!-- /.tab-pane -->
                                                </div><!-- /.tab-content -->
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="tab-pane" id="{{ $bennar }}prFiles" style="min-height: 300px">
                                        <?php $tts = \App\Models\Documents::where('projectID',$bennar)
                                                                    ->where('for_eng','1')
                                                                    ->where('mission',null)
                                                                    ->where('cat',null)
                                            ->get();
                                        ?>
                                        @if(isset($tts))
                                            <div class="col-lg-12 table-responsive" >
                                                <ul class="mailbox-attachments clearfix">
                                                    @foreach($tts as $it4)
                                                        <?php
                                                        $infoPath = pathinfo(public_path($it4->Docs));
                                                        $extension = $infoPath['extension'];
                                                        if ($extension == 'pdf'){
                                                            $icon = 'fa fa-file-pdf-o';
                                                            $color = 'red';
                                                        }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                            $icon = 'fa fa-picture-o';
                                                            $color = 'cadetblue';
                                                        }elseif ($extension == 'dwg'){
                                                            $icon = 'fa fa-file-code-o';
                                                            $color = 'violet';
                                                        }elseif ($extension == 'xls'){
                                                            $icon = 'fa fa-excel-o';
                                                            $color = 'darkcyan';
                                                        }elseif ($extension == 'zip' || $extension == 'rar'){
                                                            $icon = 'fa fa-file-archive-o';
                                                            $color = 'seagreen';
                                                        }else{
                                                            $icon = 'fa fa-file';
                                                            $color = 'seagreen';
                                                        }
                                                        ?>
                                                        <li>
                                                            <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                            <div class="mailbox-attachment-info">
                                                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it4->DocName, 40)}}</a>
                                                                <span class="mailbox-attachment-size">
                                                                      {{$it4->created_at}}
                                                                      <a href="{{ url('storage/app/public') }}/{{$it4->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            <center>لا توجد ملفات</center>
                                        @endif
                                    </div>

                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{ url('EngineerDashboard') }}" class="uppercase">رجوع للسابق</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal3333" role="dialog">
        <?php $f = \App\Models\ActivateFile::where('Bennar',$bennar)->first(); ?>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اضافة ملف مهمة جديد للمشروع {{ $f->FileCode }}  </h4>
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> تنبيه !</h4>
                        هل انت متأكد من رقم الملف وتطابقه مع رمز الباقة ، ومحتوى الملف قبل اتمام عملية الرفع حيث ان اختلاف رقم الملف وارسال ملفات خاطئة سيعرض الشركة للحرج امام العميل و ينعكس ذلك سلباً عليك
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="Consend22" method="POST" action="{{ route('Documents.store') }}" enctype="multipart/form-data" >


                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label">اسم الملف </label>
                            <div class="col-sm-8">
                                <input type="text" name="DocName" class="form-control " id="DocName" placeholder="اسم الملف" style="margin-bottom: 9px;" required="required">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label"> المشروع </label>
                            <div class="col-sm-8">
                                <input type="text" value="{{$f->FileCode}}" disabled placeholder="{{$f->FileCode}}" name="ds" class="form-control" id="projectID"  style="margin-bottom: 9px; width: 100%" required="required">
                                <input type="hidden" value="{{$bennar}}" placeholder="" name="projectID" class="form-control" id="projectID"  style="margin-bottom: 9px; width: 100%" required="required">


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label"> المهمة </label>
                            <div class="col-sm-8">
                                <input type="text" disabled name="ew" class="form-control" value="{{ $mission }}" id=""  style="margin-bottom: 9px; width: 100%" required="required">
                                <input type="hidden"  name="mission" class="form-control" value="{{ $mission }}" id="mission"   required="required">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label"> نوع الملف </label>
                            <div class="col-sm-8">

                                <select name="cat" class="form-control select2" id="cat"  style="margin-bottom: 9px; width: 100%" required="required">
                                    @if($mission == 'S3')
                                        <option value="10">Mood Board</option>
                                        <option value="11">المخططات المعتمدة</option>
                                        <option value="12"> ملفات الاستاندرد</option>
                                        <option value="13"> التصميم الداخلي</option>
                                        <option value="14"> تصاميم الاثاث</option>
                                        <option value="15"> المخططات التنفيذية</option>
                                        <option value="16"> ملفات الكميات</option>
                                    @else
                                    <option value="1">المخططات</option>
                                    <option value="2">الكميات</option>
                                    @if($mission == 'E0')
                                        <option value="5">الواجهات</option>
                                    @endif
                                    <option value="3">التوصيات</option>
                                    <option value="4">أخرى</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Docdetails" class="col-sm-4 control-label"  required="required">ملاحظات</label>
                            <div class="col-sm-8">
                                <textarea name="Docdetails" class="form-control" id="Docdetails" placeholder="اكتب ملاحظتك هنا" rows="5" ></textarea>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label">اختر المستند </label>
                            <input type="file" name="Docs" id="filoo" required="required" data-max-file-size="200MB">

                        </div>
                        <button id="Conse123" class="btn btn-success">حفظ</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                    <h3 id="status"></h3>
                    <p id="loaded_n_total"></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const inputElement = document.querySelector('input[type="file"]');
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                url: '{{ url("uploadeTemp") }}',
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
        });
        /********************************************************************/
        /********************************************************************/

        $('#Modal3333id').click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url : "{{ url('RefreshTempFiles') }}",
                data : [] ,
                //dataType: 'json',
                cache:false,
                contentType: false,
                processData: false,

                success  : function(data) {
                },
                error: function(xhr, textStatus, thrownError){
                    // console.log(thrownError);
                    swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                }

            });



        });
        $('#Conse123').click(function () {

            $( "#Consend22" ).on( "submit", function( event ) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                event.preventDefault();

                var myForm = document.getElementById('Consend22');
                var formData = new FormData(myForm);
                var headers = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url : $(this).attr('action'),
                    data : formData ,
                    //dataType: 'json',
                    cache:false,
                    contentType: false,
                    processData: false,

                    success  : function(data) {
                        swal("تهانينا!",data , "success");
                        $("#Consend22").trigger("reset");
                        setTimeout(function() {
                            var href = "{{url('FilesProject')}}/{{ \Illuminate\Support\Facades\Crypt::encrypt($bennar) }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($mission) }}";
                            window.location.href = href;
                        },1000);


                    },
                    error: function(xhr, textStatus, thrownError){
                        // console.log(thrownError);
                        swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                    }

                });


            });


        });

        /*********************************************************************/
    </script>
<script>
    $('#uppercase').click(function () {

            $.ajax({
                type: 'GET',
                url : "{{ url('GetChats') }}",
                data : [] ,
                //dataType: 'json',
                cache:false,
                contentType: false,
                processData: false,

                success  : function(data) {
                    var audio = document.getElementById("audioSuccess");
                    audio.play();
                    $("#repodrop").html(data);

                },
                error: function(xhr, textStatus, thrownError){
                    // console.log(thrownError);
                    swal("للأسف!", "يوجد خطأ !", "error");
                }

            });

    });

</script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
