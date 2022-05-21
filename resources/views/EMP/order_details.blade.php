@extends('EMP.layout')
@section('content')

    <script>
        $(document).ready(function(){
        $("#bennar_status").change(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('GetOpt') }}",
                type: "POST",
                data: { id : $(this).val() },
                success: function(data){
                    $("#Droping3233").html(data);
                },
                error: function(){
                    console.log("No results for " + data + ".");
                }
            });
        });
        });
    </script>
    <div id=""></div>
    <section class="content-header">
        <div class="">
            <h3>
                إدارة القبول
                <small>البروفايل</small>
            </h3>
            <ol class="breadcrumb">
                <li><a href="{{url('EmpDashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active"><a href="#" class="NewOrders"><i class="fa fa-folder-open"></i>الطلبات</a></li>
                <li class="active"><i class="fa fa-folder"></i>تفاصيل الطلب</li>
            </ol>
        </div>
    </section>
    <div class="">
    <div class="col-lg-12 row">

            <div class="info-box">
                <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">
                        @if(isset($info))
                            @if($info->bennar_status == 0)
                                <span class="">لم يتم عليه اي اجراء</span>
                            @elseif($info->bennar_status == 1)
                                <span class="">تم التواصل مع العميل</span>
                            @elseif($info->bennar_status == 2)
                                <span class="">تم تحويل العميل للادارة الهندسية</span>
                            @elseif($info->bennar_status == 3)
                                <span class="">تم تحويل العميل للإدارة العليا</span>
                            @elseif($info->bennar_status == 4)
                                <span class="">العميل جاهز للدفع</span>
                            @elseif($info->bennar_status == 5)
                                <span class="">تم الغاء الطلب</span>
                            @endif
                            @endif
                    </span>
                    <script type="text/javascript">
                        swal("{{ isset($info->client_type) ? $info->client_type : 'ملاحظات' }}", "{{ isset($info->notes) ? $info->notes : 'لا توجد ملاحظات' }}", "info");
                    </script>
                    <span class="info-box-number">{{ isset($info->client_type) ? $info->client_type : 'لا توجد بيانات' }}</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 1%"></div>
                    </div>
                    <span class="progress-description">
                    {{ isset($info->notes) ? $info->notes : 'لا توجد ملاحظات' }}
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title"> بيانات اضافية </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#ChangeStatus">إتخاذ اجراء</button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>الاسم بالكامل</b> <a class="pull-left">{{ $details['first_name'] }} {{ $details['last_name'] }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>العنوان</b> <a class="pull-left">{{ $details['address_2'] }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b> المدينة</b> <a class="pull-left"> {{ $details['city'] }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>طريقة الدفع</b> <a class="pull-left"> {{ $details['payment_method_title'] }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>ملاحظات العميل</b> <br><a class=""> <span>{{ $details['customer_note'] }}</span></a>
                                </li>
                                <li class="list-group-item">
                                    <b>الباقة</b> <a class="pull-left"> {{ $details['name'] }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>  العدد المطلوب</b> <a class="pull-left"> {{ $details['quantity'] }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b> قيمة الباقة</b> <a class="pull-left">{{ $details['total'] }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>ضريبة القيمة المضافة</b><a class="pull-left"> {{ $details['total_tax'] }} </a>
                                </li>
                                <li class="list-group-item">
                                    <b>تاريخ الطلب</b><a class="pull-left"> {{ $details['date_created'] }} </a>
                                </li>
                                <li class="list-group-item">
                                    <b>حالة المبني </b><a class="pull-left"> {{ $details['_billing_myfield12'] }} </a>
                                </li>
                                <li class="list-group-item">
                                    <b>هل المشروع داخل النطاق العمراني</b><a class="pull-left"> {{ $details['_billing_myfield13'] }} </a>
                                </li>
                                <li class="list-group-item">
                                    <b>كيف عرفت خير عون</b><a class="pull-left"> {{ $details['_billing_myfield13'] }}  </a>
                                </li>
                                <li class="list-group-item">
                                    <b>اوقات الاتصال المناسبة لك</b><a class="pull-left"> {{ $details['_billing_myfield15'] }}  </a>
                                </li>
                                <li class="list-group-item">
                                    <b>رقم الواتساب</b><a class="pull-left"> {{ $details['_billing_myfield16'] }}  </a>
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
    <div class="modal fade" id="ChangeStatus" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اتخاذ اجراء علي طلب العميل</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(['url' => 'Order_status_change', 'method' => 'post']) }}
                    {{ csrf_field() }}
                    <input type="hidden" name="Emp" id="Emp" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="PackName" id="" value="{{ $details['name'] }}">
                    <input type="hidden" name="bennar_number" id="" value="{{ $details['number'] }}">
                    <div class="form-inline">
                        <select name="bennar_status" id="bennar_status"  class="form-control select2" style="width: 80%;" required>
                            <option value="">---------اختر الاجراء-------</option>
                            <option value="1">تم التواصل مع العميل</option>
                            <option value="2">تحويل العميل للادارة الهندسية</option>
                            <option value="3"> تحويل العميل للإدارة العليا</option>
                            <option value="4">العميل جاهز للدفع</option>
                            <option value="5">الغاء الطلب</option>
                            @if(in_array(Auth::user()->id,array(21,22)))
                            <option value="6"> تم قبول الطلب وارسال الفاتورة</option>
                            @endif
                        </select>
                        {{--  <input type="number" name="phone"  class="form-control" placeholder="ابحث برقم الجوال" style="width: 80%;" required>--}}
                        <button type="submit" class="btn btn-success">تنفيذ</button>
                    </div>

                    <div id="Droping3233"></div>
                    {{ Form::close() }}



                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @if(Session::has('Flash44'))
            <script type="text/javascript">
                swal("خطأ", "{{ Session::get('Flash44') }}", "error");
            </script>
        @endif
    </div>

@endsection
