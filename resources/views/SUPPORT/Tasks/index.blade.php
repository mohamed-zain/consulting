<?php
if (Auth::user()->Level == 1){
    $ex = 'index';
}elseif(Auth::user()->email == 'support@ko-design.ae'){
    $ex = 'EMP.layout' ;
}else{
    $access = DB::table('user_groups')
        ->where('UID',auth()->user()->id)
        ->where('Sys','EngineeringManagement')
        ->first();
    $access2 = DB::table('user_groups')
        ->where('UID',auth()->user()->id)
        ->where('Sys','ActivateAccounts')
        ->first();
    //$arr = $access->toArray();
    //dd($access);
    if ($access->accessH == 1){
        $ex = 'ProjectsManager.layout' ;
    }elseif($access2->accessH == 1){
        $ex = 'ActivateAccount.layout' ;
    }else{
        $ex = '';
    }

}

?>

@extends($ex)
@section('content')

    <section class="content-header">
        <div class="">
            <h3>
                الادارة الهندسية
                <small>إدارة المهام</small>
            </h3>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active"> إدارة المهام</li>

            </ol>
        </div>
    </section>
    <div class="row"  style="font-size: 12px;">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"  style="font-size: 12px;"> المشاريع</h3>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <form action="{{ url('TM_by_project') }}" method="get">
                                @csrf
                                <select name="pro" class="select2" onchange="submit();">
                                    <option>اختر من المشاريع</option>
                                    @foreach(App\Models\ActivateFile::all() as $item)
                                        <option value="{{$item->Bennar}}">{{$item->FileCode}}</option>
                                    @endforeach
                                </select>
                            </form>

                        </li>

                        @foreach(App\Models\ActivateFile::take(19)->get() as $item)
                        <li><a href="{{ url('TM_by_project') }}?pro={{ $item->Bennar }}"><i class="fa fa-circle-o text-red"></i> {{$item->FileCode}}</a></li>
                        @endforeach
                    </ul>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-9" id="pro">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">قائمة المهام

                    </h3>

                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>المهمة</th>
                            <th>المهندس المسؤول </th>
                            <th>تاريخ الاسناد </th>
                            <th> هل انجزت </th>
                            <th>  حالة المهمة </th>
                            <th> الاولوية </th>
                            <th>  موعد الانتهاء </th>
                            <th>   خيارات </th>
                        </tr>
                        </thead>
                        <tbody id="comm">
                        @foreach($tasks as $Single)
                            <tr>
                                <td>{{ $Single->Mission }}</td>
                                <td>{{ $Single->name }}</td>
                                <td>{{ $Single->CA }}</td>
                                <td>
                                    @if($Single->TaskDone == 'yes')
                                        <span class="label label-success">منجزة</span>
                                    @else
                                        <span class="label label-danger">غير منجزة</span>
                                    @endif
                                </td>
                                <td>
                                    @if($Single->TStatus == null)
                                        <span class="text-yellow">في الانتظار</span>
                                    @elseif($Single->TStatus == 'onprogress')
                                        <span class="text-green">جاري العمل عليها</span>
                                    @elseif($Single->TStatus == 'onhold')
                                        <span class="text-red">متوقفة</span>
                                    @elseif($Single->TStatus == 'done')
                                        <span class="text-aqua">منتهية</span>
                                    @endif
                                </td>
                                <td>
                                    @if($Single->Priority == 'normal')
                                        <span class="btn bg-info btn-flat">Normal</span>
                                    @elseif($Single->Priority == 'high')
                                        <span class="btn bg-warning btn-flat">High</span>
                                    @elseif($Single->Priority == 'urgent')
                                        <span class="btn bg-danger btn-flat">Urgent</span>
                                    @endif
                                </td>
                                <td>{{ $Single->Deadline }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span> خيارات
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            @if($Single->TaskDone == 'yes')
                                                <li><a href="#">لا توجد خيارات</a></li>
                                                {{-- <li><a href="#" data-toggle="modal" data-target="#eng{{ $Single->TID }}">تغيير المهندس</a></li>
                                                 <li><a href="#" data-toggle="modal" data-target="#dd{{ $Single->TID }}">تحديد الموعد النهائي </a></li>--}}
                                            @else
                                                <li><a href="#" data-toggle="modal" data-target="#eng{{ $Single->TID }}">تغيير المهندس</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#dd{{ $Single->TID }}">تحديد الموعد النهائي </a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#pro{{ $Single->TID }}">تحديد اولوية المهمة </a></li>
                                            @endif

                                        </ul>
                                    </div>
                                </td>

                            </tr>
                            <div class="modal fade" id="pro{{ $Single->TID }}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">تغيير اولوية المهمة - <code>{{ $Single->Priority? $Single->Priority : '---' }}</code> </h4>
                                        </div>
                                        <div class="modal-body">
                                            {{ Form::open(array('route'=>'ChangePriority','id'=>'')) }}
                                            <div class="form-group">
                                                <label for="BranchID" class="control-label"> أختر الاولوية</label>
                                                <input type="hidden" name="TID" value="{{ $Single->TID }}">
                                                <div class="form-inline">
                                                    <select name="Priority" class="form-control select2" id="Priority"   style="margin-bottom: 9px; width: 80%" required>
                                                        <option value="">--------اختر الاولوية--------</option>
                                                        @if($Single->Priority == null)
                                                            <option value="normal">عادية</option>
                                                            <option value="high">عالية</option>
                                                            <option value="urgent">مستعجلة</option>
                                                        @elseif($Single->Priority == 'normal')
                                                            <option value="urgent">مستعجلة</option>
                                                            <option value="high">عالية</option>
                                                        @elseif($Single->Priority == 'high')
                                                            <option value="normal">عادية</option>
                                                            <option value="urgent">مستعجلة</option>
                                                        @elseif($Single->Priority == 'urgent')
                                                            <option value="normal">عادية</option>
                                                            <option value="high">عالية</option>
                                                        @endif
                                                    </select>
                                                    <button type="submit" class="btn btn-success">تغيير</button>

                                                </div>
                                            </div>
                                            {{ Form::close() }}

                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="eng{{ $Single->TID }}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">تغيير المهندس المسؤول عن المهمة</h4>
                                        </div>
                                        <div class="modal-body">
                                            {{ Form::open(array('route'=>'ChangeEng','id'=>'')) }}
                                            <div class="form-group">
                                                <label for="BranchID" class="control-label"> أختر المهندس</label>
                                                <input type="hidden" name="TID" value="{{ $Single->TID }}">
                                                <div class="form-inline">
                                                    <select name="EmpID" class="form-control select2" id="EmpID"   style="margin-bottom: 9px; width: 80%" required>
                                                        @foreach(App\Models\User::where('roll','=','AdmissionEmp')->get() as $ser)
                                                            <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-success">تغيير</button>

                                                </div>
                                            </div>
                                            {{ Form::close() }}

                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="dd{{ $Single->TID }}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">تحديد تاريخ انجاز وتسليم المهمة</h4>
                                        </div>
                                        <div class="modal-body">
                                            {{ Form::open(array('route'=>'SetDeadline','id'=>'')) }}
                                            <div class="form-group">
                                                <label for="BranchID" class="control-label">  قم بتحديد تاريخ تسليم المهمة</label>
                                                <input type="hidden" name="TID" value="{{ $Single->TID }}">
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label>التاريخ:</label>

                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="date" class="form-control pull-right" name="Deadline">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <button type="submit" class="btn btn-success">تغيير</button>

                                                </div>
                                            </div>
                                            {{ Form::close() }}

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
            </div>
            <!-- /.box -->
        </div>

    </div>

@endsection
