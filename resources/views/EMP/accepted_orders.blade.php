
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
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>الفرع</b> <a class="pull-left">44444</a>
                            </li>
                            <li class="list-group-item">
                                <b>الادارة</b> <a class="pull-left">4444444</a>
                            </li>
                            <li class="list-group-item">
                                <b> المسمي الوظيفي</b> <a class="pull-left"> 44444444444  </a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>تواصل مع الادارة</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">

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


