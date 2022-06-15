@extends('layouts.index')
@section('content')
    <style>

        .users-list>li {
            width: 20% !important;
            float: right;
        }
        /*************************************/
        .tableone{
            width: 100%;
            /* align-content: center; */
            text-align: center;
            direction: ltr;
            font-family: 'STC Regular';
        }
        .tableone , .td, .th {
            border: 2px solid #595959;
            border-collapse: collapse;

        }
        .tableone ,.td, .th {
            padding: 10px;
            height: 25px;
        }
        .ta2 {
            border: solid 1px #FFF;
            width: 100%;
            /* align-content: center; */
            text-align: center;
            direction: ltr;
            font-family: 'STC Regular';
        }
        .ta2 {
            border: solid 1px #FFF;
            width: 100%;
            /* align-content: center; */
            text-align: center;
            direction: ltr;
            font-family: 'STC Regular';
        }

        .td2, .th {
            font-size: 2em;
            font-family: "STC Regular";
            border-collapse: collapse;

        }
        .td3 {
            font-size: 2em;
            font-family: "STC Regular";
            border-collapse: collapse;

        }
        .ta2 ,.td2, .th {
            padding: 10px;
            height: 25px;
        }
        .sercode{
            padding: 10px;
            background: #e39548;
            width: 100px ;
            -webkit-print-color-adjust: exact;

        }
        /**************************************8/
         */
        @media print {
            .tableone{
                width: 100%;
                /* align-content: center; */
                text-align: center;
                direction: ltr;
                font-family: 'STC Regular';
            }
            .tableone , .td, .th {
                border: 2px solid #595959;
                border-collapse: collapse;

            }
            .tableone ,.td, .th {
                padding: 10px;
                height: 25px;
            }
            .ta2 {
                border: solid 1px #FFF;
                width: 100%;
                /* align-content: center; */
                text-align: center;
                direction: ltr;
                font-family: 'STC Regular';
            }
            .ta2 {
                border: solid 1px #FFF;
                width: 100%;
                /* align-content: center; */
                text-align: center;
                direction: ltr;
                font-family: 'STC Regular';
            }

            .td2, .th {
                font-size: 2em;
                font-family: "STC Regular";
                border-collapse: collapse;

            }
            .td3 {
                font-size: 2em;
                font-family: "STC Regular";
                border-collapse: collapse;

            }
            .ta2 ,.td2, .th {
                padding: 10px;
                height: 25px;
            }
            .sercode{
                padding: 10px;
                background: #e39548;
                width: 100px ;
                -webkit-print-color-adjust: exact !important;

            }
        }



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
        .mailbox-attachments li{
            width: 190px !important;
        }
        .mailbox-attachment-info{
            height: 75px !important;
        }
    </style>
   <div class="row">
  <section class="content-header">
        <div class="col-md-12">
            <h3>
                لوحة التحكم
                <small>تفاصيل المشروع</small>
            </h3>
          <ol class="breadcrumb" >
            <li><a href="{{url('ConsultingDashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('Projects') }}"><i class="fa fa-folder-open"></i> نتائج بحث للمشروع  {{ $Single->FileCode }} - {{ $Single->Bennar }} </a></li>
          </ol>
          </div>
        </section>
