
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
<style>

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
                        <table id="example1" class="table table-bordered table-striped table-responsive" style="font-size: 14px">
                            <thead>
                            <tr>
                                <th>  كود الملف</th>
                                <th> البينار </th>
                                <th>اسم العميل</th>
                                <th> الايميل</th>
                                <th> الجوال</th>
                                <th>تاريخ التفعيل</th>
                                <th> تفاصيل</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $single)

                                <tr>
                                    <td><span class=" ">{{ $single['FileCode'] }}</span></td>
                                    <td><span class=" ">{{ $single['Bennar'] }}</span></td>
                                    <td><span class="badge bg-primary ">{{$single['Name'] }}</span></td>
                                    <td>  <span>{{ $single['Email'] }} </span></td>
                                    <td style="direction: ltr">  <span>{{ $single['Phone'] }} </span></td>
                                    <td>
                                        {{ $single['DRP'] }}
                                        {{--{{ Carbon\Carbon::parse($single['date_created'])->format('Y-m-d') }}--}}
{{--
                                        <span style="color: red" dir="ltr">{{ Carbon\Carbon::parse($single['date_created'])->diffForHumans() }}</span>
--}}

                                    </td>

                                    <td><a class="btn btn-warning" href="{{ url('MissionPlan2') }}/{{ $single->Bennar }}" target="_blank">تفاصيل</a></td>

                                </tr>


                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>

                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>

    @endsection