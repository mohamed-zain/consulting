@extends('EMP.layout')
@section('content')

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
                <li class="active"><i class="fa fa-folder"></i>  الطلبات الجديده</li>
            </ol>
        </div>
    </section>

    <div class="col-lg-12">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">قائمة الطلبات</h3>

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
                                <th>حالة الطلب</th>
                                <th> رقم البينار</th>
                                <th>  الباقة</th>
                                <th>اسم العميل</th>
                                <th>العنوان</th>
                                <th> الايميل</th>
                                <th> الجوال</th>
                                <th>الدولة</th>
                                <th>قيمة الاشتراك</th>
                                <th> تفاصيل</th>

                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td><span class="badge bg-green">{{ $single['status'] }}</span></td>
                                    <td><span class="badge bg-yellow ">{{ $single['number'] }}</span></td>
                                    <td><span class="badge bg-red-gradient ">{{ $single['name'] }}</span></td>
                                    <td><span class="badge bg-primary ">{{$single['first_name'] }} {{$single['last_name'] }}</span></td>
                                    <td>  <span>{{ $single['city'] }} </span></td>
                                    <td>  <span>{{ $single['email'] }} </span></td>
                                    <td>  <span>{{ $single['phone'] }} </span></td>
                                    <td>  <span>{{ $single['country'] }} </span></td>
                                    <td><a href="#">{{ $single['total'] }}</a></td>
                                    <td><a href="{{ url('OrderDetails') }}/{{ $single['number'] }}">تفاصيل</a></td>

                                </tr>


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
    </div>

    <div class="container">
        @if(Session::has('Flash44'))
            <script type="text/javascript">
                swal("خطأ", "{{ Session::get('Flash44') }}", "error");
            </script>
        @endif
    </div>

@endsection
