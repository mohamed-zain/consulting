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
    <div class="col-md-12">
        <h3>ادارة القبول  <small>تفعيل الحسابات </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>  تفعيل الملفات </a></li>

        </ol>
    </div>



    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">بيانات تفعيل الملف</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="direction: ltr">
                <div class="row">

                </div>
                {!! Form::open(array('route'=>'ActivateFile.store','class'=>'form-horizontal','id'=>'','onsubmit'=>'','enctype' => 'multipart/form-data','files' => true)) !!}

                <div class="form-group">


                    <div class="col-lg-3">
                        <label for="BranchID" class="control-label">RQS</label>
                        <input type="text" name="RQS" class="form-control" id="RQS" placeholder="1" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="BranchID" class="control-label">Bank</label>
                        <input type="text" name="Bank" class="form-control" id="Bank" placeholder="AJMAN BAN" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="ProName" class="control-label"> Date of Receipt Payment</label>
                        <input type="date" name="DRP" class="form-control" id="DRP" placeholder=" 24/6/2020" style="margin-bottom: 9px;" required>
                    </div>

                    <div class="col-lg-3">
                        <label for="BranchID" class="control-label">The amount paid</label>
                        <input type="number" name="SOA" class="form-control" id="SOA" placeholder="amount paid" style="margin-bottom: 9px;" required>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="BranchID" class="control-label">Port</label>
                        <input type="text" name="Port" class="form-control" id="Port" placeholder="JED" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="BranchID" class="control-label">City</label>
                        <input type="text" name="City" class="form-control" id="City" placeholder="JEDDAH" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="BranchID" class="control-label">Country</label>
                        <input type="text" name="Country" class="form-control" id="Country" placeholder="KSA" style="margin-bottom: 9px;" required readonly  value="{{ $Order->country }}">
                    </div>
                    <div class="col-lg-2">
                        <label for="BranchID" class="control-label">Name</label>
                        <input type="text" name="Name" class="form-control" id="ProName" placeholder="Amer Alzaidi" style="margin-bottom: 9px;" readonly value="{{ $Order->first_name }} {{ $Order->last_name }}">
                    </div>
                    <div class="col-lg-2">
                        <label for="BranchID" class="control-label">File Code</label>
                        <input type="text" name="FileCode" class="form-control" id="FileCode" placeholder="KZ-DKO-214-JED" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="ProName" class="control-label"> Bennar</label>
                        <input type="text" name="Bennar" class="form-control" id="Bennar" placeholder="#5119" style="margin-bottom: 9px;" readonly value="{{ $Order->number }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-4">
                        <label for="ProName" class="control-label"> Phone</label>
                        <input type="text" name="Phone" class="form-control" id="Phone" placeholder="00966534700004" style="margin-bottom: 9px;" required  value="{{ $Order->phone }}" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="BranchID" class="control-label">Email</label>
                        <input type="text" name="Email" class="form-control" id="Email" placeholder="amer11uk@me.com" style="margin-bottom: 9px;" required value="{{ $Order->email }}" readonly>
                    </div>
                    {{--<div class="col-lg-4">
                        <label for="BranchID" class="control-label">Select The Designer</label>
                        <select name="mission_required[]" class="form-control select2" id="mission_required"   style="margin-bottom: 9px;" required>
                            @foreach(App\User::where('roll','=','AdmissionEmp')->get() as $ser)
                            <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                            @endforeach
                        </select>
                    </div>--}}

                </div>



                    @foreach($Services as $item)
                        <div class="col-lg-1" style="float: left">
                            <button type="button" class="btn btn-block btn-default">{{ $item->ServiceCode }}</button>
                        </div>
                    @endforeach

                <label for="BranchID" class="control-label">Mission Required</label>
                <br>

                <br/>
                <div class="box-footer">
                    <button class="btn btn-info pull-left">تفعيل الملف</button>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    @endsection