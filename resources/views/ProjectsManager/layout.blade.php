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
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <![endif]-->
    @livewireStyles
    <style type="text/css">
        .whitespace {
            white-space:pre-wrap;
            line-height: 2;
            background-color: ;
        }
        .select2{
            width: 100%;
        }

    </style>



    <script  src="{{ asset('dist/js/validation.js') }}"></script>
    <style type="text/css">
        td,th{
            align-content: center;
        }
        .row{
            margin-left: 0px !important;
        }
    </style>

    <script type="text/javascript">


    </script>

    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
            $(".loa").fadeOut("slow");
        });
    </script>
    <script>

        /**
         * Created by Mohamed-Zain on 2/27/2020.
         */
        $(document).ready(function(){

            $(document).ajaxStart(function () {
                $(".loa").show();
            }).ajaxStop(function () {
                $(".loa").fadeOut();
                $("#Command").fadeIn(3000);
            });


        });
    </script>
    <script type="text/javascript">
        $(function () {
            $(".CMMM").click(function(e) {
                e.preventDefault();
                $(".loader").show();
                setTimeout(function() {
                    setTimeout(function() {
                        showSpinner();
                    },5000);
                },1000);

            });
        });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-open">
<audio id="audioSuccess">
    <source class="audio" src="{{ asset('Notify/success.wav')}}" type="audio/mp3">
</audio>

<audio id="audioError">
    <source class="audio" src="{{ asset('Notify/error.wav')}}" type="audio/mp3">
</audio>
<div class="loader"></div>
<div class="loa" style="display: none;"></div>

<div class="wrapper">

    @include('ProjectsManager.header')
    @include('ProjectsManager.aside')
    <?php
    /*$count1 = DB::table('projects')->where('State','=','منتهي')->count();
    $count2 = DB::table('projects')->where('State','=','مغلق')->count();
    $count3 = DB::table('projects')->where('State','=','مفتوح')->count();
    $count4 = DB::table('projects')->where('State','=','قيد التنفيذ')->count();*/
    ?>
    <div class="modal fade" id="PStages" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ابحث برقم البينار او كود الملف </h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('route'=>'PStages','id'=>'protepssend')) }}
                    @php $pro = App\Models\ActivateFile::all() @endphp
                    <div class="form-inline">
                        <label></label>
                        <select name="PStages" class="form-control select2" required style="width: 80%">
                            <option value="">---------إضغط للبحث---------</option>
                            @foreach($pro as $pros)
                                <option value="{{ $pros->Bennar }}">{{ $pros->Bennar }} - {{ $pros->FileCode }} - {{ $pros->Name }} - {{ $pros->Country }}</option>
                            @endforeach
                        </select>
                        <button id="Addproteps" class="btn btn-success">بحث</button>
                    </div>

                    {{ Form::close() }}
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper" dir="rtl">
        <section class="content margin-50">

            <div class="row" id="">

                <div id="Command" class="">

                    <div class="" id="here">
                        @livewire('project-manager-notification')
                        @yield('content')
                    </div>
                    @if ($errors->any())
                        <div class="notify bottom-right do-show" data-notification-status="error" style="direction: rtl;text-align: center;"><center>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </center>
                        </div>

                    @endif

                    @if(Session::has('Flash'))
                        <script type="text/javascript">
                            swal("شكرا", "{{ Session::get('Flash') }}", "success");
                        </script>


                    @endif

                    <div id="MSG"></div>
                </div>
        </section>
    </div>
    @include('footer')
    <aside class="control-sidebar control-sidebar-dark no-print">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-flag"></i></a></li>
            {{-- <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-edit"></i></a></li>--}}
        </ul>
        <!-- Tab panes -->
        <div class="tab-content no-print">
            <!-- Home tab content -->
            <div class="tab-pane " id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">الانشطة الاخيرة</h3>
                <ul class="control-sidebar-menu">
                    @php
                        $logs = \App\Helpers\LogActivity::logActivityLists();
                            $hs = $logs->where('log_activities.user_id','!=',auth()->user()->id)->take(5);


                    @endphp
                    @foreach($hs as $no)
                        <li>
                            <a href="javascript::;">
                                <i class="menu-icon fa fa-user bg-yellow"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">{{ $no->name  }}</h4>
                                    <p>{{ $no->subject  }}</p>
                                    <p>{{ Carbon\Carbon::parse($no->Date)->diffForHumans() }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">المشاريع</h3>
                <ul class="control-sidebar-menu">

                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-left">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-left">95%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-left">50%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-left">68%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane " id="control-sidebar-settings-tab">

            </div><!-- /.tab-pane -->
        </div>
    </aside>

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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
@livewireScripts
<script type="text/javascript">
    $(function () {
        $("#example1").DataTable();
        $("#example3").DataTable();
        $("#example4").DataTable();
        $(".example").DataTable();
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
<script>
    $(".select2").select2();
    $('#datepicker').datepicker({
        autoclose: true

    });


</script>
</body>
</html>
