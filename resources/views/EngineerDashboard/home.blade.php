@extends('index')
<script src="{{ asset('code/highcharts.js') }}"></script>
<script src="{{ asset('code/modules/exporting.js') }}"></script>
<script src="{{ asset('code/modules/export-data.js') }}"></script>
<?php
$pro = \App\Models\ActivateFile::count();
$aproval = \App\Models\Documents::where('reject_accept',1)->count();
$eng = \App\Models\User::where('roll','AdmissionEmp')->count();
?>
@section('content')
    <div class="col-md-12">
        <h3>
            لوحة التحكم
            <small>الرئيسية</small>

        </h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>  لوحة التحكم </a></li>

        </ol>
    </div>
    <div class="" style="margin-left: 0px !important;">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-project-diagram" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="#"  data-toggle="modal" data-target="#Modal2" >المشاريع</a></span>
                    <span class="info-box-number">{{$pro}}<small> مشروع</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-hard-hat" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"> <a href="#"  data-toggle="modal" data-target="#Modal">الاعتمادات</a> </span>
                    <span class="info-box-number">{{$aproval}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-user-friends" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="#"  data-toggle="modal" data-target="#Modal3">المهندسين</a></span>
                    <span class="info-box-number">{{$eng}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-chart-line" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">الخدمات </span>
                    <span class="info-box-number">17</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">

        <div class="col-lg-6">

            <div id="char" style="min-width: 310px; height: 450px; max-width: 100%; margin: 0 auto"></div>
            <script type="text/javascript">
                // Build the chart
                Highcharts.chart('char', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ' انجاز  المشاريع '
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Job Cards',
                        colorByPoint: true,
                        data: [{
                            name: 'كل البطاقات الوظيفية',
                            y: 61.41,
                            sliced: true,
                            selected: true
                        }, {
                            name: 'الغير منجزة',
                            y: 11.84
                        }, {
                            name: 'المنجزة',
                            y: 10.85
                        }]
                    }]
                });
            </script>
        </div>

        <div class="col-lg-6">

            <div id="char2" style="min-width: 310px; height: 450px; max-width: 100%; margin: 0 auto"></div>
            <script type="text/javascript">
                // Build the chart
                Highcharts.chart('char2', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'column'
                    },
                    title: {
                        text: 'اعتمادات المشاريع'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}ملف </b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Files',
                        colorByPoint: true,
                        data: [{
                            name: 'الاعتمادات',
                            y: 61.41,

                        }, {
                            name: 'المرفوض',
                            y: 11.84
                        }, {
                            name: 'تحت المراجعة',
                            y: 10.85
                        }]
                    }]
                });
            </script>
        </div>
    </div>
    <div class="clearfix visible-sm-block"></div>

    <div class="modal fade" id="Modal3" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> المهندسين</h4>
                </div>
                <div class="modal-body">
                    <div class="">
                        <?php
                        $Data = App\Models\User::where('roll','=','AdmissionEmp')->get();
                        ?>
                        @foreach($Data as $item)
                            @php
                                $emcco1 = App\Models\Documents::where('Usr_id','=',$item->id)->count();
                                $emcco2 = App\Models\Tasks::where('EmpID','=',$item->id)->where('TaskDone','=','yes')->count();
                                $emcco3 = App\Models\Tasks::where('EmpID','=',$item->id)->where('TaskDone','=','no')->count();
                                $emcco4 = App\Models\Tasks::where('EmpID','=',$item->id)->count();
                                $date = Carbon\Carbon::parse(now()->subDays(3))->format('Y-m-d');
                            @endphp
                            <div class="col-md-4">
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header " style="padding:20px;background-color: #323232 ;color: white">
                                        <!-- /.widget-user-image -->
                                        <h3 class="widget-user-username">{{ $item->name }}
                                            @if($item->isOnline())
                                                <a href="#" style="font-size: 10px;color: white"><i class="fa fa-circle text-success"></i> متصل الان ..</a>
                                            @else
                                                <a href="#" style="font-size: 10px;color: white"><i class="fa fa-circle text-danger"></i> غير متصل الان</a>
                                            @endif
                                        </h3>
                                        <h5 class="widget-user-desc">{{ $item->email }}</h5>
                                    </div>
                                    <div class="box-footer no-padding">
                                        <ul class="nav nav-stacked">
                                            <li><a href="#">آخر دخول للنظام <span class="pull-left badge bg-aqua">
                                            {{ Carbon\Carbon::parse($item->last_login_at)->diffForHumans() }}
                                            </span></a>
                                            </li>
                                            <li><a href="#" data-toggle="modal" data-target="#mod{{ $item->id }}" id="res{{ $item->id }}" data-id="1">ملفات المهندس <span class="pull-left badge bg-aqua">{{ $emcco1 }}</span></a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#mod2{{ $item->id }}" id="res2{{ $item->id }}" data-id="6">المشاريع المنجزة<span class="pull-left badge bg-green">{{ $emcco2 }}</span></a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#mod3{{ $item->id }}" id="res3{{ $item->id }}"  data-id="5"> المشاريع الغير منجزة  <span class="pull-left badge bg-red">{{ $emcco3 }}</span></a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#mod4{{ $item->id }}" id="res4{{ $item->id }}"  data-id="5">  جميع مشاريع المهندس   <span class="pull-left badge bg-yellow">{{ $emcco4 }}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#mod{{ $item->id }}').on('shown.bs.modal', function (e) {
                                        var emp = "{{ $item->id }}";
                                        $.ajax({
                                            url: "{{url('Order_byStatus_and_emp')}}/"+"1"+"/"+emp,
                                            type: "GET",
                                            success: function(data){
                                                $("#Droping{{ $item->id }}").html(data);
                                            },
                                            error: function(){
                                                console.log("No results for " + data + ".");
                                            }
                                        });
                                    });
                                    $('#mod2{{ $item->id }}').on('shown.bs.modal', function (e) {
                                        var emp = "{{ $item->id }}";
                                        $.ajax({
                                            url: "{{url('Order_byStatus_and_emp')}}/"+"6"+"/"+emp,
                                            type: "GET",
                                            success: function(data){
                                                $("#Droping2{{ $item->id }}").html(data);
                                            },
                                            error: function(){
                                                console.log("No results for " + data + ".");
                                            }
                                        });
                                    });

                                    $('#mod3{{ $item->id }}').on('shown.bs.modal', function (e) {
                                        var emp = "{{ $item->id }}";
                                        $.ajax({
                                            url: "{{url('Order_byStatus_and_emp')}}/"+"5"+"/"+emp,
                                            type: "GET",
                                            success: function(data){
                                                $("#Droping3{{ $item->id }}").html(data);
                                            },
                                            error: function(){
                                                console.log("No results for " + data + ".");
                                            }
                                        });
                                    });




                                });
                            </script>
                            <div class="modal fade" id="mod{{ $item->id }}" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">متابعة طلبات المهندس {{ $item->name }}</h4>
                                        </div>
                                        <div class="modal-body" style="min-height: 500px">
                                            <div id="Droping{{ $item->id }}">

                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="mod2{{ $item->id }}" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">متابعة طلبات المهندسين</h4>
                                        </div>
                                        <div class="modal-body" style="min-height: 500px">
                                            <div id="Droping2{{ $item->id }}">

                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="mod3{{ $item->id }}" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">متابعة طلبات المهندسين</h4>
                                        </div>
                                        <div class="modal-body" style="min-height: 500px">
                                            <div id="Droping3{{ $item->id }}">

                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="mod5{{ $item->id }}" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">متابعة طلبات المهندسين</h4>
                                        </div>
                                        <div class="modal-body" style="min-height: 500px">
                                            <div id="Droping5{{ $item->id }}">

                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">اخر الملفات المرفوعة </h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-responsive example">
                    <thead></thead>
                    <?php $fil = \App\Models\Documents::join('users','users.id','=','documents.Usr_id')
                        ->where('documents.mission','!=',null)
                        ->orderBy('documents.id','desc')
                        ->get();
                    ?>
                    @foreach($fil as $item)
                        <?php
                        $cat = '' ;
                        if($item->cat == '1'){
                            $cat = 'مخطط';
                        }elseif($item->cat == '2'){
                            $cat = 'تقرير كميات';
                        }elseif($item->cat == '3'){
                            $cat = 'توصيات';
                        }elseif($item->cat == '4'){
                            $cat = 'اخري';
                        }
                        ?>
                        <?php $fname = \App\Models\ActivateFile::where('Bennar',$item->projectID)->first(); ?>
                        <tr>
                            <td >
                                <a href="javascript::;" class="product-title">{{ $item->mission }} </a>
                                <span class="product-description">
                          قام المهندس <a class="">{{ $item->name }}</a> برفع ملف {{$cat}} <a> </a> للعميل {{ $fname->FileCode }}
                          <p></p>
                          <p><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank">اضغط للعرض</a></p>
                        </span>
                            </td>
                        </tr><!-- /.item -->
                    @endforeach

                </table>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="Modal2" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ملخصات المشاريع</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">الاعتمادات</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">مراحل المشاريع</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">المخططات الغير معتمدة</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <table id="example2" class="table table-bordered table-striped table-responsive">
                                            <thead>
                                            <tr>

                                                <th> االحالة</th>
                                                <th>االمهندس </th>
                                                <th>المشروع </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $pro_aprove = \App\Models\ActivateFile::join('documents','documents.projectID','=','activate_files.Bennar')
                                           ->join('users','users.id','=','documents.Usr_id')
                                                ->where('documents.reject_accept','2')->get();
                                            ?>
                                            @foreach($pro_aprove as $Single)
                                                <tr>
                                                    <td>تم اعتماد   {{ $Single->DocName }} </td>
                                                    <td>{{ $Single->name }}</td>
                                                    <td>{{ $Single->FileCode }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <table id="example1" class="table table-bordered table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <th>العميل</th>
                                                <th> رمز المشروع</th>
                                                <th>E0 </th>
                                                <th>E1 </th>
                                                <th>E2 </th>
                                                <th>E3 </th>
                                                <th>E4 </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $pro_aprove = \App\Models\ActivateFile::all();
                                                //->join('users','users.id','=','documents.Usr_id')->get();
                                                //->where('documents.reject_accept','1')->get();
                                            $users = \App\Models\User::where('roll','AdmissionEmp')->get()
                                            ?>
                                            @foreach($pro_aprove as $Single)
                                                <?php
                                                    $ps0 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E0')->first();
                                                    $ps1 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E1')->first();
                                                    $ps2 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E2')->first();
                                                    $ps3 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E3')->first();
                                                    $ps4 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E4')->first();
                                                ?>
                                                <tr>
                                                    <td>{{ $Single->Name }}</td>
                                                    <td>{{ $Single->FileCode }}</td>
                                                    <td>
                                                        @if($ps0->status == 'yes')
                                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                                        @else
                                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                                            @endif
                                                    </td>
                                                    <td>
                                                        @if($ps1->status == 'yes')
                                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                                        @else
                                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($ps2->status == 'yes')
                                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                                        @else
                                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($ps3->status == 'yes')
                                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                                        @else
                                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($ps4->status == 'yes')
                                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                                        @else
                                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                                        @endif
                                                    </td>

                                                </tr>

                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">
                                        <?php
                                        $reject = \App\Models\Documents::join('users','users.id','=','documents.Usr_id')
                                            ->join('activate_files','activate_files.Bennar','=','documents.projectID')
                                        ->where('documents.mission','!=',null)
                                        ->where('documents.reject_accept','1')
                                        ->get()
                                        ?>
                                        <table id="" class="table table-bordered table-striped table-responsive example">
                                            <thead>
                                            <tr>
                                                <th>المشروع</th>
                                                <th> المهندس</th>
                                                <th>المهمة </th>
                                                <th>الملف </th>
                                                <th>سبب الرفض </th>
                                                <th>التاريخ </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($reject as $item)
                                           <tr>
                                               <td>{{ $item->FileCode }}</td>
                                               <td>{{ $item->name }}</td>
                                               <td>{{ $item->mission }}</td>
                                               <td><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank">عرض</a> </td>
                                               <td>{{ $item->reject_reason }}</td>
                                               <td>{{ $item->updated_at }}</td>
                                           </tr>
                                            @endforeach
                                            </tbody>

                                        </table>

                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div><!-- /.col -->

                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
