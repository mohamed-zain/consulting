
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
    <script>
        $(document).ready(function(){

            $(document).ajaxStart(function () {
                $(".spinner").show();
                $(".loa").show();
            }).ajaxStop(function () {
                $(".spinner").fadeOut();
                $(".loa").fadeOut();
                $("#here").fadeIn();
            });

            $(".NewOrders").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('NewOrders')}}",
                    type: "GET",
                    success: function(data){
                        $("#here").html(data);
                    },
                    error: function(){
                        console.log("No results for " + data + ".");
                    }
                });
            });


            $(".completedOrders").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('completedOrders')}}",
                    type: "GET",
                    success: function(data){
                        $("#here").html(data);
                    },
                    error: function(){
                        console.log("No results for " + data + ".");
                    }
                });
            });

            $("#count1").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('Order_byStatus/1')}}",
                    type: "GET",
                    success: function(data){
                        var audio = document.getElementById("audioSuccess");
                        audio.play();
                        $("#here").html(data)

                    },
                    error: function(){
                        console.log("No results for " + data + ".");
                    }
                });
            });
            $("#count2").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('Order_byStatus/2')}}",
                    type: "GET",
                    success: function(data){
                        var audio = document.getElementById("audioSuccess");
                        audio.play();
                        $("#here").html(data)

                    },
                    error: function(){
                        console.log("No results for " + data + ".");
                    }
                });
            });
            $("#count3").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('Order_byStatus/3')}}",
                    type: "GET",
                    success: function(data){
                        var audio = document.getElementById("audioSuccess");
                        audio.play();
                        $("#here").html(data)

                    },
                    error: function(){
                        console.log("No results for " + data + ".");
                    }
                });
            });
            $("#count4").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('Order_byStatus/4')}}",
                    type: "GET",
                    success: function(data){
                        var audio = document.getElementById("audioSuccess");
                        audio.play();
                        $("#here").html(data)

                    },
                    error: function(){
                        console.log("No results for " + data + ".");
                    }
                });
            });
            $("#count5").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('Order_byStatus/5')}}",
                    type: "GET",
                    success: function(data){
                        var audio = document.getElementById("audioSuccess");
                        audio.play();
                        $("#here").html(data)

                    },
                    error: function(){
                        console.log("No results for " + data + ".");
                    }
                });
            });

            $("#count6").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('Order_byStatus/6')}}",
                    type: "GET",
                    success: function(data){
                        var audio = document.getElementById("audioSuccess");
                        audio.play();
                        $("#here").html(data)

                    },
                    error: function(){
                        console.log("No results for " + data + ".");
                    }
                });
            });

        });
    </script>
    <script type="text/javascript">
        $(function () {
            $(".CMe").click(function(e) {
                e.preventDefault();
                $(".loader").show();

                var url=$(this).attr("href");

                setTimeout(function() {
                    setTimeout(function() {
                        showSpinner();
                    },5000);
                    window.location=url;
                },1000);

            });
        });
    </script>

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
@if(Session::has('Flash2'))
<script type="text/javascript">
    swal("Good Job", "{{ Session::get('Flash2') }}", "info");
</script>
@endif
<div class="wrapper">

    @include('header')
    <div class="content-wrapper" dir="rtl" style="margin:5px;">


        <section class="content margin-50">
            <div class="modal fade" id="Modalorder" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">استفسار عن طلب - برقم البينار</h4>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(['url' => 'Order_byID', 'method' => 'post']) }}
                            {{ csrf_field() }}
                            <div class="form-inline">
                                <input type="number" name="OID"  class="form-control" placeholder="اكتب رقم البينار" style="width: 80%;" required>
                                {{--  <input type="number" name="phone"  class="form-control" placeholder="ابحث برقم الجوال" style="width: 80%;" required>--}}
                                <button type="submit" class="btn btn-success">بحث</button>
                            </div>
                            {{ Form::close() }}

                            <div id="Droping"></div>

                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="here">

                @yield('content')
                {{--<script type="text/javascript">
                    swal("ملاحظة", "سوف يتم تطبيق نظام البونص في النظام اعتبارا من بداية الاسبوع القادم", "info");
                </script>--}}
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
    @include('EMP.footer')
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
<script type="text/javascript">
    $(function () {
        $(".select2").select2();
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
</script>

</body>
</html>
