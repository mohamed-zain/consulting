@extends('ActivateAccount.layout')
@section('content')
    <script type="text/javascript">
        swal("ملاحظة", "اذا كان الملف لا يحتاج لتجيير الخدمات قم بأصدار ملف Mission Plan مباشرة", "info");
    </script>
    <div class="col-md-12">
        <h3>ادارة القبول  <small>تعميد خدمات الباقة </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>  تعميد خدمات الباقة - (تجيير الباقة)  </a></li>

        </ol>
    </div>

    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">تجيير الباقة</h3>

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
                            <?php
                            $PID = App\Models\packages::where('packageName',$single->name)->first();
                            $Services = App\Models\PackageServices::join('services','services.id','=','p_services.SID')->where('p_services.PID',$PID->id)->get();
                            $Services2 = App\Models\PackageServices::join('services','services.id','=','p_services.SID')->get();

                            ?>
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
                                    <td> <a href="#">AED {{ number_format($single['total']) }}</a></td>
                                   <td>
                                       <div class="input-group-btn">
                                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">خيارات
                                               <span class="fa fa-caret-down"></span></button>
                                           <ul class="dropdown-menu">
                                               <li><a href="#"  data-toggle="modal" data-target="#add{{ $single['number'] }}">تجيير الباقة</a></li>
                                               <li><a href="{{ url('MissionPlan') }}/{{ $single['number'] }}">اصدار ملف (Mission Plan)</a></li>
                                           </ul>
                                       </div>

                                   </td>
                                    <td><a class="btn btn-warning" href="#"  data-toggle="modal" data-target="#{{ $single['number'] }}">تفاصيل</a></td>

                                </tr>
                                <div class="modal fade" id="add{{ $single['number'] }}" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">تعميد خدمات الباقة</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="box box-warning box-solid">
                                                                <div class="box-header with-border">
                                                                    <h3 class="box-title">خدمات الباقة الاساسية - {{ $single->name }} </h3>
                                                                    <!-- /.box-tools -->
                                                                </div>
                                                                <!-- /.box-header -->
                                                                <div class="box-body">
                                                                    <div class="col-md-12">
                                                                        <ul class="list-group list-group-unbordered">
                                                                            @foreach($Services as $item)
                                                                            <li class="list-group-item">
                                                                                <b>{{ $item->ServiceCode }} - {{ $item->ServiceName }}</b> <a class="pull-left"> <i class="far fa-trash-alt"></i> </a>
                                                                            </li>
                                                                           @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- /.box-body -->
                                                            </div>
                                                            <!-- /.box -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="box box-success box-solid">
                                                                <div class="box-header with-border">
                                                                    <h3 class="box-title">  الخدمات الاضافية </h3>
                                                                    <!-- /.box-tools -->
                                                                </div>
                                                                <!-- /.box-header -->
                                                                <div class="box-body" style="max-height: 500px;overflow: scroll">
                                                                    <div class="col-md-12">
                                                                        <ul class="list-group list-group-unbordered">
                                                                            @foreach($Services2 as $item)
                                                                                <li class="list-group-item">
                                                                                    <b>{{ $item->ServiceCode }} - {{ $item->ServiceName }}</b> <a class="pull-left" style="color: green"> <i class="fas fa-plus-circle"></i> </a>
                                                                                </li>
                                                                            @endforeach
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
