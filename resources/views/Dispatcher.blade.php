
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ko-SATA</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="برنامج ادارة خدمات عملاء خيرعون" />
    <meta name="keywords" content="برنامج ادارة خدمات عملاء خيرعون" />
    <meta name="author" content=" خيرعون - الإمارات"/>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <script src="{{ asset('dist/css/sweetalert-dev.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dist/css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/fonts/fonts-fa.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">

    <link href="{{ asset('dist/css/notify.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .whitespace {
            white-space:pre-wrap;
            line-height: 2;
        }
        .select2{
            width: 100%;
        }
        .spinner{
            display: none;
        }
        .skin-blue .wrapper{
            background-color: #d2d6de;
        }
    </style>

    <style type="text/css">
        .whitespace {
            white-space:pre-wrap;
            line-height: 2;
        }
        .sidebar-toggle{
            display: none;
        }

    </style>


    <script  src="{{ asset('dist/js/validation.js') }}"></script>
    <style type="text/css">
        td,th{
            align-content: center;
        }
    </style>

    <script type="text/javascript">


    </script>

    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
    <script>
    </script>
</head>
<body class="skin-blue sidebar-mini">
<audio id="audioSuccess">
    <source class="audio" src="{{ asset('Notify/success.wav')}}" type="audio/mp3">
</audio>

<audio id="audioError">
    <source class="audio" src="{{ asset('Notify/error.wav')}}" type="audio/mp3">
</audio>
<div class="loader"></div>
<div class="loa" style="display: none;"></div>

<div class="wrapper">


    <div class="content-wrapper" dir="rtl" style="margin:5px;background-image: url('public/img/mainbg.jpg')">


        <section class="content" style="background: #d2d6de;opacity: 0.9;min-height: 960px;">


            <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <div class="callout " style="height: 130px;margin-top: 150px; background-color: #056A6F; color: white">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h4>مرحبا بك  {{ auth()->check() ? auth()->user()->name : '' }}</h4>

                        <p>بوابة الدخول الموحد للموظفين في نظام خير عون - الامارات</p>
                        <p>يمكنك الدخول للأنظمة التي لديك صلاحية لها</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <img src="{{ asset('logo20222.png') }}" class="pull-left" style="height: 100px">
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- USERS LIST -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">  الانظمة الفرعية  </h3>
                                <div class="box-tools pull-right">
                                    <form action="{{ url('logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-success" style="background-color: #056A6F;">تسجيل الخروج</button>
                                    </form>
                                    </a>

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body "  style="padding-right: 70px;">
                                <?php
                                $access1 = DB::table('user_groups')->where('Sys','EmpDashboard')->where('UID',auth()->user()->id)->first();
                                $access2 = DB::table('user_groups')->where('Sys','ActivateAccounts')->where('UID',auth()->user()->id)->first();
                                $access3 = DB::table('user_groups')->where('Sys','EngineeringManagement')->where('UID',auth()->user()->id)->first();
                                $access4 = DB::table('user_groups')->where('Sys','EmployeesDepartment')->where('UID',auth()->user()->id)->first();
                                $access5 = DB::table('user_groups')->where('Sys','TopManagement')->where('UID',auth()->user()->id)->first();
                                $access6 = DB::table('user_groups')->where('Sys','SupportDepartment')->where('UID',auth()->user()->id)->first();
                                ?>
                                @if($access1->accessH == 1)
                                        <a href="{{ url('EmpDashboard') }}" class="btn btn-app bg-gray" style="min-width: 254px">
                                            <i class="fa fa-users-cog fa-x2" style="font-size: 55px; color: #056A6F"></i>  ادارة القبول
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-app bg-gray" style="min-width: 254px" onclick='swal("للأسف", "ليس لديك صلاحية", "error") ;
                                        var audio = document.getElementById("audioError");
                                            audio.play();'>
                                            <i class="fa fa-users-cog fa-x2" style="font-size: 55px; color: #056A6F"></i>  ادارة القبول
                                        </a>
                                    @endif

                                    @if($access2->accessH == 1)
                                        <a href="{{ url('ActivateAccounts') }}" class="btn btn-app bg-gray" style="min-width: 254px">
                                            <i class="fab fa-cc-visa fa-x2" style="font-size: 55px; color: #056A6F"></i> <br>الادارة المالية
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-app bg-gray" style="min-width: 254px" onclick='swal("للأسف", "ليس لديك صلاحية", "error") ;
                                        var audio = document.getElementById("audioError");
                                            audio.play();'>
                                            <i class="fab fa-cc-visa fa-x2" style="font-size: 55px; color: #056A6F"></i> <br>الادارة المالية
                                        </a>
                                    @endif


                                    @if($access3->accessH == 1)
                                        <a href="{{ url('EngineeringManagement') }}" class="btn btn-app bg-gray" style="min-width: 254px">
                                            <i class="fas fa-drafting-compass fa-x2" style="font-size: 55px; color: #056A6F"></i> <br>الادارة الهندسية
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-app bg-gray" style="min-width: 254px" onclick='
                                        swal("للأسف", "ليس لديك صلاحية", "error") ;
                                        var audio = document.getElementById("audioError");
                                            audio.play();'>
                                            <i class="fas fa-drafting-compass fa-x2" style="font-size: 55px; color: #056A6F"></i> <br>الادارة الهندسية
                                        </a>
                                    @endif
                                    @if($access4->accessH == 1)
                                        <a href="{{ url('EngineerDashboard') }}" class="btn btn-app bg-gray" style="min-width: 254px">
                                            <i class="fas fa-drafting-compass fa-x2" style="font-size: 55px; color: #056A6F"></i><br>المهندسين
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-app bg-gray" style="min-width: 254px" onclick='
                                        swal("للأسف", "ليس لديك صلاحية", "error") ;
                                        var audio = document.getElementById("audioError");
                                            audio.play();'>
                                            <i class="fas fa-people-arrows fa-x2" style="font-size: 55px; color: #056A6F"></i> <br>المهندسين
                                        </a>

                                        @endif
                                    @if($access6->accessH == 1)
                                        <a href="{{ url('SupportDepartment') }}" class="btn btn-app bg-gray" style="min-width: 254px">
                                            <i class="fab fa-apple fa-x2" style="font-size: 55px; color: #056A6F"></i> <br>الدعم الفني والتطبيق
                                        </a>

                                    @else
                                        <a href="#" class="btn btn-app bg-gray" style="min-width: 254px" onclick='
                                        swal("للأسف", "ليس لديك صلاحية", "error") ;
                                        var audio = document.getElementById("audioError");
                                            audio.play();'>
                                            <i class="fa fa-phone-square fa-x2" style="font-size: 55px; color: #056A6F"></i> <br> الدعم الفني
                                        </a>
                                    @endif
                                    @if(isset($access5))
                                        <a href="{{ url('MainPort') }}" class="btn btn-app bg-gray" style="min-width: 254px">
                                            <i class="fa fa-user-secret  fa-x2" style="font-size: 55px; color: #056A6F"></i> <br>الادارة العليا
                                        </a>

                                    @else
                                        <a href="#" class="btn btn-app bg-gray" style="min-width: 254px" onclick='
                                        swal("للأسف", "ليس لديك صلاحية", "error") ;
                                        var audio = document.getElementById("audioError");
                                            audio.play();'>
                                            <i class="fas fa-user-secret fa-x2" style="font-size: 55px; color: #056A6F"></i> <br> الادارة العليا
                                        </a>
                                @endif

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!--/.box -->
                    </div>

                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>


        </section>
    </div>

</div>

<script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>

</body>
</html>
