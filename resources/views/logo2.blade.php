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
    <link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
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
  </head>
<body class="login-page">
   @if(Session::has('Flash33'))
<script type="text/javascript">
  swal("خطأ", "{{ Session::get('Flash33') }}", "error");
</script>
           @endif
@yield('content')
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
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
