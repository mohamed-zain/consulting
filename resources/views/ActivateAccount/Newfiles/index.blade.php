
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
        <h3>ادارة القبول  <small>تفعيل الحسابات </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>  تفعيل الملفات </a></li>

        </ol>
    </div>

    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"> ملفات تحتاج الي تفعيل</h3>

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
                            <th> رقم البينار</th>
                            <th>  الباقة</th>
                            <th>اسم العميل</th>
                            <th> الايميل</th>
                            <th> الجوال</th>
                            <th>الدولة</th>
                            <th>تاريخ الاشتراك</th>
                            <th>قيمة الاشتراك</th>
                            <th> الاجراء</th>
                            <th> تفاصيل</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $single)
                         <?php  $pr = \App\Models\ActivateFile::where('Bennar',$single['number'])->first(); ?>
                         @if(isset($pr))

                         @else
                                <tr>
                                    <td><span class="badge bg-yellow ">{{ $single['number'] }}</span></td>
                                    <td><span class="badge bg-red-gradient ">{{ $single['name'] }}</span></td>
                                    <td><span class="badge bg-primary ">{{$single['first_name'] }} {{$single['last_name'] }}</span></td>
                                    <td>  <span>{{ $single['email'] }} </span></td>
                                    <td>  <span>{{ $single['phone'] }} </span></td>
                                    <td>  <span>{{ $single['country'] }} </span></td>
                                    <td>
                                        {{ Carbon\Carbon::parse($single['date_created'])->format('Y-m-d') }}
                                        <span style="color: red" dir="ltr">{{ Carbon\Carbon::parse($single['date_created'])->diffForHumans() }}</span>

                                    </td>
                                    <td> <a href="#">AED {{ $single['total'] }}</a></td>
                                   <td>
                                       <button id="{{ $single['number'] }}" class="btn btn-success" data-id="{{ $single['number'] }}" data-token="{{csrf_token()}}" onclick='
                                            swal({
                                                  title: "هل تمت عملية الدفع",
                                                  text: "اذا تأكدت عملية الدفع عبر البنك من طرف العميل واصل الاجراء",
                                                  type: "info",
                                                  showCancelButton: true,
                                                  closeOnConfirm: false,
                                                  showLoaderOnConfirm: true,
                                                },
                                                function(){
                                                  setTimeout(function(){
                                                       var href = "{{url('ConfirmActivate')}}/{{ $single['number'] }}";
                                                       window.location.href = href;

                                                                   }, 3000);
                                                });
                                            '>تفعيل الملف</button>
                                   </td>
                                    <td><a class="btn btn-warning" href="#"  data-toggle="modal" data-target="#{{ $single['number'] }}">تفاصيل</a></td>

                                </tr>
                                <div class="modal fade" id="{{ $single['number'] }}" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">تفاصيل طلب العميل</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">

                                                            <div class="stepwizard">
                                                                <div class="stepwizard-row setup-panel">
                                                                    <div class="stepwizard-step col-xs-3">
                                                                        <a href="#step-1" type="button" class="btn btn-warning btn-circle stp" ><i class="fa fa-check"></i></a>
                                                                        <p><small>إدارة القبول- التواصل</small></p>
                                                                    </div>
                                                                    <div class="stepwizard-step col-xs-3">
                                                                        <a href="#step-2" type="button" class="btn btn-danger btn-circle stp">2</a>
                                                                        <p><small>تفعيل الملف - المالية</small></p>
                                                                    </div>
                                                                    <div class="stepwizard-step col-xs-3">
                                                                        <a href="#step-3" type="button" class="btn btn-default btn-circle stp" disabled="disabled">3</a>
                                                                        <p><small>الادارة الهندسية- التعميد</small></p>
                                                                    </div>
                                                                    <div class="stepwizard-step col-xs-3">
                                                                        <a href="#step-4" type="button" class="btn btn-default btn-circle stp" disabled="disabled">4</a>
                                                                        <p><small>فتح (Job Card)</small></p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="box box-warning box-solid">
                                                                <div class="box-header with-border">
                                                                    <h3 class="box-title"> بيانات اضافية </h3>
                                                                    <!-- /.box-tools -->
                                                                </div>
                                                                <!-- /.box-header -->
                                                                <div class="box-body">
                                                                    <div class="col-md-12">

                                                                        <ul class="list-group list-group-unbordered">
                                                                            <li class="list-group-item">
                                                                                <b>الاسم بالكامل</b> <a class="pull-left">{{ $single['first_name'] }} {{ $single['last_name'] }}</a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>العنوان</b> <a class="pull-left">{{ $single['address_2'] }}</a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b> المدينة</b> <a class="pull-left"> {{ $single['city'] }}</a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>طريقة الدفع</b> <a class="pull-left"> {{ $single['payment_method_title'] }}</a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>ملاحظات العميل</b> <br><a class=""> <span>{{ $single['customer_note'] }}</span></a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>الباقة</b> <a class="pull-left"> {{ $single['name'] }}</a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>  العدد المطلوب</b> <a class="pull-left"> {{ $single['quantity'] }}</a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b> قيمة الباقة</b> <a class="pull-left">{{ $single['total'] }}</a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>ضريبة القيمة المضافة</b><a class="pull-left"> {{ $single['total_tax'] }} </a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>تاريخ الطلب</b><a class="pull-left"> {{ $single['date_created'] }} </a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>حالة المبني </b><a class="pull-left"> {{ $single['_billing_myfield12'] }} </a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>هل المشروع داخل النطاق العمراني</b><a class="pull-left"> {{ $single['_billing_myfield13'] }} </a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>كيف عرفت خير عون</b><a class="pull-left"> {{ $single['_billing_myfield13'] }}  </a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>اوقات الاتصال المناسبة لك</b><a class="pull-left"> {{ $single['_billing_myfield15'] }}  </a>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <b>رقم الواتساب</b><a class="pull-left"> {{ $single['_billing_myfield16'] }}  </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- /.box-body -->
                                                            </div>
                                                            <!-- /.box -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>

                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                         @endif
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>

                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    @endsection