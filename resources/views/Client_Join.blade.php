<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title id="title"> خيرعون - جده - خدمات ما بعد البيع  </title>
    <meta name="description" content="بوابة خيرعون الالكترونية- خدمات ما بعد الاشتراك <?php echo date('Y').' - '.(1+date('Y'));?>" />
    <meta name="keywords" content="خدمات ما بعد الاشتراك ,بوابة خيرعون الالكترونية  ,ادارة الخدمات الهندسية" />
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
    <script type="text/javascript">
        $(window).load(function() {
            $(".base4loader").fadeOut("slow");
        });
    </script>
    <style>
        #ddd {
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 50%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }
        .call-to-action{
            display: none;
        }
    </style>
    <style>

        .spinner {
            margin: 25px auto;
            left: 50%;
            top: 50%;
            width: 100px;
            height: 40px;
            text-align: center;
            font-size: 10px;
            position: fixed;
            z-index: 9999;
            background-color:  #FFFF;

        }

        .spinner > div {
            background-color: #532009;
            height: 100%;
            width: 6px;
            display: inline-block;
            -webkit-animation: sk-stretchdelay 1.2s infinite ease-in-out;
            animation: sk-stretchdelay 1.2s infinite ease-in-out;
        }

        .spinner .rect2 {
            -webkit-animation-delay: -1.1s;
            animation-delay: -1.1s;
        }

        .spinner .rect3 {
            -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s;
        }

        .spinner .rect4 {
            -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s;
        }

        .spinner .rect5 {
            -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s;
        }

        @-webkit-keyframes sk-stretchdelay {
            0%, 40%, 100% { -webkit-transform: scaleY(0.4) }
            20% { -webkit-transform: scaleY(1.0) }
        }

        @keyframes sk-stretchdelay {
            0%, 40%, 100% {
                transform: scaleY(0.4);
                -webkit-transform: scaleY(0.4);
            }20% {
                 transform: scaleY(1.0);
                 -webkit-transform: scaleY(1.0);
             }
        }
        * {
            box-sizing: border-box;
        }

    </style>
</head>
<body data-ng-app="contactApp">
<div class="spinner pull-right" style="display:none;">
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="rect3"></div>
    <div class="rect4"></div>
    <div class="rect5"></div>
    <p>جاري معالجة البيانات ...</p>
</div>
<div class="base4loader">
</div>
@if(session()->has('Flash'))
    <script>
        swal("عفوا!", "{{ session()->get('Flash') }}", "error");
    </script>
    {{ session()->forget('Flash') }}
@endif

