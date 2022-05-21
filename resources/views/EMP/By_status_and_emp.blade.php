
@php
$id = Auth::user()->id;
if ($id == 23){
$array = array('KZ-MA','KZ-Kpro','KZ-DKO','KZ-project','KZ-Spro','KZ-AP','KZ-CHPRO');
}elseif($id == 24){
 $array = array('KZ-MA','KZ-Kpro','KZ-DKO','KZ-project','KZ-Spro','KZ-AP','KZ-CHPRO');
}elseif($id == 25){
 $array = array('KZ-MA','KZ-Kpro','KZ-DKO','KZ-project','KZ-Spro','KZ-AP','KZ-CHPRO');

}elseif($id == 22){
$array = array('KZ-MA','KZ-Kpro','KZ-DKO','KZ-project','KZ-Spro','KZ-AP','KZ-CHPRO');

}

@endphp

    <div id=""></div>


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
                                <th> الاجراء</th>
                                <th> تفاصيل</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $single)
                                @php
                                    $states = DB::table('bennars_status')->where('bennar_number','=',$single['number'])->where('bennar_status','=',$sta14)->where('Emp','=',$empid)->first();
                                @endphp
                                @if(in_array($single['name'] ,$array) && !empty($states))

                                <tr>
                                    <td><span class="badge bg-green">{{ $single['status'] }}</span></td>
                                    <td><span class="badge bg-yellow ">{{ $single['number'] }}</span></td>
                                    <td><span class="badge bg-red-gradient ">{{ $single['name'] }}</span></td>
                                    <td><span class="badge bg-primary ">{{$single['first_name'] }} {{$single['last_name'] }}</span></td>
                                    <td>  <span>{{ $single['city'] }} </span></td>
                                    <td>  <span>{{ $single['email'] }} </span></td>
                                    <td>  <span>{{ $single['phone'] }} </span></td>
                                    <td>  <span>{{ $single['country'] }} </span></td>
                                    <td> <a href="#">AED {{ number_format($single['total']) }}</a></td>
                                    <td>
                                            @if(isset($states))
                                            @if($states->bennar_status == 0)
                                                <span class="label label-danger">لم يتم عليه اي اجراء</span>
                                                @elseif($states->bennar_status == 1)
                                                <span class="label label-success">تم التواصل مع العميل</span>
                                            @elseif($states->bennar_status == 2)
                                                <span class="label label-warning">تم تحويل العميل للادارة الهندسية</span>
                                            @elseif($states->bennar_status == 3)
                                                <span class="label label-primary">تم تحويل العميل للإدارة العليا</span>
                                            @elseif($states->bennar_status == 4)
                                                <span class="label label-info">العميل جاهز للدفع</span>
                                            @elseif($states->bennar_status == 5)
                                                <span class="label label-danger">تم الغاء الطلب</span>
                                                @elseif($states->bennar_status == 6)
                                                <span class="label label-warning">تم قبول الطلب وارسال الفاتورة</span>
                                            @endif
                                                @else
                                            <span class="label label-danger">لم يتم عليه اي اجراء</span>
                                            @endif

                                        </td>
                                    <td><a class="btn btn-dark" href="{{ url('OrderDetails') }}/{{ $single['number'] }}">تفاصيل</a></td>

                                </tr>
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
    </div>

    <div class="container">
        @if(Session::has('Flash44'))
            <script type="text/javascript">
                swal("خطأ", "{{ Session::get('Flash44') }}", "error");
            </script>
        @endif
    </div>
<script>
    $(function () {
        $(".select2").select2();
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

