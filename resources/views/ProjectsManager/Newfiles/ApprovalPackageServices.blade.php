@extends('ProjectsManager.layout')
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
    {{--<script type="text/javascript">
        swal("ملاحظة", "اذا كان الملف لا يحتاج لتجيير الخدمات قم بأصدار ملف Mission Plan مباشرة", "info");
    </script>--}}
    <div class="col-md-12">
        <h3> الادارة الهندسية  <small>تعميد خدمات الباقة الهندسية </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>  تعميد خدمات الباقة  </a></li>

        </ol>
    </div>

    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">تعميد الباقة وفتح ملف التصميم</h3>

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
                            <th>  المشروع</th>
                            <th>اسم العميل</th>
                            <th> الايميل</th>
                            <th> الجوال</th>
                            <th> الاجراء</th>
                            <th> تفاصيل</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $single)
                            <?php
                            $PID = App\Models\packages::where('packageName',$single->name)->first();
                            $st = App\Models\ActivateFile::where('Bennar',$single['number'])->first();
                            $Services = App\Models\PackageServices::join('services','services.id','=','p_services.SID')->where('p_services.PID',$PID->id)->get();
                            $Services2 = App\Models\Services::all();
                            //$diff = $Services->except($Services2);
                            //$diff->all();

                            ?>
                            @if(isset($st))
                                <tr>
                                    <td><span class="badge bg-yellow ">{{ $single['number'] }}</span></td>
                                    <td><span class="">{{ $st['FileCode'] }}</span></td>
                                    <td><span class=" ">{{$single['first_name'] }} {{$single['last_name'] }}</span></td>
                                    <td>  <span>{{ $single['email'] }} </span></td>
                                    <td>  <span dir="ltr">{{ $single['phone'] }} </span></td>
                                   <td>
                                        @if($st->Status == 'Approved')
                                           <div class="input-group-btn">
                                               <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">تم التعميد
                                                   <span class="fa fa-caret-down"></span></button>
                                               <ul class="dropdown-menu">
                                                   <li><a href="{{ url('MissionPlan') }}/{{ $single['number'] }}">اصدار ملف (Mission Plan)</a></li>
                                                   <li><a href="#" id="{{ $single['number'] }}"  data-id="{{$single['number']}}" data-token="{{csrf_token()}}" onclick='
                                                               var audio = document.getElementById("audioError");
                                                               audio.play();
                                                               swal({
                                                               title: "إلغاء تعميد الخدمات التالية",
                                                               text: "@foreach($Services as $item) {{ $item->ServiceCode }} - @endforeach ",
                                                               type: "info",
                                                               showCancelButton: true,
                                                               closeOnConfirm: false,
                                                               showLoaderOnConfirm: true,
                                                               },
                                                               function(){
                                                               setTimeout(function(){
                                                               var id = $("#{{ $single['number'] }}").data("id");
                                                               var token = $("#{{ $single['number'] }}").data("token");
                                                               $.ajax({
                                                               type: "GET",
                                                               url : "{{ url('UNApprove') }}"+"/"+"{{ $single['number'] }}",
                                                               data : {
                                                               "bennar":"{{ $single['number'] }}",
                                                               },
                                                               //dataType: "json",
                                                               cache:false,

                                                               success  : function(data) {
                                                               var audio = document.getElementById("audioSuccess");
                                                               audio.play();
                                                               swal("تهانينا!",data , "success");
                                                               setTimeout(function() {
                                                               var href = "{{url('ApprovalPackageServices')}}";
                                                               window.location.href = href;
                                                               },1000);


                                                               },
                                                               error: function(xhr, textStatus, thrownError){
                                                               // console.log(thrownError);
                                                               swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                                               }

                                                               });

                                                               }, 1000);
                                                               });
                                                               '>إلغاء التعميد</a></li>
                                               </ul>
                                           </div>
                                            @else
                                       <div class="input-group-btn">
                                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">خيارات
                                               <span class="fa fa-caret-down"></span></button>
                                           <ul class="dropdown-menu">

                                               <li><a href="#" id="{{ $single['number'] }}"  data-id="{{$single['number']}}" data-token="{{csrf_token()}}" onclick='
                                                           var audio = document.getElementById("audioError");
                                                           audio.play();
                                                           swal({
                                                           title: "المهمات الهندسية المراد اعتمادها",
                                                           text: "@foreach($Services as $item) {{ $item->ServiceCode }} - @endforeach ",
                                                           type: "info",
                                                           showCancelButton: true,
                                                           closeOnConfirm: false,
                                                           showLoaderOnConfirm: true,
                                                           },
                                                           function(){
                                                           setTimeout(function(){
                                                           var id = $("#{{ $single['number'] }}").data("id");
                                                           var token = $("#{{ $single['number'] }}").data("token");
                                                           $.ajax({
                                                           type: "GET",
                                                           url : "{{ url('Approval') }}"+"/"+"{{ $single['number'] }}",
                                                           data : {
                                                           "bennar":"{{ $single['number'] }}",
                                                           },
                                                           //dataType: "json",
                                                           cache:false,

                                                           success  : function(data) {
                                                           var audio = document.getElementById("audioSuccess");
                                                           audio.play();
                                                           swal("تهانينا!",data , "success");

                                                           },
                                                           error: function(xhr, textStatus, thrownError){
                                                           // console.log(thrownError);
                                                           swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                                           }

                                                           });

                                                           }, 1000);
                                                           });
                                                           '>إعتماد الخدمات (التعميد)</a></li>
                                           </ul>
                                       </div>
                                            @endif
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
                                                <div class="stepwizard">
                                                    <div class="stepwizard-row setup-panel">
                                                        <div class="stepwizard-step col-xs-3">
                                                            <a href="#step-1" type="button" class="btn btn-warning btn-circle stp" ><i class="fa fa-check"></i></a>
                                                            <p><small>إدارة القبول- التواصل</small></p>
                                                        </div>
                                                        <div class="stepwizard-step col-xs-3">
                                                            <a href="#step-2" type="button" class="btn btn-warning btn-circle stp"><i class="fa fa-check"></i></a>
                                                            <p><small>تفعيل الملف - المالية</small></p>
                                                        </div>
                                                        <div class="stepwizard-step col-xs-3">
                                                            <a href="#step-3" type="button" class="{{ $st->Status == 'Approved' ? 'btn btn-warning' : 'btn btn-danger' }}  btn-circle stp" >@if($st->Status == 'Approved')  <i class="fa fa-check"></i> @else 3 @endif </a>
                                                            <p><small>الادارة الهندسية- التعميد</small></p>
                                                        </div>
                                                        <div class="stepwizard-step col-xs-3">
                                                            <a href="#step-4" type="button" class="btn btn-default btn-circle stp" disabled="disabled">4</a>
                                                            <p><small>فتح (Job Card)</small></p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">
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