</div>

    <?php $Ser = \App\Models\ProjectStatus::all(); ?>
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> التعديل علي بيانات المشروع </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->

            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <a class="btn btn-app"  data-toggle="modal" data-target="#Modal3">
                    <i class="fa fa-exclamation-triangle" style="font-size: 55px;"></i> حالة المشروع
                </a>
                <a href="#"  class="btn btn-app" data-toggle="modal" data-target="#RFiles">
                    <i class="fa fa-tasks fa-2x" style="font-size: 55px;"></i>  الخدمات المطلوبة
                </a>
               {{-- <a href="#"  class="btn btn-app"  data-toggle="modal" data-target="#Modal55888">
                    <i class="fa fa-chess-board fa-2x" style="font-size: 55px;"></i>  المهمات الهندسية
                </a>--}}
                {{--<a href="#"  class="btn btn-app" data-toggle="modal" data-target="#Modal55">
                    <i class="fa fa-stream fa-2x" style="font-size: 55px;"></i>مرحلة المشروع
                </a>--}}
                <a href="#"  class="btn btn-app" data-toggle="modal" data-target="#FilesPro">
                    <i class="fa fa-folder-open fa-2x" style="font-size: 55px;"></i>ملفات من خير عون
                </a>
                <a href="{{ url('DocsByPro') }}?search_text={{ $Single->Bennar }}"  class="btn btn-app" >
                    <i class="fa fa-folder fa-2x" style="font-size: 55px;"></i>ملفاتك المرفوعة
                </a>




            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
   {{-- <div class="modal fade" id="Modal55888" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">مهام الخدمات الهندسية</h4>
                </div>
                <div class="modal-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            @foreach($Ser as $item45)
                                <li class="@if($item45->ServiceCode=='E0' or $item45->ServiceCode=='S0') active @endif"><a href="#{{ $item45->ServiceCode }}" data-toggle="tab">{{ $item45->ServiceCode }}</a></li>
                            @endforeach

                        </ul>
                        <div class="tab-content">
                            @foreach($Ser as $item45)
                                <div class="tab-pane @if($item45->ServiceCode=='E0' or $item45->ServiceCode=='S0') active @endif" id="{{ $item45->ServiceCode }}">

                                    <?php $tts = \App\Models\Tasks::join('users','users.id','=','tasks.EmpID')->where('Bennar_Code',$Single->number)->where('Mission',$item45->ServiceCode)->first(); ?>
                                    <table id="" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                        <tr>
                                            <th>المهمة</th>
                                            <th>اسم المهندس المسندة له</th>
                                            <th>هل تم الاطلاع علي المهمة </th>
                                            <th>هل انجزت </th>
                                            <th>هل وافق عليها العميل </th>
                                            <th>تاريخ اسناد المهمة </th>
                                        </tr>
                                        </thead>
                                        <tbody id="comm">
                                        @if(isset($tts))
                                            <tr>

                                                <td>{{ $tts->Mission }}</td>
                                                <td>{{ $tts->name }}</td>
                                                <td>
                                                    @if($tts->TaskRead == 'yes')
                                                        <span class="label label-danger">تم الاطلاع المهمة</span>
                                                    @elseif($tts->TaskRead == 'no')
                                                        <span class="label label-warning">لم يتم الاطلاع</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($tts->TaskDone == 'yes')
                                                        <span class="label label-danger">تم انجاز المهمة</span>
                                                    @elseif($tts->TaskDone == 'no')
                                                        <span class="label label-warning">لم يتم الانجاز </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($tts->TaskAccept == 'hold')
                                                        <span class="label label-danger">في الانتظار</span>
                                                    @elseif($tts->TaskAccept == 'accept')
                                                        <span class="label label-warning">تمت الموافقة </span>
                                                    @elseif($tts->TaskAccept == 'notaccept')
                                                        <span class="label label-warning">لم تتم الموافقة </span>
                                                    @endif
                                                </td>
                                                <td>{{ $tts->created_at }}</td>


                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="6">no tasks fo now</td>
                                            </tr>
                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                        @endforeach


                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>



--}}
    <div class="modal fade" id="Modal55" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اعداد المرحلة الحالية للمشروع</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('UpdateStage') }}">
                        <input type="hidden" name="Bennar" value="{{ $Single->Bennar }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label">مرحلة المشروع الحالية</label>
                            <div class="col-sm-8">
                                {!! Form::select('Stage', \App\Models\ProjectStatus::pluck('StatusName','id'),null, ['class' => 'form-control select2','style' => 'width:90%']) !!}

                            </div>
                        </div>
                        <button id="registrationID" class="btn btn-success">حفظ</button>
                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal3" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اعداد الحالة الحالية للمشروع</h4><span style="color: red"></span>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('UpdateStat') }}">
                        <input type="hidden" name="Bennar" value="{{ $Single->Bennar }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="State" class="col-sm-4 control-label">حالة المشروع الحالية</label>
                            <div class="col-sm-8">
                                {!! Form::select('stat',[
                                       '1'=>'في الانتظار',
                                       '3'=>'متوقف',
                                       '2'=>'جاري العمل عليه',
                                       ],null, ['class' => 'form-control  select2','style' => 'width:90%']) !!}
                            </div>
                        </div>
                        <button id="registrationID" class="btn btn-success">حفظ</button>
                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="RFiles" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">الخدمات المطلوب انجازها</h4><span style="color: red"></span>
                </div>
                <div class="modal-body">
                    <?php
                    $rs = \App\Models\RequireServices::join('main_services','main_services.id','=','require_services.serviceName')
                        ->where('BennarID',$Single->Bennar)
                        ->select('main_services.*','require_services.*',DB::raw('main_services.id as MID'))
                        ->get();
                    ?>
                    <ul class="nav nav-pills nav-stacked">
                        @if(isset($rs))
                            @foreach($rs as $item)
                              <li><a href="#"><i class="fa fa-circle-o text-red"></i> {{$item->MainServiceName}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    @foreach($rs as $Mser)
        <?php
         $sub = \App\Models\ProjectStatus::where('main_service',$Mser->MID)->get();
        ?>
    <div class="col-md-12">
        <div class="box box-default" style="height: 207px ">
            <div class="box-header with-border">
                <h3 class="box-title"> مراحل تنفيذ - {{ $Mser->MainServiceName }} </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->

            </div>
            <!-- /.box-header -->

            <div class="box-body" style="padding-top: 50px">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        @foreach($sub  as $key =>$item78)
                            <div class="stepwizard-step col-xs-1.5">
                                <a href="#step-1" type="button" class="@if(isset($Single->Status) && $Single->Status== $item78->id) btn btn-warning  @elseif(isset($Single->Status) && $Single->Status> $item78->id) btn btn-warning @else btn btn-default @endif btn-circle stp" >@if(isset($Single->Status) && $Single->Status== $item78->id) <i class="fa fa-check"></i> @else {{ $key+1 }} @endif</a>
                                <p><small>{{ $item78->StatusName }}</small></p>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    @endforeach


   <div class="row">
       <div class="col-md-6">
           <div class="box box-default">
               <div class="box-header with-border">
                   <h3 class="box-title">بيانات المشروع</h3>

                   <div class="box-tools pull-right">
                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                       </button>
                   </div>
                   <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="row">
                       <div class="col-xs-12 table-responsive" >
                           <table class="table table-striped" >

                               <thead>
                               </thead>
                               <tbody>
                               <tr>
                                   <td>كود المشروع</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->FileCode }}
                                       </div>
                                   </td>

                               </tr>


                               <tr>
                                   <td> رقم البينار</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->Bennar }}
                                       </div>
                                   </td>

                               </tr>


                               <tr>
                                   <td>المدينة </td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->City }}
                                       </div>
                                   </td>

                               </tr>
                               </tbody>

                           </table>
                       </div>
                       <!-- /.col -->
                   </div>
                   <div class="box-footer">
                   </div>

               </div>

               <!-- /.box-body -->
           </div>
           <!-- /.box -->
       </div>
       <div class="col-md-6">
           <div class="box box-default">
               <div class="box-header with-border">
                   <h3 class="box-title">بيانات المشروع</h3>

                   <div class="box-tools pull-right">
                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                       </button>
                   </div>
                   <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="row">
                       <div class="col-xs-12 table-responsive" >
                           <table class="table table-striped" >

                               <thead>
                               </thead>
                               <tbody>
                               <tr>
                                   <td>تاريخ فتح الملف</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->created_at }}
                                       </div>
                                   </td>
                               </tr>
                               <tr>
                                   <td>مرحلة المشروع الحالية</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php $s = \App\Models\ProjectStatus::where('id',$Single->Status)->first(); ?>
                                           <span class="text-green">{{ $s->StatusName }}</span>
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> حالة المشروع الحالية</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <span class="text-red">
                                               @if($Single->stat == '1')
                                                   في الانتظار
                                               @elseif($Single->stat == '2')
                                                   جاري العمل على المشروع
                                               @elseif($Single->stat == '3')
                                                   متوقف
                                               @endif
                                           </span>
                                       </div>
                                   </td>

                               </tr>

                               </tbody>
                           </table>
                       </div>
                       <!-- /.col -->
                   </div>

                   <div class="box-footer">
                   </div>

               </div>
               <!-- /.box-body -->
           </div>
           <!-- /.box -->
       </div>
   </div>
  {{-- <div class="row">
       <div class="col-md-12">
           <div class="box box-default">
               <div class="box-header with-border">
                   <h3 class="box-title">ملفات المشروع  - المرفوعة من الادارة</h3>

                   <div class="box-tools pull-right">
                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                       </button>
                   </div>
                   <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
               <?php $fil = \App\Models\Documents::where('projectID','=',$Order->Bennar)->get(); ?>
                   <div class="col-xs-12 table-responsive" >
                       <table id="example1" class="table table-bordered table-striped table-responsive">
                           <thead>
                           <tr>
                               <th>رقم المستند</th>
                               <th>اسم المستند</th>
                               <th>ملاحظات</th>
                               <th>عرض</th>
                               <th>التاريخ</th>
                               <th>حذف</th>


                           </tr>
                           </thead>
                           <tbody >
                           @foreach($fil as $Single)
                               <tr>
                                   <td>{{ $Single->DocID }}</td>
                                   <td>{{ $Single->DocName }}</td>
                                   <td>{{ $Single->Docdetails }}</td>

                                   <td><a href="{{ url('storage/app/public') }}/{{ $Single->Docs }}"><span class="label label-primary">عرض</span></a></td>
                                   <td>{{ date('F d, Y', strtotime($Single->created_at)) }}</td>
                                   <td>
                                       <button id="{{ $Single->id }}" class="label label-danger" data-id="{{$Single->id}}" data-token="{{csrf_token()}}" onclick='
                                               swal({
                                               title: "هل انت متأكد?",
                                               text: "عند حذف هذه البيانات لا يمكنك استرجاعها مرة اخري!",
                                               type: "info",
                                               showCancelButton: true,
                                               closeOnConfirm: false,
                                               showLoaderOnConfirm: true,
                                               },
                                               function(){
                                               setTimeout(function(){
                                               var id = $("#{{ $Single->id }}").data("id");
                                               var token = $("#{{ $Single->id }}").data("token");
                                               $.ajax({
                                               type: "GET",
                                               url : "deleteDocuments/"+id,
                                               data : {
                                               "":id,
                                               "_method":"DELETE",
                                               "_token":token,
                                               },
                                               //dataType: "json",
                                               cache:false,

                                               success  : function(data) {
                                               swal("تهانينا!",data , "success");
                                               setTimeout(function() {
                                               var href = "{{url('OfficeFiles')}}";
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
                                               '><span class="label label-danger">حذف</span></button>
                                   </td>
                               </tr>
                           @endforeach



                           </tbody>
                       </table>
                   </div>
                   <div class="box-footer">
                   </div>

               </div>
               <!-- /.box-body -->
           </div>
           <!-- /.box -->
       </div>
   </div>--}}

  <div class="modal fade" id="FilesPro" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ملفات الانتاج الهندسية</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body table-responsive">

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs pull-right">

                                <li class="active">
                                    <a href="#E0" data-toggle="tab">المعماري</a>
                                </li>
                                <li class="">
                                    <a href="#E1" data-toggle="tab">التكييف</a>
                                </li>
                                <li class="">
                                    <a href="#E2" data-toggle="tab">السباكة</a>
                                </li>
                                <li class="">
                                    <a href="#E3" data-toggle="tab">الكهرباء</a>
                                </li>
                                <li class="">
                                    <a href="#Other" data-toggle="tab">ملفات اخرى</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="E0"  style="min-height: 300px">
                                    <ul class="mailbox-attachments clearfix">
                                        <?php
                                        $db_ext = DB::connection('skyCon');
                                        $charts = $db_ext->table('documents')->where('projectID',$Single->Bennar)->where('mission','E0')->where('cat','cons')->get();
                                        ?>
                                        @foreach($charts as $it)
                                            <?php
                                            $infoPath = pathinfo(public_path($it->Docs));
                                            $extension = $infoPath['extension'];
                                            if ($extension == 'pdf'){
                                                $icon = 'fa fa-file-pdf-o';
                                                $color = 'red';
                                            }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                $icon = 'fa fa-picture-o';
                                                $color = 'cadetblue';
                                            }elseif ($extension == 'dwg'){
                                                $icon = 'fa fa-file-code-o';
                                                $color = 'violet';
                                            }elseif ($extension == 'xls'){
                                                $icon = 'fa fa-excel-o';
                                                $color = 'darkcyan';
                                            }elseif ($extension == 'zip' || $extension == 'rar'){
                                                $icon = 'fa fa-file-archive-o';
                                                $color = 'seagreen';
                                            }else{
                                                $icon = 'fa fa-file';
                                                $color = 'seagreen';
                                            }
                                            ?>
                                            <li>
                                                        <span class="mailbox-attachment-icon">
                                                            <i class="{{ $icon }}" style="color: {{$color}}"></i>
                                                        </span>
                                                <div class="mailbox-attachment-info">
                                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it->DocName, 40)}}</a>
                                                    <br>
                                                    <span class="mailbox-attachment-size">
                                                              {{ date('F d, Y', strtotime($it->created_at)) }}
                                                              <a href="https://ko-sky.com/storage/app/public/{{$it->Docs}}" class="btn btn-default btn-xs pull-left">Download</a>
                                                            </span>
                                                </div>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>

                                <div class="tab-pane " id="E1"  style="min-height: 300px">
                                    <ul class="mailbox-attachments clearfix">
                                        <?php
                                        $charts = $db_ext->table('documents')->where('projectID',$Single->Bennar)->where('mission','E1')->where('cat','cons')->get();
                                        ?>
                                        @foreach($charts as $it)
                                            <?php
                                            $infoPath = pathinfo(public_path($it->Docs));
                                            $extension = $infoPath['extension'];
                                            if ($extension == 'pdf'){
                                                $icon = 'fa fa-file-pdf-o';
                                                $color = 'red';
                                            }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                $icon = 'fa fa-picture-o';
                                                $color = 'cadetblue';
                                            }elseif ($extension == 'dwg'){
                                                $icon = 'fa fa-file-code-o';
                                                $color = 'violet';
                                            }elseif ($extension == 'xls'){
                                                $icon = 'fa fa-excel-o';
                                                $color = 'darkcyan';
                                            }elseif ($extension == 'zip' || $extension == 'rar'){
                                                $icon = 'fa fa-file-archive-o';
                                                $color = 'seagreen';
                                            }else{
                                                $icon = 'fa fa-file';
                                                $color = 'seagreen';
                                            }
                                            ?>
                                            <li>
                                                <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                <div class="mailbox-attachment-info">
                                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it->DocName, 40)}}</a>
                                                    <br>
                                                    <span class="mailbox-attachment-size">
                                                              {{ date('F d, Y', strtotime($it->created_at)) }}
                                                              <a href="https://ko-sky.com/storage/app/public/{{$it->Docs}}" class="btn btn-default btn-xs pull-left">Download</a>
                                                            </span>
                                                </div>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane " id="E2"  style="min-height: 300px">
                                    <ul class="mailbox-attachments clearfix">
                                        <?php
                                        $charts = $db_ext->table('documents')->where('projectID',$Single->Bennar)->where('mission','E2')->where('cat','cons')->get();
                                        ?>
                                        @foreach($charts as $it)
                                            <?php
                                            $infoPath = pathinfo(public_path($it->Docs));
                                            $extension = $infoPath['extension'];
                                            if ($extension == 'pdf'){
                                                $icon = 'fa fa-file-pdf-o';
                                                $color = 'red';
                                            }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                $icon = 'fa fa-picture-o';
                                                $color = 'cadetblue';
                                            }elseif ($extension == 'dwg'){
                                                $icon = 'fa fa-file-code-o';
                                                $color = 'violet';
                                            }elseif ($extension == 'xls'){
                                                $icon = 'fa fa-excel-o';
                                                $color = 'darkcyan';
                                            }elseif ($extension == 'zip' || $extension == 'rar'){
                                                $icon = 'fa fa-file-archive-o';
                                                $color = 'seagreen';
                                            }else{
                                                $icon = 'fa fa-file';
                                                $color = 'seagreen';
                                            }
                                            ?>
                                            <li>
                                                <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                <div class="mailbox-attachment-info">
                                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it->DocName, 40)}}</a>
                                                    <br>
                                                    <span class="mailbox-attachment-size">
                                                              {{ date('F d, Y', strtotime($it->created_at)) }}
                                                              <a href="https://ko-sky.com/storage/app/public/{{$it->Docs}}" class="btn btn-default btn-xs pull-left">Download</a>
                                                            </span>
                                                </div>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane " id="E3"  style="min-height: 300px">
                                    <ul class="mailbox-attachments clearfix">
                                        <?php
                                        $charts = $db_ext->table('documents')->where('projectID',$Single->Bennar)->where('mission','E3')->where('cat','cons')->get();
                                        ?>
                                        @foreach($charts as $it)
                                            <?php
                                            $infoPath = pathinfo(public_path($it->Docs));
                                            $extension = $infoPath['extension'];
                                            if ($extension == 'pdf'){
                                                $icon = 'fa fa-file-pdf-o';
                                                $color = 'red';
                                            }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                $icon = 'fa fa-picture-o';
                                                $color = 'cadetblue';
                                            }elseif ($extension == 'dwg'){
                                                $icon = 'fa fa-file-code-o';
                                                $color = 'violet';
                                            }elseif ($extension == 'xls'){
                                                $icon = 'fa fa-excel-o';
                                                $color = 'darkcyan';
                                            }elseif ($extension == 'zip' || $extension == 'rar'){
                                                $icon = 'fa fa-file-archive-o';
                                                $color = 'seagreen';
                                            }else{
                                                $icon = 'fa fa-file';
                                                $color = 'seagreen';
                                            }
                                            ?>
                                            <li>
                                                <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                <div class="mailbox-attachment-info">
                                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it->DocName, 40)}}</a>
                                                    <br>
                                                    <span class="mailbox-attachment-size">
                                                              {{ date('F d, Y', strtotime($it->created_at)) }}
                                                              <a href="https://ko-sky.com/storage/app/public/{{$it->Docs}}" class="btn btn-default btn-xs pull-left">Download</a>
                                                            </span>
                                                </div>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane " id="Other"  style="min-height: 300px">
                                    <ul class="mailbox-attachments clearfix">
                                        <?php
                                        $charts = DB::table('files')->where('projectID',$Single->Bennar)->get();
                                        ?>
                                        @foreach($charts as $it)
                                            <?php
                                            $infoPath = pathinfo(public_path($it->Docs));
                                            $extension = $infoPath['extension'];
                                            if ($extension == 'pdf'){
                                                $icon = 'fa fa-file-pdf-o';
                                                $color = 'red';
                                            }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                $icon = 'fa fa-picture-o';
                                                $color = 'cadetblue';
                                            }elseif ($extension == 'dwg'){
                                                $icon = 'fa fa-file-code-o';
                                                $color = 'violet';
                                            }elseif ($extension == 'xls'){
                                                $icon = 'fa fa-excel-o';
                                                $color = 'darkcyan';
                                            }elseif ($extension == 'zip' || $extension == 'rar'){
                                                $icon = 'fa fa-file-archive-o';
                                                $color = 'seagreen';
                                            }else{
                                                $icon = 'fa fa-file';
                                                $color = 'seagreen';
                                            }
                                            ?>
                                            <li>
                                                <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                                <div class="mailbox-attachment-info">
                                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it->DocName, 40)}}</a>
                                                    <br>
                                                    <span class="mailbox-attachment-size">
                                                              {{ date('F d, Y', strtotime($it->created_at)) }}
                                                              <a href="https://ko-sky.com/storage/app/public/{{$it->Docs}}" class="btn btn-default btn-xs pull-left">Download</a>
                                                            </span>
                                                </div>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>

                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

 @endsection
