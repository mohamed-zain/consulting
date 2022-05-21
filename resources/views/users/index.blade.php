@extends('users.layout')

@section('content')
    <style>
        .btn-app{
            width: 100%;
            height: 200px;
            color: #e39548;
            border: solid 2px #e39548;
        }
    </style>
 <div class="">
   <section class="content-header">
        <div class="">
          <h3>
            تحكم العميل
            <small> برنامج خيرعون لخدمات ما بعد الاشتراك </small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('UsersTasks') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
          </ol>
          </div>
        </section>
 </div>

        <div class="col-md-12">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/bb.png') }}" alt="User profile picture" style="margin-right:20%">

                        <h3 class="profile-username text-center">{{ $Data->first_name }} {{ $Data->last_name }}</h3>

                        <p class="text-muted text-center">عميل خيرعون</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>الدولة</b> <a class="pull-left">{{ $Data->country }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>الباقة</b> <a class="pull-left">{{ $Data->name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>قيمة الاشتراك</b> <a class="pull-left"> {{ number_format($Data->total) }}  درهم</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>تواصل مع الادارة</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">معلومات العميل</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-mail-forward margin-r-5"></i> البريد</strong>

                        <p class="text-muted">
                            {{ $Data->email }}
                        </p>
                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i>  المدينة - الامارة</strong>

                        <p>{{ $Data->city }} {{ $Data->state }}</p>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> لعنوان</strong>

                        <p class="text-muted">{{ $Data->address_1 }} {{ $Data->address_2 }}</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> الهواتف</strong>

                        <p>
                        <p class="text-muted"> {{ $Data->phone }} </p>
                        </p>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div id="example">
                    <div class="demo-section k-content wide k-rtl">
                        <nav id="stepper"></nav>
                    </div>

                    <script>
                        $(document).ready(function () {
                            $("#stepper").kendoStepper({
                                steps: [{
                                    label: "ادارة القبول "
                                },{
                                    label: "الادارة المالية "
                                },{
                                    label: " Mission Plan",
                                    selected: true
                                },{
                                    label: "اسناد المشروع للمصمم",
                                    enabled: false
                                },{
                                    label: "E0",
                                    enabled: false
                                },{
                                    label: "E1",
                                    enabled: false
                                },{
                                    label: "E2",
                                    enabled: false
                                },{
                                    label: "E3 ",
                                    enabled: false
                                },{
                                    label: "E3",
                                    enabled: false
                                },{
                                    label: "E5",
                                    enabled: false
                                },{
                                    label: "E6"
                                }]
                            });
                        });
                    </script>
                </div>
            <div class="col-md-4">
                <a href="{{url('UpdateProfile')}}" class="btn btn-app" style="">
                    <i class="fa fa-user fa-3x"  style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>الملف الشخصي
                </a>
            </div>
            <div class="col-md-4" style="align-items: center;">

                <a href="{{url('UsersTasks')}}" class="btn btn-app"">

                    <i class="fa fa-list fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i> المهام الهندسية
                </a>
            </div>
            <div class="col-md-4" style="align-items: center;">

                <a href="{{url('UsersTasks')}}" class="btn btn-app">
                    <i class="fa fa-edit fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>الزيارات الفنية
                </a>
            </div>
            <div class="col-md-4" style="align-items: center;">

                <a href="#" id="ChartsLibrary" class="btn btn-app" >
                    <i class="fa fa-edit fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i> الخدمات التجارية
                </a>
            </div>

            <div class="col-md-4" style="align-items: center;">

                <a href="#" id="MyRequest" class="btn btn-app"   data-toggle="modal" data-target="#Modal">

                    <i class="fa fa-edit fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>  التقارير
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-app " data-toggle="modal" data-target="#Modal2222">
                    <i class="fa fa-tasks fa-3x"  style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>التقارير
                </a>
            </div>
        </div>
        </div>


@endsection