@extends('index')
<script src="{{ asset('code/highcharts.js') }}"></script>
<script src="{{ asset('code/modules/exporting.js') }}"></script>
<script src="{{ asset('code/modules/export-data.js') }}"></script>
@section('content')
  <style>
    .box-body a i{
      color: #e39548;
      margin-bottom: 5px;
    }
  </style>
  <div class="col-md-12">
    <h3>
      النظام المالي
      <small>لوحة التحكم</small>
    </h3>
    <ol class="breadcrumb">
      <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> المحاسبة المالية</a></li>
      <li class="active"> الرئيسية</li>
    </ol>
  </div>
  <div class="" style="margin-left: 0px !important;">
  </div>
  <div class="row">
    <div class="col-md-12">
      <!-- USERS LIST -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title"> تجهيزات النظام المحاسبي</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="padding-right: 70px; ">
          <a href="{{ url('Accounts_Type') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-file-invoice-dollar fa-x2" style="font-size: 55px;"></i> تصنيف الحسابات
          </a>
          <a href="{{ url('Manual_Accounts') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-coins fa-x2" style="font-size: 55px;"></i>  دليل الحسابات
          </a>
          <a href="{{ url('Chart_of_Accounts') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-stream fa-x2" style="font-size: 55px;"></i>  دليل الحسابات الشجري
          </a>
          <a href="{{ url('Fiscal_Years') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-comment-dollar fa-x2" style="font-size: 55px;"></i>  السنوات المالية
          </a>

          <a href="{{ url('Cost_Centers') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-funnel-dollar fa-x2" style="font-size: 55px;"></i>  مراكز التكلفة
          </a>
          <a href="{{ url('Link_Cost_Centers') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-puzzle-piece fa-x2" style="font-size: 55px;"></i>   ربط مراكز التكلفة بالحساب
          </a>
          <a href="{{ url('BanksAccount') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-money-check-alt fa-x2" style="font-size: 55px;"></i>  الحسابات البنكية
          </a>
          <a href="{{ url('CashFunds') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-money-bill-alt fa-x2" style="font-size: 55px;"></i>  الصناديق النقدية
          </a>
          <a href="{{ url('Opening_Entry') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-lira-sign fa-x2" style="font-size: 55px;"></i>الارصدة الافتتاحية
          </a>
          <a href="{{ url('SystemInfo') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-tools fa-x2" style="font-size: 55px;"></i>   اعدادات عامة
          </a>

          <!-- /.box-body -->
          <div class="box-footer text-center">
          </div>
          <!-- /.box-footer -->
        </div>
        <!--/.box -->
      </div>
    </div>
    <div class="col-md-12">
      <!-- USERS LIST -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title"> العمليات المحاسبية  </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body "  style="padding-right: 70px;">
          <a href="{{ url('StatementOfAccount') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-hand-holding-usd fa-x2" style="font-size: 55px;"></i> كشوف الحسابات
          </a>
          <a href="{{ url('Financial_statement') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-chart-line fa-x2" style="font-size: 55px;"></i>    القوائم المالية
          </a>
          <a href="{{ url('Daily_Restrictions') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-cash-register fa-x2" style="font-size: 55px;"></i>   قيود اليومية
          </a>
          <a href="{{ url('Catch_Receipts') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-file-invoice fa-x2" style="font-size: 55px;"></i>   سندات القبض
          </a>
          <a href="{{ url('Receipts') }}" class="btn btn-app bg-gray" >
            <i class="fa fa-receipt fa-x2" style="font-size: 55px;"></i>   سندات الصرف
          </a>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
        </div>
        <!-- /.box-footer -->
      </div>
      <!--/.box -->
    </div>

  </div>

@endsection
