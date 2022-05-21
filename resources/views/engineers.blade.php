@extends('index')
<script src="{{ asset('code/highcharts.js') }}"></script>
<script src="{{ asset('code/modules/exporting.js') }}"></script>
<script src="{{ asset('code/modules/export-data.js') }}"></script>
<?php
$pro = \App\Models\ActivateFile::count();
$aproval = \App\Models\Documents::where('mission','!=',null)->count();
$eng = \App\Models\User::where('roll','AdmissionEmp')->count();
$noti = DB::table('app_notification')->count();
$filecount_by_eng = \App\Models\User::where('roll','AdmissionEmp')->get();
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
                    <span class="info-box-text"> <a href="#"  data-toggle="modal" data-target="#Modal">الملفات</a> </span>
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
                    <span class="info-box-text"><a href="{{ url('engineers') }}" >المهندسين</a></span>
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
                    <span class="info-box-text"><a href="{{ url('AllNotifications') }}" >التنبيهات</a> </span>
                    <span class="info-box-number">{{ $noti }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row">

        <div class="">
            <?php
            $Data = App\Models\User::where('roll','=','AdmissionEmp')->where('id','!=',24)->where('id','!=',25)->get();
            ?>
            @foreach($Data as $item)
                @php
                    $emcco1 = App\Models\Documents::where('Usr_id','=',$item->id)->count();
                    $emcco2 = App\Models\Tasks::where('EmpID','=',$item->id)->where('TaskDone','=','yes')->count();
                    $emcco3 = App\Models\Tasks::where('EmpID','=',$item->id)->where('TaskDone','=','no')->count();
                    $emcco4 = App\Models\Tasks::where('EmpID','=',$item->id)->count();
                    $date = Carbon\Carbon::parse(now()->subDays(3))->format('Y-m-d');
                    $activ = App\Helpers\LogActivity::logActivityListsByEng($item->id);
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
                                <li><a href="#" data-toggle="modal" data-target="#mod5{{ $item->id }}" id="res4{{ $item->id }}"  data-id="5">   نشاط المهندس علي النظام   <span class="pull-left badge bg-navy">{{ $activ->count() }}</span></a></li>
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
                                url: "{{url('Docs_by_emp')}}"+"/"+emp,
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
                                url: "{{url('pro_by_status_emp')}}"+"/"+emp,
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
                                url: "{{url('pro_by_status_emp2')}}"+"/"+emp,
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
                                <h4 class="modal-title">متابعة ملفات المهندس {{ $item->name }}</h4>
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



                    <div class="modal fade" id="mod5{{ $item->id }}" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">نشاط المهندس داخل النظام</h4>
                                </div>
                                <div class="modal-body" style="min-height: 500px">
                                    <table id="example1" class="table table-bordered table-striped table-responsive" style="font-size: 14px;">
                                        <thead>
                                        <tr>
                                            <th>الرقم</th>
                                            <th>الحدث</th>
                                            <th>الرابط</th>
                                           {{-- <th>الطلب</th>--}}
                                            {{--<th>عنوان الانترنت</th>--}}
                                            <th>معلومات المتصفح</th>
                                            {{--<th>اسم المستخدم</th>--}}
                                            <th>التاريخ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($activ->count())
                                            @foreach($activ as $key => $log)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $log->subject }}</td>
                                                    <td class="text-success">{{ $log->url }}</td>
                                                    {{--<td><label class="label label-info">{{ $log->method }}</label></td>--}}
                                                    {{--<td class="text-warning">{{ $log->ip }}</td>--}}
                                                    <td class="text-danger">{{ $log->agent }}</td>
                                                    {{--<td>{{ $log->name }}</td>--}}
                                                    <td>{{ $log->Date}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
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
    <div class="clearfix visible-sm-block"></div>

    <div class="modal fade" id="Modal3" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> المهندسين</h4>
                </div>
                <div class="modal-body">

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
                                    <li  class="active"><a href="#tab_2" data-toggle="tab">انجاز المشاريع</a></li>
                                    <li><a href="#tab_1" data-toggle="tab">المخططات المعتمدة</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">المخططات الغير معتمدة</a></li>
                                    <li><a href="#tab_4" data-toggle="tab">في انتظار التعميد</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane " id="tab_1">
                                        <table id="example4" class="table table-bordered table-striped table-responsive example" style="font-size: 14px">
                                            <thead>
                                            <tr>

                                                <th> االحالة</th>
                                                <th>االمهندس </th>
                                                <th>المشروع </th>
                                                <th> الملف </th>
                                                <th> تم رفعة في </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $pro_aprove = \App\Models\ActivateFile::join('documents','documents.projectID','=','activate_files.Bennar')
                                                ->select('documents.*','activate_files.*','users.*',DB::raw('documents.created_at as DAT'))
                                                ->join('users','users.id','=','documents.Usr_id')
                                                ->where('documents.reject_accept','2')->get();
                                            ?>
                                            @foreach($pro_aprove as $Single)
                                                <tr>
                                                    <td>تم اعتماد   {{ $Single->DocName }} </td>
                                                    <td>{{ $Single->name }}</td>
                                                    <td>{{ $Single->FileCode }}</td>
                                                    <td><a href="{{ url('storage/app/public') }}/{{ $Single->Docs }}" target="_blank">عرض الملف</a></td>
                                                    <td> {{ date('F d, Y', strtotime($Single->DAT)) }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane active" id="tab_2">
                                        <table id="example1" class="table table-bordered table-striped table-responsive example">
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
                                            ->select('documents.*','users.*','activate_files.*',DB::raw('documents.created_at as Dac'))
                                            ->orderBy('documents.id','asc')
                                            ->get()
                                        ?>
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">المخططات الغير معتمدة</h3>
                                                <div class="box-tools pull-right">
                                                    {{--<div class="has-feedback">
                                                        <input type="text" class="form-control input-sm" placeholder="ابحث ...">
                                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                                    </div>--}}
                                                </div><!-- /.box-tools -->
                                            </div><!-- /.box-header -->
                                            <div class="box-body no-padding">
                                                <div class="table-responsive mailbox-messages">
                                                    <table class="table table-hover table-striped example" style="font-size: 14px" id="example6">
                                                        <tbody>
                                                        @foreach($reject as $item)
                                                            <tr>
                                                                <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                                                                <td class="mailbox-name"><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank">{{ $item->FileCode }}</a></td>
                                                                <td class="mailbox-subject"><b>{{ $item->name }}</b> - <span data-toggle="tooltip" data-placement="top" title="{{ $item->reject_reason }}">{{Str::limit($item->reject_reason, 40)}}</span> </td>
                                                                <td class="mailbox-attachment"><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank"><i class="fa fa-paperclip"></i></a></td>
                                                                <td class="mailbox-date">{{ date('F d, Y', strtotime($item->Dac)) }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table><!-- /.table -->
                                                </div><!-- /.mail-box-messages -->
                                            </div><!-- /.box-body -->
                                        </div>
                                        {{--<table id="example5" class="table table-bordered table-striped table-responsive example">
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

                                        </table>--}}

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
                                        <table id="example5" class="table table-bordered table-striped table-responsive " style="font-size: 12px !important;">
                                            <thead>
                                            <tr>
                                                <th>المشروع</th>
                                                <th> المهندس</th>
                                                <th>المهمة </th>
                                                <th>اسم الملف </th>
                                                <th>الملف </th>
                                                <th> الحالة </th>
                                                <th>تاريخ الرفع </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($reject as $item)
                                                <tr>
                                                    <td>{{ $item->FileCode }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->mission }}</td>
                                                    <td>{{ $item->DocName }}</td>
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
    </div>
@endsection
