@extends('ActivateAccount.layout')
@section('content')
    <div class="col-md-12">
        <h3>ادارة القبول  <small>تفعيل الحسابات </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>  تعديل بيانات الملف </a></li>

        </ol>
    </div>



    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> تعديل بيانات ملف العميل</h3>

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
                {!! Form::open(array('route'=>'ActivateEdit','class'=>'form-horizontal','id'=>'','onsubmit'=>'','enctype' => 'multipart/form-data','files' => true)) !!}

                <div class="form-group">


                    <div class="col-lg-3">
                        <label for="BranchID" class="control-label">RQS</label>
                        <input type="text" name="RQS" value="{{ $Order->RQS }}" class="form-control" id="RQS" placeholder="1" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="BranchID" class="control-label">Bank</label>

                        <input type="text" name="Bank" value="{{ $Order->Bank }}" class="form-control" id="Bank" placeholder="AJMAN BAN" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="ProName" class="control-label"> Date of Receipt Payment</label>
                        {{ $Order->DRP }}
                        <input type="date" name="DRP" value="{{ $Order->DRP }}" class="form-control" id="DRP" placeholder=" 24/6/2020" style="margin-bottom: 9px;" required>
                    </div>

                    <div class="col-lg-3">
                        <label for="BranchID" class="control-label">The amount paid</label>
                        <input type="number" name="SOA" value="{{ $Order->SOA }}" class="form-control" id="SOA" placeholder="amount paid" style="margin-bottom: 9px;" required>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="BranchID" class="control-label">Port</label>
                        <input type="text" name="Port" value="{{ $Order->Port }}" class="form-control" id="Port" placeholder="JED" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="BranchID" class="control-label">City</label>
                        <input type="text" name="City" value="{{ $Order->City }}" class="form-control" id="City" placeholder="JEDDAH" style="margin-bottom: 9px;" required>
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
                        <input type="text" name="FileCode" value="{{ $Order->FileCode }}" class="form-control" id="FileCode" placeholder="KZ-DKO-214-JED" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="ProName" class="control-label"> Bennar</label>
                        <input type="text" name="Bennar" class="form-control" id="Bennar" placeholder="#5119" style="margin-bottom: 9px;" readonly value="{{ $Order->number }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-3">
                        <label for="ProName" class="control-label">Currency </label>
                        <select class="form-control select2" name="currency">
                            <option value="AED">الدرهم الاماراتي</option>
                            <option value="SAR"> الريال السعودي</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="ProName" class="control-label"> Package Price</label>
                        <input type="text" name="total" class="form-control" id="total" placeholder="24000" style="margin-bottom: 9px;" required  value="{{ $Order->total }}" >
                    </div>
                    <div class="col-lg-3">
                        <label for="ProName" class="control-label"> Phone</label>
                        <input type="text" name="Phone" class="form-control" id="Phone" placeholder="00966534700004" style="margin-bottom: 9px;" required  value="{{ $Order->phone }}" readonly>
                    </div>
                    <div class="col-lg-3">
                        <label for="BranchID" class="control-label">Email</label>
                        <input type="text" name="Email" class="form-control" id="Email" placeholder="amer11uk@me.com" style="margin-bottom: 9px;" required value="{{ $Order->email }}" readonly>
                    </div>

                </div>




                <div class="box-footer">
                    <button class="btn btn-danger pull-left">تعديل الملف</button>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection