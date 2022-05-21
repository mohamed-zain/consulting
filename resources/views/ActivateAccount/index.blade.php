@extends('ActivateAccount.layout')
<script src="{{ asset('code/highcharts.js') }}"></script>
<script src="{{ asset('code/modules/exporting.js') }}"></script>
<script src="{{ asset('code/modules/export-data.js') }}"></script>
<?php
$pro = \App\Models\ActivateFile::count();
$ActiveFiles = \App\Models\ActivateFile::where('Status','Approved')->count();
$UNActiveFiles = \App\Models\ActivateFile::where('Status','UNApproval')->count();
$aproval = \App\Models\Documents::where('mission','!=',null)->count();
$eng = \App\Models\User::where('roll','AdmissionEmp')->count();
$noti = DB::table('app_notification')->count();
$filecount_by_eng = \App\Models\User::where('roll','AdmissionEmp')->get();

?>
@section('content')
    <div class="col-md-12">
        <h3>الادارة المالية   <small>تفعيل الحسابات </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/ActivateAccounts')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/ActivateAccounts') }}"><i class="fa fa-folder-open"></i>  لوحة التحكم </a></li>

        </ol>
    </div>
    <div class="" style="margin-left: 0px !important;">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-file-archive" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"> الملفات المفعلة</span>
                    <span class="info-box-number">{{$ActiveFiles}}<small> ملف</small></span>
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
                    <span class="info-box-text"> الغير مفعلة</span>
                    <span class="info-box-number">{{$UNActiveFiles}}</span>
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
                    <span class="info-box-text">كل المشاريع</span>
                    <span class="info-box-number">{{$pro}}</span>
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
                    <span class="info-box-text">الملفات الهندسية </span>
                    <span class="info-box-number">{{$aproval}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
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
                        text: 'احصائيات المهام المنجزة لكل مهندس'
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
                                    $coen = \App\Models\Tasks::where('EmpID',$item->id)->where('TaskDone','yes')->count();
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


@endsection