<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<div class="pad-zero">
    <div id="splitlayout" class="splitlayout reset-layout">
        <!--Intro-->
        <div class="intro">
            <!--Left Content Intro-->
            <div id="astronomy_eff" class="side side-right">
                <div id="astronomy">
                    <canvas id="demo-canvas"></canvas>
                </div>
                <!--Contect Nav-->

            <!--/Contect Nav-->
                <div class="counter-content">
                    <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 align-center text-right">
                        <p class="tagline" > مرحبا بك في بوابة خيرعون الالكترونية </p>
                        <!--Counter-->
                        <div id="countdown">
                            <span class="days" style="font-size: 24px"> لخدمات ما بعد الاشتراك</span>
                        </div>
                        <!-- <span class="small-hr"></span>-->

                        <span class="remain-days"  style="font-size: 20px">دخول العملاء لنظام خيرعون</span>
                        <!--/Counter-->
                    </div>
                </div>
                <div class="trans-overlay-dark"></div>
            </div>
            <!--/Left Content Intro-->
            <!--Right Content Intro-->
            <div class="side side-left">
                <!--About Nav-->

            <!--/About Nav-->
                <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 align-center content-wrap" style="float: right;">
                    <!--Logo-->
                    <div class="logo align-center text-right">
                        <img src="{{ asset('dist/img/koyellow.png') }}" alt="logo" style="height: 50px;width: 46%;">
                        <img src="https://ko-design.ae/wp-content/uploads/2018/05/favicon.png" alt="logo" style="height: 50px;width: 13%;">
                    </div>
                    <!--/Logo-->
                    <!--main content-->
                    <div class="main">
                        <!--Content with Typing Intro-->

                        <section id="home" class="section ">
                            <div  class="preloader"></div>

                        </section>
                        <!--/Content with Typing Intro-->
                        <!--Notify Form-->
                        <section id="contact" class="section text-right active">
                            <div  class="preloader"></div>

                            <div class="main-menu">
                                <a title="إلغاء" class="close-notify black" href="#" data-animation="fadeInDown" data-animation-delay="20" data-out-animation="fadeOutUp" data-out-animation-delay="20" onclick="CancelMywrite();">
                                    <div class="call-to-action">
                                        <i class="fa fa-times fa-2x"></i>
                                        <span class="top"></span>
                                        <span class="right"></span>
                                        <span class="bottom"></span>
                                        <span class="left"></span>
                                    </div>
                                </a>
                            </div>
                            <!--CONTENT CHANGED & <br> ADDED-->
                            <div class="notify-wrap">
                                <h3 id="notify" style="font-size: 16pt !important;" class="wellcome-text" data-animation="fadeInLeft" data-animation-delay="20" data-out-animation="fadeOutLeft" data-out-animation-delay="20" data-ng-bind="notify || 'أدخل رقم الملف لدي خيرعون'"> أدخل رقم الملف لدي خيرعون </h3>
                                <form id="" class="contact-form" action="{{ route('CheckUp') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-inline" style="padding-top: 3px!important;">

                                        <input  data-ng-model="notify" class="col-lg-8 align-center form-control" name="SNO" id="SNO"   type="text" required style="width: 50%">
                                        <button title="دخول" type="submit" data-hover="Send" class="button-label btn-submit " style="margin-top: 12px; border-color: #000;background: #000; border-radius: 5px;padding: 4px">
                                            <span class=" text-right"> دخول  </span><span class="arrow-wrap"><span class="arrow"></span></span>
                                        </button>
                                    </div>


                                </form>
                            </div>
                        </section>
                        <!--/Notify Form-->
                        <div class="copyright">
                            <p >خيرعون  -   جميع الحقوق محفوظه  © <?php echo date('Y').' - '.(1+date('Y'));?></p>
                        </div>
                    </div>
                    <!--/main content-->
                </div>
            </div>
            <!--/Right Content Intro-->
        </div>
        <!--/Intro-->
        <!--About Section-->

    </div>
    <!-- /Splitlayout -->
</div>
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
        $('#notify').html("أدخل رقم الملف");
    }
    $(document).ajaxStart(function () {
        $(".spinner").show();
    }).ajaxStop(function () {
        $(".spinner").hide();
    });

    $(document).ready(function(){
    $( "#CheckUp" ).on( "submit", function( event ) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        var myForm = document.getElementById('CheckUp');
        var formData = new FormData(myForm);
        //var data2    = $( "#Registrationform" ).serialize();
        console.log(formData);
        $.ajax({
            type: 'POST',
            url : $(this).attr('action'),
            data : formData ,
            cache:false,
            contentType: false,
            processData: false,

            success  : function(data) {

                if (data.status === 2){
                    swal("عفوا", "لقد قمت بتسجيل بياناتك سابقا , يرجي الانتظار ...", "error");
                    setTimeout(function(){

                        window.location.href = "http://ereg.neelain.edu.sd/Complete/"+"444";
                    }, 3000);
                }else {
                    swal("شكرا", "تم ارسال بياناتك بنجاح , يرجي الانتظار ...", "success");
                    setTimeout(function(){

                        window.location.href = "http://ereg.neelain.edu.sd/Complete/"+"555";
                    }, 3000);
                }
                //console.log(data);

            },
            error: function(xhr, textStatus, thrownError){
                swal("عفوا!", "تأكد من صحة البيانات وحاول مرة أخري", "error");
            }

        });
        $("#Appintsend").trigger("reset");

    });
    });
</script>
</body>
</html>
