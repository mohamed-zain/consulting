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
    {{-- <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>--}}
      <script
              src="https://code.jquery.com/jquery-2.2.4.min.js"
              integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
              crossorigin="anonymous"></script>
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


      <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


  <script src="{{ asset('js/app.js') }}"></script>
      @stack('css')
      @livewireStyles
  <style type="text/css">
    .whitespace {
    white-space:pre-wrap;
    line-height: 2;

}
.select2{
    width: 100%;
}
    .control-sidebar-theme-demo-options-tab{
        display: none;
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
    console.log("%cKhayr %cOawn %cDesign","font-size: 40px; color: blue","font-size: 40px; color: red;","font-size: 40px; color: green;");


</script>

   <script type="text/javascript">
$(window).load(function() {
  $(".loader").fadeOut("slow");
  $(".loa").fadeOut("slow");
    //new Toast({message: 'Welcome to Toast.js!'});
    //new Toast({message: ''});


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

        $("#ProSumm").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{url('pro_summary')}}",
                type: "GET",
                success: function(data){
                    //$("#prosummary").html(data);
                    $("#modalBody").html(data);
                    $("#general_pop_up").modal("show");
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
  <?php
      $newNoti = DB::table('notifications')->where('notifiable_id',auth()->user()->id)->get();
  ?>
  @if(isset($newNoti))
  {{--<script type="text/javascript">
      $(window).on('load', function() {
          $('#NotificationCenter').modal('show');
      });
  </script>--}}
  @endif
  <audio id="audioSuccess">
      <source class="audio" src="{{ asset('Notify/success.wav')}}" type="audio/mp3">
  </audio>

  <audio id="audioError">
      <source class="audio" src="{{ asset('Notify/error.wav')}}" type="audio/mp3">
  </audio>
  <div class="loader"></div>
   <div class="loa" style="display: none;"></div>

    <div class="wrapper">

    @include('header')
    @include('aside')
    <?php
     $count1 = DB::table('projects')->where('State','=','منتهي')->count();
     $count2 = DB::table('projects')->where('State','=','مغلق')->count();
     $count3 = DB::table('projects')->where('State','=','مفتوح')->count();
     $count4 = DB::table('projects')->where('State','=','قيد التنفيذ')->count();
     ?>
      <div class="content-wrapper" dir="rtl">
        <section class="content margin-50">

      <div class="row" id="">

<div id="Command" class="">

     <div class="" id="here">
         @livewire('project-manager-notification')
         @yield('content')
      </div>
    <div class="modal fade" id="NotificationCenter" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تنبيهات النظام</h4>
                </div>
                <div class="modal-body">
                    @foreach(auth()->user()->unreadNotifications  as $key => $notification)
                       {{-- @foreach($notification->data as $items)
                            {{ $items }}

                        @endforeach--}}
                        <div class="alert alert-success alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4 class="alert-heading">{{ $notification->data['code'] }} - {{ $notification->data['mission'] }}</h4>
                            <p>{{ $notification->data['message'] }}</p>
                            <hr>
                            <p class="mb-0">{{ $notification->data['message'] }}</p>
                        </div>


                    @endforeach
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
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
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane " id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">الانشطة الاخيرة</h3>
                    <ul class="control-sidebar-menu">
                    @php
                        //$logs = \App\Helpers\LogActivity::logActivityLists();
                          //  $hs = $logs->where('log_activities.user_id','!=',auth()->user()->id)->take(5);
                        $not =  DB::table('notifications')
                        ->where('notifiable_id', auth()->user()->id)
                        //->where('read_at', null)
                        ->orderBy('created_at', 'desc')
                        ->take(8)
                        ->get();

                    @endphp
                        @foreach($not as $no)
                            <?php
                            $n = json_decode($no->data) ;
                            $code =$n->code;
                            $mission =$n->mission;
                            $created_at = $no->created_at;
                            $message =$n->message;
                            ?>
                        <li>
                            <a href="javascript::;">
                                <i class="menu-icon fa fa-user bg-yellow"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">{{ $code }} - {{ $mission }}</h4>
                                    <p>{{ $message  }}</p>
                                    <p>{{ Carbon\Carbon::parse($created_at)->diffForHumans() }}</p>
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
        </aside><!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>

  @stack('scripts')

    {{--<script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>--}}
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
    $("#example5").DataTable();
    $("#example6").DataTable();
    $("#example7").DataTable();
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
      $('#reservation').daterangepicker();

    </script>
  </body>
</html>
