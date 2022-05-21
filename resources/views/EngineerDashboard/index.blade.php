@extends('EngineerDashboard.layouts.layout')
@section('content')
    {{--<div class="notify bottom-right do-show" data-notification-status="error" style="direction: rtl;text-align: center;">
        <p>تنبيه - تم رفع الملفات النهائية لبعض المشاريع ولم يتم تحديث الحالة - الرجاء تحديث حالة المهمات وتحديد المهمة كمهمة منجزه</p>
    </div>--}}
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
        .box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title{
            font-size: 11px !important;
        }
        .small-box {
            border-radius: 10px !important;
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
            <div class="box box-solid">
                <?php
                $data22 = \App\Models\Emplyee::where('id',auth()->user()->EmpiD)->first();
                ?>
                <div class="box-header with-border">
                    <h3 class="box-title">بياناتك  </h3>
                    <div class="box-tools">
                        <button class="btn " data-toggle="modal" data-target="#Modal3333"><i class="fa fa-edit"></i> اضغط لتحديث بياناتك  </button>
                    </div>
                </div>
                <div class="box-body box-profile">


                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h5 class="box-title">الاسم باللغة الانجليزية</h5>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            @if(isset($data22->NameEN)) {{ $data22->NameEN }} @else '---' @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">الجنسية</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" >
                            @if(isset($data22->Nationality)) {{ $data22->Nationality }} @else '---' @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">المؤهل الدراسي</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" >
                            @if(isset($data22->Qualify)) {{ $data22->Qualify }} @else --- @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">المسمي الوظيفي</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->JobName)) {{ $data22->JobName }} @else --- @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> الحالة الاجتماعية</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->Status)) {{ $data22->Status }} @else '' @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">رقم الجوال</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->MobPhone)) {{ $data22->MobPhone }} @else --- @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">تاريخ الميلاد </h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->MobPhone)) {{ $data22->MobPhone }} @else --- @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> مكان الميلاد</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->MobPhone)) {{ $data22->MobPhone }} @else --- @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">رقم الهوية</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->IdentityID)) {{ $data22->IdentityID }} @else --- @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">رقم الجواز</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->PassportID)) {{ $data22->PassportID }} @else --- @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">مدينة السكن</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->City)) {{ $data22->City }} @else --- @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">الحي</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->Quarter)) {{ $data22->Quarter }} @else '' @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> نوع الدوام</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->AssignType)) {{ $data22->AssignType }} @else '' @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">الحساب البنكي</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->AssignType)) {{ $data22->AssignType }} @else '' @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">اسم البنك</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->AssignType)) {{ $data22->AssignType }} @else '' @endif
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">فرع البنك</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            @if(isset($data22->AssignType)) {{ $data22->AssignType }} @else '' @endif
                        </div><!-- /.box-body -->
                    </div>


                </div><!-- /.box-body -->
            </div>
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
                                    <th> اسم العميل</th>
                                    <th>المشروع</th>
                                    <th> المهمة</th>
                                    <th> تاريخ التسليم</th>
                                    <th> الاولوية</th>
                                    <th> حالة المهمة</th>
                                    <th> خيارات</th>
                                    <th> اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $single)

                                    <tr>
                                        <td><span class=" ">{{$single['first_name'] }} {{$single['last_name'] }}</span></td>
                                        <td><span class=" ">{{ $single['FileCode'] }}</span></td>
                                        <td><a class="btn bg-red-active btn-flat " href="#" >  {{ $single->Mission }}</a></td>
                                        <td>@if(isset($single->Deadline)) {{ date('F d, Y', strtotime($single->Deadline)) }} @else --- @endif</td>
                                        <td>
                                            @if($single->Priority == 'normal')
                                                <span class="btn bg-info btn-flat">Normal</span>
                                            @elseif($single->Priority == 'high')
                                                <span class="btn bg-warning btn-flat">High</span>
                                            @elseif($single->Priority == 'urgent')
                                                <span class="btn bg-danger btn-flat">Urgent</span>
                                            @endif

                                        </td>
                                        <td>
                                            @if($single->TStatus == null)
                                                <span class="text-yellow">في الانتظار</span>
                                            @elseif($single->TStatus == 'onprogress')
                                                <span class="text-green">جاري العمل عليها</span>
                                            @elseif($single->TStatus == 'onhold')
                                                <span class="text-red">متوقفة</span>
                                            @elseif($single->TStatus == 'done')
                                                <span class="text-aqua">منتهية</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="input-group-btn">
                                                <button type="button" class="btn bg-orange btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> خيارات
                                                    <span class="fa fa-caret-down"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ url('DetailsProject') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($single['number']) }}" >عرض متطلبات التصميم</a></li>
                                                    <li><a href="{{ url('FilesProject') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($single['number']) }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($single->Mission) }}"  > عرض ورفع الملفات</a></li>
                                                    {{-- <li><a href="#"  data-toggle="modal" data-target="#TRAN{{ $single['number'] }}">تحويل لمهندس آخر</a></li>--}}
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">إختر إجراء
                                                    <span class="fa fa-caret-down"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#"  data-toggle="modal" data-target="#update{{ $single['number'] }}">انجاز المهام الفرعية</a></li>
                                                    <li><a href="#"  data-toggle="modal" data-target="#status{{ $single['number'] }}">تحديث حالة المهمة</a></li>
                                                    <li><a href="#"  data-toggle="modal" data-target="#DONE{{ $single['number'] }}">إنجاز المهمة</a></li>
                                                   {{-- <li><a href="#"  data-toggle="modal" data-target="#TRAN{{ $single['number'] }}">تحويل لمهندس آخر</a></li>--}}
                                                </ul>
                                            </div>
                                            <div class="modal fade" id="update{{ $single['number'] }}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">  انجاز المهام الفرعية</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
                                                            $main = DB::table('main_stage')->where('StageCode',$single->Mission)->first();
                                                            if (isset($main->id)){
                                                                $sub =  DB::table('main_sub_stage')->where('main_stage',$main->id)->get();
                                                            }

                                                           // dd($sub);
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="{{ route('upSubStages')}}" method="post" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="sub_bennar" value="{{ $single['number'] }}">
                                                                        <input type="hidden" name="sub_main" value="{{ $single->Mission }}">
                                                                        @if(isset($sub))
                                                                        @foreach($sub as $so)
                                                                            <?php $sub2 = DB::table('project_services_sub')
                                                                                ->where('sub_bennar','=',$single['number'])
                                                                                ->where('sub_main','=',$single->Mission)
                                                                                ->where('sub_code','=',$so->SubCode)
                                                                                ->first();
                                                                            //dd($sub);
                                                                            ?>

                                                                           @if(!$sub2)
                                                                                    <input type="hidden" name="" value="{{$so->SubCode}}">
                                                                                <div class="form-inline">
                                                                                     <label>
                                                                                      <input name="sub_code[]" value="{{$so->SubCode}}" type="checkbox" class="flat-red">
                                                                                {{$so->SubName}}
                                                                                    </label>
                                                                                </div>
                                                                                @else

                                                                                    <div class="form-inline">
                                                                                        <label>
                                                                                            <input name="" value="{{$so->SubName}}" type="checkbox" class="flat-red" checked disabled>
                                                                                            {{$so->SubName}}
                                                                                        </label>
                                                                                    </div>
                                                                            @endif
                                                                        @endforeach
                                                                        @endif
                                                                        <div class="form-inline">

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-success pull-left" style="margin-top: 20px">حفظ</button>
                                                                        </div>

                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="DONE{{ $single['number'] }}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">تحديد المهمة كمهمة منجزة</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <?php
                                                                    $main = DB::table('main_stage')->where('StageCode',$single->Mission)->first();

                                                                    $sub =  DB::table('main_sub_stage')->where('main_stage',$main->id)->get();
                                                                    if (isset($sub)){
                                                                        $sub23 = DB::table('project_services_sub')
                                                                            ->where('sub_bennar','=',$single['number'])
                                                                            ->where('sub_main','=',$single->Mission)
                                                                            //->where('sub_code','=',$so->SubCode)
                                                                            ->get();
                                                                        // dd($sub);
                                                                        $donSub = $sub->count();
                                                                        $donSub2 = $sub23->count();
                                                                    }






                                                                            //dd($sub);
                                                                            ?>
                                                                    @if(isset($donSub2) && isset($donSub) && $donSub2 < $donSub)
                                                                            <label class="text-red">لا يمكنك تحديد انجاز المهمة قبل انجاز المهام الفرعية</label><br>
                                                                            <label> المهام الفرعية المطلوبة</label> <code>{{ $donSub }}</code><br>
                                                                            <label> المهام الفرعية المنجزة</label> <code>{{ $donSub2 }}</code>
                                                                    @else
                                                                        <form action="{{ route('completingTask')}}" method="post" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="Bennar_Code" value="{{ $single['number'] }}">
                                                                            <input type="hidden" name="Mission" value="{{ $single->Mission }}">

                                                                            <div class="form-inline">
                                                                                <label>تأكد من اكمال جميع مراحل مهمتك قبل الحفظ</label>
                                                                                {{--  <select name="EmpID" class="form-control select2" id="EmpID"   style="margin-top: 20px; width: 80%" required="required">
                                                                                      @foreach(App\Models\User::where('roll','=','AdmissionEmp')->get() as $ser)
                                                                                          <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                                                                      @endforeach
                                                                                  </select>--}}
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-success pull-left" style="margin-top: 20px">حفظ</button>
                                                                            </div>

                                                                        </form>
                                                                    @endif


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="TRAN{{ $single['number'] }}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">تحويل المهمة لمهندس آخر</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="{{ route('ToAnotherEng')}}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <label for="BranchID" class="control-label"> أختر المهندس</label>
                                                                        <input type="hidden" name="Bennar_Code" value="{{ $single['number'] }}">
                                                                        <input type="hidden" name="Mission" value="{{$single->Mission}}">
                                                                        <div class="form-inline">
                                                                            <select name="EmpID" class="form-control select2" id="EmpID"   style="margin-bottom: 9px; width: 80%" required>
                                                                                @foreach(App\Models\User::where('roll','=','AdmissionEmp')->get() as $ser)
                                                                                    <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <button type="submit" class="btn btn-success">إرسال</button>
                                                                        </div>

                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="status{{ $single['number'] }}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">تحديث حالة المهمة</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="{{ route('UpdateTaskStatus')}}" method="post" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="TID" value="{{ $single->TID }}">

                                                                        <div class="form-inline">
                                                                            <select name="status" class="form-control select2" id="EmpID"   style="margin-bottom: 9px; width: 80%" required>
                                                                                <option value="">--------اختر---------</option>
                                                                                @if($single->TStatus == null)
                                                                                <option value="onprogress">بدء العمل عليها</option>
                                                                                @elseif($single->TStatus == 'onprogress')
                                                                                <option value="onhold">وقف العمل علي المهمة</option>
                                                                                @elseif($single->TStatus == 'onhold')
                                                                                <option value="onprogress">مواصلة العمل علي المهمة </option>
                                                                                @endif
                                                                            </select>
                                                                            <button type="submit" class="btn btn-success">إرسال</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="files{{ $single['number'] }}" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"> الملفات المتوفرة حاليا</h4>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">عرض كل مشاريعك</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal3333" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> تأكد من صحة البيانات المدخلة </h4>
                </div>
                <div class="modal-body">
                    {{ Form::model($data22, ['method' => 'PATCH', 'route' => ['Employee.update', $data22->id]]) }}
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#timeline" data-toggle="tab">البيانات الشخصية</a></li>
                            <li><a href="#settings" data-toggle="tab">البيانات الوظيفية</a></li>
                            <li><a href="#activity" data-toggle="tab">البيانات المالية</a></li>
                            <li><a href="#magnage" data-toggle="tab">الوثائق الرسمية</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="timeline">
                                <table class="table table-striped" >

                                    <thead>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>اسم الموظف</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('NameAR', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>الاسم باللغة الانجليزية</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('NameEN', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>جنسية الموظف</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('Nationality', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>المؤهل الاكاديمي</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('Qualify', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>البريد</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('Email', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>الحالة الاجتماعية</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('Status', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>تاريخ الميلاد</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('BirthDate', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>مكان الميلاد</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('BirthPlace', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>هاتف المنزل</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('HomePhone', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>الجوال</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('MobPhone', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>المدينة</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('City', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>الحي</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('Quarter', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>العنوان</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('Address', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>


                                    </tbody>

                                </table>

                            </div>

                            <div class="tab-pane" id="settings">
                                <div class="col-xs-12 table-responsive" >
                                    <table class="table table-striped" >

                                        <thead>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>تاريخ التعين</td>
                                            <td>
                                                <div class="col-sm-10">
                                                    {!! Form::text('AssignDate', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>نوع التعين</td>
                                            <td>
                                                <div class="col-sm-10">
                                                    {!! Form::text('AssignType', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>الفرع </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    {!! Form::select('Branch',App\Models\Branchs::pluck('BranchName','id'),null, ['id'=>'AppType','class' => 'form-control select2','style'=>'width:80%;']) !!}


                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>ساعات العمل</td>
                                            <td>
                                                <div class="col-sm-10">
                                                    {!! Form::text('WorkHours', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>الادارة</td>
                                            <td>
                                                <div class="col-sm-10">
                                                    {!! Form::select('ManageName',App\Models\ManagesName::pluck('ManageName','id'),null, ['id'=>'AppType','class' => 'form-control select2','style'=>'width:80%;']) !!}

                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>المدير المباشر </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    {!! Form::select('MainDirector',App\Models\Emplyee::pluck('NameAR','id'),null, ['id'=>'AppType','class' => 'form-control select2','style'=>'width:80%;']) !!}

                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>المسمي الوظيفي</td>
                                            <td>
                                                <div class="col-sm-10">
                                                    {!! Form::select('JobTitle',App\Models\JobTitle::pluck('JobTName','id'),null, ['id'=>'AppType','class' => 'form-control select2','style'=>'width:80%;']) !!}

                                                </div>
                                            </td>

                                        </tr>




                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="activity">
                                <table class="table table-striped" >

                                    <thead>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>المرتب الاساسي</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('MainSalary', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>اسم بنك الموظف</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('BankName', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>اسم فرع بنك الموظف</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('BankBranch', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>رقم حسلب بنك الموظف</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('BankAccount', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>



                                    </tbody>
                                </table>

                            </div>

                            <div class="tab-pane" id="magnage">
                                <table class="table table-striped" >
                                    <thead>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>رقم الهوية</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('IdentityID', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>مصدر الهوية</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('IdentitySrc', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>تاريخ الاصدار</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('IdentityDate', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>تاريخ النتهاء</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('IdenDateEnd', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>رقم الجواز</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('PassportID', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>مصدر الجواز</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('PassportSrc', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>تاريخ الاصدار</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('PassportDate', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>تاريخ النتهاء</td>
                                        <td>
                                            <div class="col-sm-10">
                                                {!! Form::text('PasDateEnd', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info pull-left">تعديل البيانات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

@endsection
