<?php
if (Auth::user()->Level == 1){
    $ex = 'index';
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
    <div class="col-md-12">
        <h3> الادارة الهندسية  <small> تقارير المهندسين  </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> التقارير</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>     تقارير المهندسين </a></li>

        </ol>
    </div>

@endsection