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
                                    <th> المتطلبات</th>
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
                                        <td><a class="btn bg-orange btn-flat " href="{{ url('DetailsProject') }}/{{ $single['number'] }}" >متطلبات التصميم</a></td>
                                        <td>
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">إختر إجراء
                                                    <span class="fa fa-caret-down"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#"  data-toggle="modal" data-target="#DONE{{ $single['number'] }}">إنجاز المهمة</a></li>
                                                    <li><a href="#"  data-toggle="modal" data-target="#TRAN{{ $single['number'] }}">تحويل لمهندس آخر</a></li>

                                                </ul>
                                            </div>
                                            <div class="modal fade" id="DONE{{ $single['number'] }}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">قم برفع ملف التصميم لاكمال المهمة</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="{{ route('completingTask')}}" method="post" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="Bennar_Code" value="{{ $single['number'] }}">
                                                                        <input type="hidden" name="Mission" value="{{ $single->Mission }}">
                                                                        <div class="form-inline">
                                                                            <div id="dsaf">
                                                                                <input type="file" multiple id="frt" name="task_files[]" required="required">
                                                                                <p id="pee" style="font-size: 24px">أضغط لرفع الملفات المراد ارفاقها هنا</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-inline">
                                                                            <label>إختر المهندس الذي يليك في المهمات</label>
                                                                            <select name="EmpID" class="form-control select2" id="EmpID"   style="margin-top: 20px; width: 80%" required="required">
                                                                                @foreach(App\Models\User::where('roll','=','AdmissionEmp')->where('id','!=',auth()->user()->id)->get() as $ser)
                                                                                    <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                                                                @endforeach
                                                                            </select>
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
                                                                    <form action="{{ route('OpenJobCard')}}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <label for="BranchID" class="control-label"> أختر المهندس</label>
                                                                        <input type="hidden" name="Bennar_Code" value="{{ $single['number'] }}">
                                                                        <input type="hidden" name="Mission" value="E0">
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
                                        </td>
                                    </tr>

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


@endsection
