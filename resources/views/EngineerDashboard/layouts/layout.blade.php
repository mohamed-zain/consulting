<?php



?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>برنامج خير عون - خدمات ما بعد الإشتراك</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <meta name="description" content="برنامج ادارة خدمات عملاء خيرعون" />
      <meta name="keywords" content="برنامج ادارة خدمات عملاء خيرعون" />
      <meta name="author" content=" خيرعون - الإمارات"/>

      <!-- Favicon -->
      <link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}" />
      <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
      <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

      <link rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
      <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
<script src="{{ asset('dist/css/sweetalert-dev.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('dist/css/sweetalert.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/fonts/fonts-fa.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
     <link href="{{ asset('dist/css/notify.css') }}" rel='stylesheet' type='text/css' />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
      <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
      <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      @livewireStyles


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
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
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
      $(document).ready(function(){

      $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
    });

     $("#RT").change(function(){
      var Url = $( this ).val();

    $.ajax({
        url: Url,
        type: "GET",
        success: function(data){
            $("#Droping").html(data);
        },
        error: function(){
                    console.log("No results for ");
            }
    });
});
      $("#NewestTasksvgh").click(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "NewestTasksjh",
        type: "GET",
        success: function(data){
            $("#here").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

});
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

    <div class="wrapper" style="background-color: #d2d6de;">

    @include('EngineerDashboard.layouts.header')
      <div class="content-wrapper" dir="rtl" style="margin:5px;">


        <section class="content margin-50">
      <div class="row" id="here">
          @livewire('project-manager-notification')
 @yield('content')
          <?php
          $needup = DB::table('tasks')
              ->join('documents', function ($join) {
                  $join->on('documents.projectID','=','tasks.Bennar_Code')
                  ->on('documents.mission','=','tasks.Mission');

              })->where('documents.mission','!=',null)
              ->where('documents.Usr_id','=',auth()->user()->id)
              ->where('tasks.TaskDone','no')

              ->get();
          //$needup_count = $needup->count();
          ?>

 @if ($errors->any())
<script>
    var audio = document.getElementById("audioError");
    audio.play();
</script>
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

        var audio = document.getElementById("audioSuccess");
        audio.play();

  swal("شكرا", "{{ Session::get('Flash') }}", "success");
</script>


           @endif
          @if(Session::has('Error'))
              <script type="text/javascript">

                  var audio = document.getElementById("audioError");
                  audio.play();

                  swal("Sorry", "{{ Session::get('Error') }}", "error");
              </script>


          @endif
           <div id="MSG"></div>
      </div>
          </section>
      </div>
               @include('EngineerDashboard.layouts.footer')
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-bell-o"></i></a></li>
                {{-- <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-edit"></i></a></li>--}}
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane " id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading"> التنبيهات</h3>
                    <ul class="control-sidebar-menu">
                        @php
                            $logs = \App\Helpers\Notify::GetNoti(auth()->user()->id);
                                //$hs = $logs->where('log_activities.user_id','!=',auth()->user()->id)->take(5);
                        @endphp
                        @foreach($logs as $no)
                            <?php $arr = json_decode($no->data) ?>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-tasks bg-yellow"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">{{ $arr->code }} - {{ $arr->mission  }}</h4>
                                        <p>{{ $arr->message  }}</p>
                                        <p>{{ Carbon\Carbon::parse($no->created_at)->diffForHumans() }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul><!-- /.control-sidebar-menu -->

                   {{-- <h3 class="control-sidebar-heading">المشاريع</h3>
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

                    </ul><!-- /.control-sidebar-menu -->--}}

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

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>

    <script src="{{ asset('dist/js/app.min.js') }}"></script>

    <script src="{{ asset('dist/js/demo.js') }}"></script>
     @livewireScripts
    <script type="text/javascript">
  $(function () {
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
 <script>
      $(".select2").select2();
  $('#datepicker').datepicker({
      autoclose: true

    });

    </script>
  </body>
</html>
