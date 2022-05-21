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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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

    @include('ActivateAccount.header')
    @include('ActivateAccount.aside')
    <?php
    /*$count1 = DB::table('projects')->where('State','=','منتهي')->count();
    $count2 = DB::table('projects')->where('State','=','مغلق')->count();
    $count3 = DB::table('projects')->where('State','=','مفتوح')->count();
    $count4 = DB::table('projects')->where('State','=','قيد التنفيذ')->count();*/
    ?>
    <div class="content-wrapper" dir="rtl">
        <section class="content margin-50">
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
            <div class="row" id="">

                <div id="Command" class="">

                    <div class="" id="here">
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


    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });


</script>
<script>
    $(".select2").select2();
    $('#datepicker').datepicker({
        autoclose: true

    });
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1',{
            contentsLangDirection: 'rtl'
        });
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
    $(".knob").knob({
        /*change : function (value) {
         //console.log("change : " + value);
         },
         release : function (value) {
         console.log("release : " + value);
         },
         cancel : function () {
         console.log("cancel : " + this.value);
         },*/
        draw: function () {

            // "tron" case
            if (this.$.data('skin') == 'tron') {

                var a = this.angle(this.cv)  // Angle
                    , sa = this.startAngle          // Previous start angle
                    , sat = this.startAngle         // Start angle
                    , ea                            // Previous end angle
                    , eat = sat + a                 // End angle
                    , r = true;

                this.g.lineWidth = this.lineWidth;

                this.o.cursor
                && (sat = eat - 0.3)
                && (eat = eat + 0.3);

                if (this.o.displayPrevious) {
                    ea = this.startAngle + this.angle(this.value);
                    this.o.cursor
                    && (sa = ea - 0.3)
                    && (ea = ea + 0.3);
                    this.g.beginPath();
                    this.g.strokeStyle = this.previousColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                    this.g.stroke();
                }

                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                this.g.stroke();

                this.g.lineWidth = 2;
                this.g.beginPath();
                this.g.strokeStyle = this.o.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                this.g.stroke();

                return false;
            }
        }
    });
</script>
</body>
</html>
