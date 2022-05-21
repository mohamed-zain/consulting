<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ko-SATA - Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="برنامج ادارة خدمات عملاء خيرعون" />
    <meta name="keywords" content="برنامج ادارة خدمات عملاء خيرعون" />
    <meta name="author" content=" خيرعون - الإمارات"/>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('dist/img/logo.png')); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <script src="<?php echo e(asset('plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/font-awesome.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/skins/_all-skins.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datepicker/datepicker3.css')); ?>">
    <script src="<?php echo e(asset('dist/css/sweetalert-dev.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/sweetalert.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/fonts/fonts-fa.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/bootstrap-rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link href="<?php echo e(asset('dist/css/notify.css')); ?>" rel='stylesheet' type='text/css' />
    <script  src="<?php echo e(asset('dist/js/validation.js')); ?>"></script>
 <style type="text/css">
     .image-head {
         background-image:url(http://placehold.it/1920x1080);
         background-size: cover;
         background-repeat: no-repeat;
         background-position: top center;

     }

 </style> 



   <script type="text/javascript">
$(window).load(function() {
  $(".loader").fadeOut("slow");
});
</script>
  </head>
<body class="login-page" style="background-size: cover;background-position: center center;" id="demo-canvas">

<audio id="audioSuccess">
    <source class="audio" src="<?php echo e(asset('Notify/success.wav')); ?>" type="audio/mp3">
</audio>

<audio id="audioError">
    <source class="audio" src="<?php echo e(asset('Notify/error.wav')); ?>" type="audio/mp3">
</audio>
   <?php if(Session::has('Flash33')): ?>
<script type="text/javascript">
    var audio = document.getElementById("audioError");
    audio.play();
  swal("خطأ", "<?php echo e(Session::get('Flash33')); ?>", "error");
</script>
           <?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo e(asset('/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/logo.blade.php ENDPATH**/ ?>