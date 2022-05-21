<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title id="title"> خيرعون - New view Design</title>
    <meta name="description" content="بوابة خيرعون الالكترونية- الاشتراك في باقة الاشراف <?php echo date('Y').' - '.(1+date('Y'));?>" />
    <meta name="keywords" content="خدمات ما بعد الاشتراك ,بوابة خيرعون الالكترونية  ,طلب الاشتراك في باقة الاشراف" />
    <meta name="author" content="IT Department Team"/>
    <link rel="shortcut icon" href="{{ asset('dist/img/koyellow.png') }}">
    <link rel="icon" href="{{ asset('dist/img/koyellow.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/style.css') }}" />
    <link href="{{asset('/assets/css/notify.css')}}" rel='stylesheet' type='text/css' />
    <script src="{{asset('/assets2/css/sweetalert-dev.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{asset('/assets2/css/sweetalert.css')}}" rel='stylesheet' type='text/css' />
    <script src="{{ asset('/assets2/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
</head>



    <script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('/js/angular.min.js') }}"></script>
    <script src="{{ asset('/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('/js/classie.js') }}"></script>
    <script src="{{ asset('/js/cbpSplitLayout.js') }}"></script>
    <script src="{{ asset('/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('/js/typed.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/controllers.js') }}"></script>
    <script src="{{ asset('/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('/js/input-text.js') }}"></script>
    <script src="{{ asset('/js/notifyMe.js') }}"></script>
    <script src="{{ asset('/js/TweenLite.min.js') }}"></script>
    <script src="{{ asset('/js/EasePack.min.js') }}"></script>
    <script src="{{ asset('/js/rAF.js') }}"></script>
    <script src="{{ asset('/js/demo-1.js') }}"></script>
    <script src="{{ asset('/js/jquery.placeholder.js') }}"></script>
    <script src="{{ asset('/js/init.js') }}"></script>
    <script type="text/javascript">
        function CancelMywrite() {
            $('#CheckUp')[0].reset();
            $('#SNO').focus();
            $('#notify').html("أدخل رقم الملف في خيرعون");
        }
    </script>
    </body>
</html>