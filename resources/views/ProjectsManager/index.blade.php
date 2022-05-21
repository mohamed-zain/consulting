@extends('ProjectsManager.layout')
<script src="{{ asset('code/highcharts.js') }}"></script>
<script src="{{ asset('code/modules/exporting.js') }}"></script>
<script src="{{ asset('code/modules/export-data.js') }}"></script>
<?php
$pro = \App\Models\ActivateFile::count();
$aproval = \App\Models\Documents::where('mission','!=',null)->count();
$eng = \App\Models\User::where('roll','AdmissionEmp')->count();
$waitingList =  \App\Models\ActivateFile::join('orders','orders.number','=','activate_files.Bennar')
            //->leftJoin('tasks','tasks.Bennar_Code','=','activate_files.Bennar')
            ->where('activate_files.EngID',null)
            ->Orwhere('activate_files.EngID','')
            ->orderBy('orders.id','DESC')
            ->count();
$filecount_by_eng = \App\Models\User::where('roll','AdmissionEmp')->get();
?>
@section('content')
    <div class="col-md-12">
        <h3> ادارة المشاريع  <small> لوحة التحكم </small></h3>

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
                    <span class="info-box-text"> <a href="{{ url('OfficeFiles') }}" >الملفات</a> </span>
                    <span class="info-box-number">{{$aproval}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-user-friends" style="margin-top: 20px"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><a href="{{ url('EmployeesPerformance') }}" >المهندسين</a></span>
                    <span class="info-box-number">{{$eng}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-chart-line" style="margin-top: 20px"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><a href="{{ url('WaitingProjects') }}" >مشاريع قائمة الانتظار</a> </span>
                    <span class="info-box-number">{{ $waitingList }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        @php
            $allJobCards = \App\Models\Tasks::count();
            $doneJobCards = \App\Models\Tasks::where('TaskDone','yes')->count();
            $notDoneJobCards = \App\Models\Tasks::where('TaskDone','no')->count();
            $reject_accept = \App\Models\Documents::where('reject_accept','2')->count();
            $allFiles = \App\Models\Documents::where('mission','!=',null)->count();
        @endphp

        <!-- Info Boxes Style 2 -->
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">جميع المهام</span>
                    <span class="info-box-number">{{$allJobCards}}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                    {{$allJobCards}} All Opened Job Cards
                  </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">المهام المنجزة</span>
                    <span class="info-box-number">{{ $doneJobCards }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: {{ $doneJobCards * $allJobCards / 100 }}%"></div>
                    </div>
                    <span class="progress-description">
                   {{ $doneJobCards * $allJobCards / 100 }}% من المهام منجزة
                  </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">المهام الغير منجزة</span>
                    <span class="info-box-number">{{$notDoneJobCards}}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: {{ $notDoneJobCards * $allJobCards / 100}}%"></div>
                    </div>
                    <span class="progress-description">
                    {{ $notDoneJobCards * $allJobCards / 100}} % من المهام غير منجزة
                  </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">الاعتمادات</span>
                    <span class="info-box-number">{{ $reject_accept }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 40%"></div>
                    </div>
                    <span class="progress-description">
                    {{$reject_accept * $allFiles / 100}}% من اجمالي الاعمادات المطلوبة
                  </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->


            {{--      <script type="text/javascript">
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
                                  y: {{$allJobCards}},
                                  sliced: true,
                                  selected: true
                              },
                                  {
                                  name: 'الغير منجزة',
                                  y: {{$notDoneJobCards}}
                              }, {
                                  name: 'المنجزة',
                                  y: {{$doneJobCards}}
                              }
                              ]
                          }]
                      });
                  </script>--}}
        </div>

        <div class="col-lg-8">

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
                        pointFormat: '{series.name}: <b>{point.percentage} </b>'
                    },
                    xAxis: {
                        categories: [
                            @foreach($filecount_by_eng as $key=> $item)
                                '{{ $item->name }}',
                            @endforeach
                        ],
                        crosshair: true
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
                        data: [
                                @foreach($filecount_by_eng as $key=> $item)
                                @php
                                    $coen = \App\Models\Documents::where('Usr_id',$item->id)->count();
                                @endphp
                            {
                                name: '{{ $item->name }}',
                                y: {{ $coen }}
                            },
                            @endforeach

                        ]
                    }]
                });
            </script>
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
                                    <li  class="active"><a href="#tab_2" data-toggle="tab">انجاز المشاريع</a></li>
                                    <li><a href="#tab_1" data-toggle="tab">المخططات المعتمدة</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">المخططات الغير معتمدة</a></li>
                                    <li><a href="#tab_4" data-toggle="tab">في انتظار التعميد</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane " id="tab_1">
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
                                    <div class="tab-pane active" id="tab_2">
                                        <table id="example1" class="table table-bordered table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <th>العميل</th>
                                                <th>البينار</th>
                                                <th>الجوال</th>
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
                                            $pro_aprove = \App\Models\ActivateFile::where('Status','Approved')->get();
                                            //->join('users','users.id','=','documents.Usr_id')->get();
                                            //->where('documents.reject_accept','1')->get();
                                            // $users = \App\Models\User::where('roll','AdmissionEmp')->get()
                                            ?>
                                            @foreach($pro_aprove as $Single)
                                                <?php
                                                $ps0 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E0')->first();
                                                $ps1 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E1')->first();
                                                $ps2 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E2')->first();
                                                $ps3 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E3')->first();
                                                $ps4 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E4')->first();

                                                $eng0 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E0')->first();
                                                $eng1 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E1')->first();
                                                $eng2 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E2')->first();
                                                $eng3 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E3')->first();
                                                $eng4 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E4')->first();
                                                //dd($eng0->EmpID);
                                                ?>

                                                <tr>
                                                    <td>{{ $Single->Name }}</td>
                                                    <td>{{ $Single->Bennar }}</td>
                                                    <td style="direction: initial"><span>{{ $Single->Phone }}</span></td>
                                                    <td><a href="{{ url('ProProduction') }}/{{ $Single->Bennar }}">{{ $Single->FileCode }}</a></td>
                                                    <td>
                                                        @if($ps0->status == 'yes')
                                                            <small class="label label-success"><i class="fa fa-fw fa-check"></i> </small>
                                                        @else
                                                            <small class="label label-danger"><i class="fa fa-fw fa-close"></i> </small>
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <small class="" style="font-size: 40%">
                                                            @if(empty($eng0))
                                                                none
                                                            @else
                                                                <?php $na0 = \App\Models\User::where('id',$eng0->EmpID)->first() ?>

                                                                {{ $na0->name }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    <td>
                                                        @if($ps1->status == 'yes')
                                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                                        @else
                                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <small class="" style="font-size: 40%">
                                                            @if(empty($eng1))
                                                                none
                                                            @else
                                                                <?php $na1 = \App\Models\User::where('id',$eng1->EmpID)->first() ?>

                                                                {{ $na1->name }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    <td>
                                                        @if($ps2->status == 'yes')
                                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                                        @else
                                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <small class="" style="font-size: 40%">
                                                            @if(empty($eng2))
                                                                none
                                                            @else
                                                                <?php $na2 = \App\Models\User::where('id',$eng2->EmpID)->first() ?>

                                                                {{ $na2->name }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    <td>
                                                        @if($ps3->status == 'yes')
                                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                                        @else
                                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <small class="" style="font-size: 40%">
                                                            @if(empty($eng3))
                                                                none
                                                            @else
                                                                <?php $na3 = \App\Models\User::where('id',$eng3->EmpID)->first() ?>

                                                                {{ $na3->name }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    <td>
                                                        @if($ps4->status == 'yes')
                                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                                        @else
                                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <small class="" style="font-size: 40%">
                                                            @if(empty($eng4))
                                                                none
                                                            @else
                                                                <?php $na4 = \App\Models\User::where('id',$eng4->EmpID)->first() ?>

                                                                {{ $na4->name }}
                                                            @endif
                                                        </small>
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
                                    <div class="tab-pane" id="tab_4">
                                        <?php
                                        $reject = \App\Models\Documents::join('users','users.id','=','documents.Usr_id')
                                            ->join('activate_files','activate_files.Bennar','=','documents.projectID')
                                            ->where('documents.mission','=','E0')
                                            ->where('documents.reject_accept','0')
                                            ->orderBy('documents.created_at','desc')
                                            ->get()
                                        ?>
                                        <table id="example3" class="table table-bordered table-striped table-responsive ">
                                            <thead>
                                            <tr>
                                                <th>المشروع</th>
                                                <th> المهندس</th>
                                                <th>المهمة </th>
                                                <th>الملف </th>
                                                <th> الحالة </th>
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
                                                    <td><span class="label label-warning">في انتظار التعميد</span></td>
                                                    <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>

                                    </div>
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div><!-- /.col -->

                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>@endsection
