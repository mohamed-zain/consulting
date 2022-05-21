<?php

use Illuminate\Support\Facades\DB;
/*$users = DB::table('users')
    ->select(DB::raw('count(*) as user_count, roll'))
    ->where('roll', '=', 'AdmissionEmp')
    ->groupBy('roll')
    ->get();*/
$users = DB::table('tasks')
    ->select(DB::raw('Bennar_Code'))
    ->where('EmpID', '=', auth()->user()->id)
    ->groupBy('Bennar_Code')
    ->get();


$done = \App\Models\Tasks::where('EmpID',auth()->user()->id)->where('TaskDone','yes')->count();
$notDone = \App\Models\Tasks::where('EmpID',auth()->user()->id)->where('TaskDone','no')->count();
$files = \App\Models\Documents::where('Usr_id',auth()->user()->id)->count();

?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{$users->count()}}</h3>
                <p> مشاريعك</p>
            </div>
            <div class="icon">
                <i class="fa fa-tasks"></i>
            </div>
            <a href="{{ url('engProjects') }}" class="small-box-footer">
                المزيد <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$done}}<sup style="font-size: 20px"></sup></h3>
                <p>المهام المنجزة</p>
            </div>
            <div class="icon">
                <i class="fa fa-line-chart"></i>
            </div>
            <a href="{{url('CompleteTasks')}}" class="small-box-footer">
                المزيد <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$notDone}}</h3>
                <p>المهام الغير منجزة</p>
            </div>
            <div class="icon">
                <i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>
            </div>
            <a href="{{url('InCompleteTasks')}}" class="small-box-footer">
                المزيد <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{$files}}</h3>
                <p>ملفاتك</p>
            </div>
            <div class="icon">
                <i class="fa fa-folder-open"></i>
            </div>
            <a href="{{url('engFiles')}}" class="small-box-footer">
                المزيد <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
</div>
