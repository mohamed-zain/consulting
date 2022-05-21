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


    <div class="">
        <section class="content-header">
            <div class="">
                <h3>
                    لوحة التحكم
                    <small>المشاريع</small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                    <li class="active">ادارة المشاريع</li>
                    <li class="active">نسب انجاز المشاريع</li>
                </ol>
            </div>
        </section>
    </div>

    <div class="col-md-12" style="font-size: 10px">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">انجاز المشاريع</h3>

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
                <table id="example1" class="table table-bordered table-striped table-responsive">
                    <thead>
                    <tr>
                        <th> المشروع</th>
                        <th> العميل</th>
                        <th> المهام المنجزة </th>
                        <th>  نسبة الانجاز</th>
                        <th>  --------</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Data as $mmmmmm)
                        <?php
                       $done = \App\Models\Tasks::where('Bennar_Code',$mmmmmm->Bennar)->where('TaskDone','yes')->get();
                       $per = \App\Models\Tasks::where('Bennar_Code',$mmmmmm->Bennar)->get();
                       $pernum = 0;
                        foreach ($per as $tem){
                            if($tem->TaskDone == 'yes'){
                                $pernum+= 20;
                            }
                        }
                        ?>
                        <tr>
                            <td>{{ $mmmmmm->FileCode }}</td>
                            <td>{{ $mmmmmm->Name }}</td>
                            <td>
                                @foreach($done as $item)
                                {{ $item->Mission }} -
                                @endforeach
                            </td>
                            <td>

                                @if($pernum <= 20)
                                    <span class="badge bg-red-active ">{{$pernum}}%</span>
                                @elseif($pernum <= 40)
                                    <span class="badge bg-gray-active ">{{$pernum}}%</span>
                                @elseif($pernum <= 60)
                                    <span class="badge bg-fuchsia ">{{$pernum}}%</span>
                                @elseif($pernum <= 80)
                                    <span class="badge bg-blue-gradient ">{{$pernum}}%</span>
                                @elseif($pernum <= 100)
                                    <span class="badge bg-olive ">{{$pernum}}%</span>
                                @else
                                    <span class="badge bg-red">
                                        {{$pernum}}%
                                    </span>
                                    @endif
                            </td>
                            <td width="200">
                                @if($pernum <= 20)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="{{$pernum}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$pernum}}%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                @elseif($pernum <= 40)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="{{$pernum}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$pernum}}%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                @elseif($pernum <= 60)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-aqua progress-bar-striped" role="progressbar" aria-valuenow="{{$pernum}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$pernum}}%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                @elseif($pernum <= 80)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-green progress-bar-striped" role="progressbar" aria-valuenow="{{$pernum}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$pernum}}%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                @elseif($pernum <= 100)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$pernum}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$pernum}}%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="{{$pernum}}" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                @endif
                            </td>


                        </tr>
                    @endforeach



                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>



@endsection
