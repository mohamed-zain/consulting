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
      <link rel="icon" type="image/png" href="<?php echo e(asset('dist/img/logo.png')); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    
      <script
              src="https://code.jquery.com/jquery-2.2.4.min.js"
              integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
              crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('fontawesome/css/all.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('dist/css/skins/_all-skins.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datepicker/datepicker3.css')); ?>">
    <script src="<?php echo e(asset('dist/css/sweetalert-dev.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/sweetalert.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/fonts/fonts-fa.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/bootstrap-rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/all.css')); ?>">

      <link href="<?php echo e(asset('dist/css/notify.css')); ?>" rel='stylesheet' type='text/css' />
 <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
      <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />


      <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


  <script src="<?php echo e(asset('js/app.js')); ?>"></script>
      <?php echo $__env->yieldPushContent('css'); ?>
      <?php echo \Livewire\Livewire::styles(); ?>

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

 <script  src="<?php echo e(asset('dist/js/validation.js')); ?>"></script>
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
                url: "<?php echo e(url('pro_summary')); ?>",
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
  <?php if(isset($newNoti)): ?>
  
  <?php endif; ?>
  <audio id="audioSuccess">
      <source class="audio" src="<?php echo e(asset('Notify/success.wav')); ?>" type="audio/mp3">
  </audio>

  <audio id="audioError">
      <source class="audio" src="<?php echo e(asset('Notify/error.wav')); ?>" type="audio/mp3">
  </audio>
  <div class="loader"></div>
   <div class="loa" style="display: none;"></div>

    <div class="wrapper">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('project-manager-notification')->html();
} elseif ($_instance->childHasBeenRendered('KKCvZlV')) {
    $componentId = $_instance->getRenderedChildComponentId('KKCvZlV');
    $componentTag = $_instance->getRenderedChildComponentTagName('KKCvZlV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('KKCvZlV');
} else {
    $response = \Livewire\Livewire::mount('project-manager-notification');
    $html = $response->html();
    $_instance->logRenderedChild('KKCvZlV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
         <?php echo $__env->yieldContent('content'); ?>
      </div>
    <div class="modal fade" id="NotificationCenter" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تنبيهات النظام</h4>
                </div>
                <div class="modal-body">
                    <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                        <div class="alert alert-success alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4 class="alert-heading"><?php echo e($notification->data['code']); ?> - <?php echo e($notification->data['mission']); ?></h4>
                            <p><?php echo e($notification->data['message']); ?></p>
                            <hr>
                            <p class="mb-0"><?php echo e($notification->data['message']); ?></p>
                        </div>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <?php echo e(Form::open(array('route'=>'PStages','id'=>'protepssend'))); ?>

                    <?php $pro = App\Models\ActivateFile::all() ?>
                    <div class="form-inline">
                        <label></label>
                        <select name="PStages" class="form-control select2" required style="width: 80%">
                            <option value="">---------إضغط للبحث---------</option>
                            <?php $__currentLoopData = $pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pros->Bennar); ?>"><?php echo e($pros->Bennar); ?> - <?php echo e($pros->FileCode); ?> - <?php echo e($pros->Name); ?> - <?php echo e($pros->Country); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button id="Addproteps" class="btn btn-success">بحث</button>
                    </div>

                    <?php echo e(Form::close()); ?>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
 <?php if($errors->any()): ?>
 <div class="notify bottom-right do-show" data-notification-status="error" style="direction: rtl;text-align: center;"><center>
  <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </center>
    </div>

<?php endif; ?>

<?php if(Session::has('Flash')): ?>
<script type="text/javascript">
  swal("شكرا", "<?php echo e(Session::get('Flash')); ?>", "success");
</script>
    <?php endif; ?>
           <div id="MSG"></div>
      </div>

      </div>

        </section>
    </div>
          <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <aside class="control-sidebar control-sidebar-dark no-print">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-flag"></i></a></li>
               
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane " id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">الانشطة الاخيرة</h3>
                    <ul class="control-sidebar-menu">
                    <?php
                        //$logs = \App\Helpers\LogActivity::logActivityLists();
                          //  $hs = $logs->where('log_activities.user_id','!=',auth()->user()->id)->take(5);
                        $not =  DB::table('notifications')
                        ->where('notifiable_id', auth()->user()->id)
                        //->where('read_at', null)
                        ->orderBy('created_at', 'desc')
                        ->take(8)
                        ->get();

                    ?>
                        <?php $__currentLoopData = $not; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <h4 class="control-sidebar-subheading"><?php echo e($code); ?> - <?php echo e($mission); ?></h4>
                                    <p><?php echo e($message); ?></p>
                                    <p><?php echo e(Carbon\Carbon::parse($created_at)->diffForHumans()); ?></p>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

  <?php echo $__env->yieldPushContent('scripts'); ?>

    
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/select2/select2.full.min.js')); ?>"></script>

    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/fastclick/fastclick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/knob/jquery.knob.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

  <?php echo \Livewire\Livewire::scripts(); ?>

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
<?php /**PATH /Applications/MAMP/htdocs/skyapp/resources/views/index.blade.php ENDPATH**/ ?>