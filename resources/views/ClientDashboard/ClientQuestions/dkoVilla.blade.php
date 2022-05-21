<!doctype html>
<html lang="en" style=" direction:rtl;">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>خيرعون الامارات - لوحة تحكم العميل</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dist/img/logo.png') }}" />
    <link rel="icon" type="image/jpg" href="{{ asset('dist/img/logo.png') }}" />
    <!--     Fonts and icons     -->
    <!-- CSS Files -->
    <link href="{{ asset('/assets2/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets2/css/material-bootstrap-wizard.css') }}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('/assets2/css/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('/style.css') }}" rel="stylesheet" />
    <link href="{{asset('/assets/css/notify.css')}}" rel='stylesheet' type='text/css' />
    <script src="{{ asset('/assets2/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('/assets2/css/sweetalert-dev.js')}}"></script>
    <link href="{{asset('/assets2/css/sweetalert.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('/jquery-ui.custom.min.css')}}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <script type="text/javascript">
        $(window).load(function() {
            $(".base4loader").fadeOut("slow");
        });
    </script>
    <style>
        .radio label .circle{
            border-radius: 1% !important;
        }
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

<body>
<div class="base4loader">
</div>
<div class="spinner pull-right" style="display:none;">
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="rect3"></div>
    <div class="rect4"></div>
    <div class="rect5"></div>
    <p>جاري معالجة البيانات ...</p>
</div>
@if(session('message'))
    <div class="notify top-right do-show" data-notification-status="error" style="direction: rtl;text-align: center;">
        {{session('message')}}
    </div>
@endif
@if(Session::has('Flash'))
    <script type="text/javascript">
        swal("شكرا", "{{ Session::get('Flash') }}", "success");
    </script>
    <div class="notify top-right do-show" data-notification-status="success" style="direction: rtl;text-align: center;">
        {{ Session::get('Flash') }}
    </div>
@endif
@if ($errors->any())
    <div class="notify bottom-right do-show" data-notification-status="error" style="direction: rtl;text-align: center;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="image-container set-full-height" style="background-image: url('public/slide3.jpg')">
    <!--   Creative Tim Branding   -->
    <a href="https://ko-design.ae">
        <div class="logo-container">
            <div class="logo">
                <img src="{{ asset('dist/img/logo.png') }}">
            </div>
            <div class="brand">خيرعون  </div>
        </div>
    </a>
    <!--  Made With Material Kit  -->
    <a href="#" class="made-with-mk">
        <div class="brand"> KO </div>
        <div class="made-with"> خيرعون <strong>جدة </strong></div>
    </a>
    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="orange" id="wizard">
                        <form action="{{ route('DkoVillaReq') }}" method="POST" enctype="multipart/form-data"  id="Registrationform">
                        {{ csrf_field() }}
                        <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

                            <div class="wizard-header">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <img src="{{ asset('img/logo.png') }}" style="max-height: 80px;width: auto" class="img-responsive center">
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <h3 class="wizard-title">
                                            استفسارات تصميم الفيلا
                                        </h3>
                                        <h5>قم بتعبئة النموذج وتأكد من صحة البيانات المدخلة</h5>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <img src="{{ asset('img/logo.png') }}" style="max-height: 80px;float: left!important;" class="img-responsive center">
                                    </div>
                                </div>


                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#details" data-toggle="tab"> معلومات المشروع</a></li>
                                    <li><a href="#captain" data-toggle="tab">تشغيل المشروع </a></li>
                                    <li><a href="#activity" data-toggle="tab"> الدور الأرضي </a></li>
                                    <li><a href="#live" data-toggle="tab"> الدور  (الاول-الثاني-السطح) </a></li>
                                    <li><a href="#attach" data-toggle="tab">  المتطلبات التشغيلية  </a></li>
                                    {{--<li><a href="#construct" data-toggle="tab">قبل الارسال</a></li>--}}


                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="details">

                                    <h4 class="info-text">تكرم بإدخال المعلومات الشخصية عزيزنا العميل </h4>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label> الاسم بالكامل </label>
                                                <input name="fullName" class="form-control"  id="fullName" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label> رقم الملف  </label>
                                                <input name="fileNumber" id="fileNumber" class="form-control mynum" minlength="1" maxlength="4" required>
                                                    {{--@foreach($idtyype as $itype)
                                                        <option value="{{$itype->cardtype_id}}">{{$itype->cardtype_name}}</option>
                                                    @endforeach--}}
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label>  مساحة الأرض بالمتر المربع </label>
                                                <input type="text" name="proLandArea" class="form-control"  id="proLandArea" required>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label>    محيط الأرض طبقا للواقع </label>
                                                <select  name="proCircumference" class="form-control"  id="proCircumference" required>
                                                    <option>مربعة</option>
                                                    <option>مستطيلة</option>
                                                    <option>منحنية الاضلاع</option>
                                                    <option>منحرفة الأضلاع</option>
                                                    <option></option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label>حدد نسبة البناء المسموح بها ضمن مدينتك </label>
                                                <input type="text" name="constructionRatio" class="form-control mynum"  id="constructionRatio" minlength="1" maxlength="2" required>

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label> الميزانية الكاملة للمشروع</label>
                                                <input type="text" name="proBudget" class="form-control mynum"  id="proBudget" minlength="1" maxlength="10" required>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label> هل تم اصدار الرخصة للمشروع </label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="IssuanceOfLicense" value="نعم" id="IssuanceOfLicense">
                                                    </label>
                                                    <span>نعم</span>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="IssuanceOfLicense" value="لا" id="IssuanceOfLicense2">
                                                    </label>
                                                    <span>لا</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" id="isooption">
                                            <div class="form-group label-floating">
                                                <label>ماهية العزل بالجدار الخارجي</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="proInsulation" value="جدار + عزل + جدار خارجي" id="proInsulation">
                                                    </label>
                                                    <span>جدار + عزل + جدار خارجي</span>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="proInsulation" value="جدار + عزل من الخارج">
                                                    </label>
                                                    <span>جدار + عزل من الخارج</span>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="proInsulation" value="جدار + عزل من الخارج">
                                                    </label>
                                                    <span>جدار + عزل من الخارج</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>

                                </div>
                                <div class="tab-pane" id="captain">
                                    <div class="alert alert-warning alert-dismissible" role="alert" id="alert" style="display: none">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Warning!</strong> <div id="message"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label>الهدف من تشغيل المشروع </label>
                                                <div class="form-group label-floating">

                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="proObjective" value="مشروع سكني خاص">
                                                        </label>
                                                        <span>مشروع سكني خاص</span>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="proObjective" value="نصف سكني ونصف للاستثمار">
                                                        </label>
                                                        <span>نصف سكني ونصف للاستثمار</span>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="proObjective" value="مشروع سكني للبيع">
                                                        </label>
                                                        <span>مشروع سكني للبيع</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">

                                                <div class="form-group label-floating">
                                                    <label>هل ترغب بمصعد؟ </label>
                                                    <div class="form-group label-floating">

                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="proElevator" value="نعم" id="proElevator">
                                                            </label>
                                                            <span>نعم</span>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="proElevator" value="لا" id="proElevator2">
                                                            </label>
                                                            <span>لا</span>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row elev">
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label>	نوع المصعد</label>
                                            </div>
                                                <div class="form-group">
                                                    <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="proElevatorType" value="خرساني">
                                                        </label>
                                                        <span>خرساني</span>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="proElevatorType" value="بانوراما">
                                                        </label>
                                                        <span>بانوراما</span>
                                                    </div>
                                                    </div>

                                                </div>
                                        </div>

                                    </div>

                                    <div class="row elev">
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label>	عدد المصاعد</label>
                                                <input type="number" name="proElevatorNum"  class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label>	هل مطلوب المرافق الخاصة بالكرام ( الوالد و الوالدة ) ؟</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="parentalUtilities" value="نعم">
                                                        </label>
                                                        <span>نعم</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="parentalUtilities" value="لا">
                                                        </label>
                                                        <span>لا</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label>عدد الابناء</label>
                                                <input type="number" name="maleChildrenNum"  class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label>عدد البنات</label>
                                                <input type="number" name="femaleChildrenNum"  class="form-control">

                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label>عدد الخدم المنزلي</label>
                                                <input type="number" name="servantsNum"  class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label>عدد السواقين</label>
                                                <input type="number" name="driversNum"  class="form-control">

                                            </div>

                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label>	هل يوجد مسبح؟</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="proPool" value="نعم" id="proPool">
                                                        </label>
                                                        <span>نعم</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="proPool" value="لا" id="proPool2">
                                                        </label>
                                                        <span>لا</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row Pool">
                                        <div class="col-sm-8">
                                            <div class="form-group label-floating">
                                                <label>في اي موقع تفضل المسبح الداخلي؟</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="poolLocation" value="الدور الأرضي">
                                                        </label>
                                                        <span>الدور الأرضي</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="poolLocation" value="السطح">
                                                        </label>
                                                        <span>السطح</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row Pool">
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating">
                                                <label>نوع المسبح</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="poolType" value="مسبح اسكيمر">
                                                        </label>
                                                        <span>مسبح اسكيمر</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="poolType" value="مسبح اوفرفلو (استاندرد خير عون)">
                                                        </label>
                                                        <span>مسبح اوفرفلو (استاندرد خير عون)</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row Pool">
                                        <div class="col-sm-12">
                                            <div class="form-group label-floating">
                                                <label>خدمات مرافقة للمسبح </label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="poolServies[]" value=" جلسة خارجية">
                                                        </label>
                                                        <span> جلسة خارجية</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="poolServies[]" value="بار مسبح">
                                                        </label>
                                                        <span>بار مسبح</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="poolServies[]" value="جاكوزي مسبح">
                                                        </label>
                                                        <span>جاكوزي مسبح</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="poolServies[]" value="لا شئ">
                                                        </label>
                                                        <span>لا شئ</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <br/>


                                </div>

                                <div class="tab-pane" id="activity">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group label-floating">
                                                <label> ماهية التصميم للواجهة الخارجية للمشروع</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="facadeType" value="مودرن">
                                                        </label>
                                                        <span> مودرن </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="facadeType" value="كلاسيك">
                                                        </label>
                                                        <span>كلاسيك</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="facadeType" value="نيو كلاسيك">
                                                        </label>
                                                        <span>نيو كلاسيك</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label>	هل يوجد قبو؟</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="proBasement" value="نعم" id="proBasement">
                                                        </label>
                                                        <span>نعم</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="proBasement" value="لا" id="proBasement2">
                                                        </label>
                                                        <span>لا</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row" id="Basement">
                                        <div class="col-sm-12">
                                            <div class="form-group label-floating">
                                                <label>	متطلبات القبو</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="basementRequirements[]" value="صالة العاب">
                                                        </label>
                                                        <span>صالة العاب</span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="basementRequirements[]" value="دورات مياه">
                                                        </label>
                                                        <span>دورات مياه</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="basementRequirements[]" value="غرفة سائق">
                                                        </label>
                                                        <span>غرفة سائق</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="basementRequirements[]" value="كراج تحت الارض">
                                                        </label>
                                                        <span>كراج تحت الارض</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="basementRequirements[]" value="اخرى">
                                                        </label>
                                                        <span> اخرى</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <h3> اذكر ما ترغب فيه من منافع في الدور ارضي</h3>
                                        <div class="form-group label-floating">
                                            <label>قسم الضيافة</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="proHospitality[]" value="ملحق ضيافة خارجي">
                                                </label>
                                                <span>ملحق ضيافة خارجي</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="proHospitality[]" value="مجلس ضيافة رجال">
                                                </label>
                                                <span>مجلس ضيافة رجال</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="proHospitality[]" value="مجلس ضيافة نساء">
                                                </label>
                                                <span>مجلس ضيافة نساء</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="proHospitality[]" value="طاولة طعام ضيافة مشتركة">
                                                </label>
                                                <span>طاولة طعام ضيافة مشتركة</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="proHospitality[]" value="أخرى">
                                                </label>
                                                <span>أخرى</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group label-floating">
                                            <label>قسم المعيشة</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="livingSection[]" value="صالة معيشة">
                                                </label>
                                                <span>  صالة معيشة</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="livingSection[]" value="غرفة الخادمة مع ملحقاتها">
                                                </label>
                                                <span>غرفة الخادمة مع ملحقاتها</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="livingSection[]" value="غرفة غسيل">
                                                </label>
                                                <span>غرفة غسيل</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="livingSection[]" value="مستودع عام">
                                                </label>
                                                <span>مستودع عام</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="livingSection[]" value="اخرى">
                                                </label>
                                                <span>اخرى</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group label-floating">
                                            <label> المطابخ</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="proKitchens[]" value="مطبخ داخلي مغلق">
                                                </label>
                                                <span> مطبخ داخلي مغلق</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="proKitchens[]" value="مطبخ داخلي مفتوح">
                                                </label>
                                                <span>مطبخ داخلي مفتوح</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="proKitchens[]" value="مطبخ قلي">
                                                </label>
                                                <span>مطبخ قلي</span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="proKitchens[]" value="مطبخ خارجي">
                                                </label>
                                                <span>مطبخ خارجي </span>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane" id="live">
                                   {{-- <h4 class="info-text">
                                        ينظم استاندرد خيرعون الطابق الثاني على اجنحة النوم وتحتوي على (غرفة النوم+ خزانة الملابس + دورة المياه)
                                    </h4>--}}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label>اذكر اجمالي عدد غرف النوم في الدور بما في ذلك الجناح الرئيسي</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <div class="">
                                                        <label>اذكرها </label>
                                                        <input type="number" name="bedroomsNum" class="form-control" placeholder="اذكر  عدد الغرف">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group label-floating">
                                                <label> اذكر ما ترغب فيه من منافع في الدور الأول </label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="firstFloorUtilities[]" value="بوفيه تحضيري">
                                                        </label>
                                                        <span> بوفيه تحضيري </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="firstFloorUtilities[]" value="صالة معيشة">
                                                        </label>
                                                        <span>صالة معيشة</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <input type="text" name="firstFloorUtilitiesOther" class="form-control" placeholder="اخرى اذكرها  ">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group label-floating">
                                                <label> اذكر ما ترغب فيه من منافع في الدور الثاني </label>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label><small>هل يعتبر هذا الدور متكرر للدور السابق</small></label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="firstFloorRepeat" value="نعم" id="firstFloorRepeat">
                                                    </label>
                                                    <span>نعم</span>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="firstFloorRepeat" value="لا" id="firstFloorRepeat2">
                                                    </label>
                                                    <span>لا</span>
                                                </div>


                                            </div>
                                            <div class="form-group" id="boonone">
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="secondFloorUtilities[]" value="بوفيه تحضيري ">
                                                        </label>
                                                        <span> بوفيه تحضيري </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="secondFloorUtilities[]" value="صالة معيشة">
                                                        </label>
                                                        <span>صالة معيشة</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <input type="text" name="secondFloorUtilitiesOther" class="form-control" placeholder="اخرى اذكرها  ">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group label-floating">
                                                <label> اذكر ما ترغب فيه من منافع في السطح </label>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label><small> يتم استخدام 50%  فقط في هذا الدور
                                                        اختر المنافع التي ترغب باستخدامها في السطح
                                                    </small></label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="roofComponents[]" value="جناح نوم متكامل">
                                                    </label>
                                                    <span>جناح نوم متكامل</span>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="roofComponents[]" value="صالة معيشة">
                                                    </label>
                                                    <span>صالة معيشة</span>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="roofComponents[]" value="بوفيه تحضيري">
                                                    </label>
                                                    <span>بوفيه تحضيري</span>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="roofComponents[]" value="غرفة الخدم بمنافعها">
                                                    </label>
                                                    <span>غرفة الخدم بمنافعها</span>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="roofComponents[]" value="غرفة الغسيل">
                                                    </label>
                                                    <span>غرفة الغسيل</span>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="roofComponents[]" value="حديقة علوية">
                                                    </label>
                                                    <span>حديقة علوية</span>
                                                </div>


                                            </div>

                                        </div>

                                    </div>


                                </div>
                                <div class="tab-pane" id="attach">
                                    <h4 class="info-text">استاندرد خير عون (السباكة - الكهرباء - التكييف)</h4>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="plumbing" value="تطبيق استاندرد خيرعون الاحترافي في بنود السباكة الامريكية المعلقة ">
                                                </label>
                                                <span>  تطبيق استاندرد خيرعون الاحترافي في بنود السباكة الامريكية المعلقة  </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="radio">
                                                <input type="text" name="plumbingOther" class="form-control" placeholder="طلبات خاصة اذكرها  ">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label>	هل ترغب بتركيب الكراسي المعلقة  ؟</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="hangingChairs" value="نعم" id="hangingChairs">
                                                        </label>
                                                        <span>نعم</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="hangingChairs" value="لا" id="hangingChairs2">
                                                        </label>
                                                        <span>لا</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row" id="Chairs">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="hangingChairsLocation" value="كامل المبنى">
                                                        </label>
                                                        <span>كامل المبنى</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="text" name="hangingChairsLocationOther" class="form-control" placeholder="مواقع محددة اذكرها  ">
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <hr>
                                    <h4 class="info-text">الكهرباء والإنارة - النوافذ والأبواب </h4>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group label-floating">
                                                <label>الكهرباء والانارة</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="electricity" value="تطبيق استاندرد خيرعون الاحترافي في بنود الكهرباء مطابقة كفاءة الطاقة السعودية">
                                                        </label>
                                                        <span>  تطبيق استاندرد خيرعون الاحترافي في بنود الكهرباء مطابقة كفاءة الطاقة السعودية </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="radio">
                                                        <input type="text" name="electricityOther" class="form-control" placeholder="طلبات خاصة اذكرها  ">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <div class="form-group label-floating">
                                            <label>النوافذ والابواب</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="WindowsDoors" value="تطبيق استاندرد خيرعون الاحترافي في ضبط مقاسات الموحدة">
                                                    </label>
                                                    <span> تطبيق استاندرد خيرعون الاحترافي في ضبط مقاسات الموحدة </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="radio">
                                                    <input type="text" name="WindowsDoorsOther" class="form-control" placeholder="طلبات خاصة اذكرها  ">
                                                </div>
                                            </div>

                                        </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="info-text">استاندرد التكييف</h4>

                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group label-floating">
                                                <label><small> نظام التكييف في المشروع</small></label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="airConditioning" value="تطبيق استاندرد خيرعون في التكييف - يتم اعتماد نظام التكييف الاسبلت في جميع الغرف النوم بإستثناء غرفة النوم الرئيسية">
                                                    </label>
                                                    <span>تطبيق استاندرد خيرعون في التكييف - يتم اعتماد نظام التكييف الاسبلت في جميع الغرف النوم بإستثناء غرفة النوم الرئيسية </span>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="airConditioning" value="تطبيق نظام التوفيري - جميع المرافق تكيف بنظام الاسبلت فقط ">
                                                    </label>
                                                    <span>تطبيق نظام التوفيري - جميع المرافق تكيف بنظام الاسبلت فقط </span>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="airConditioning" value="تطبيق نظام الاحترافي الفخم - جميع مرافق المشروع بنظام الكونسلت المخفي">
                                                    </label>
                                                    <span>تطبيق نظام الاحترافي الفخم - جميع مرافق المشروع بنظام الكونسلت المخفي </span>
                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                </div>



                            </div>
                            <div class="wizard-footer">
                                <div class="pull-left">
                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='التالي' />
                                    <input type='submit' id="btsubmit" class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='حفظ وارسال' />
                                </div>
                                <div class="pull-right">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='السابق' />

                                    <div class="footer-checkbox">
                                        <div class="col-sm-12">
                                            <div class="checkbox">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
            <a href=""> جميع الحقوق محفوظة © 2020 - 2030 - خيرعون     </a>
        </div>
    </div>
</div>
<script>



    $(document).ajaxStart(function () {
        $(".spinner").show();
    }).ajaxStop(function () {
        $(".spinner").hide();
    });

    $(document).ready(function(){
            //console.log($('#parent').val());

        $("#IssuanceOfLicense").click(function(){
            $("#isooption").css("display", "none");
        });
        $("#IssuanceOfLicense2").click(function(){
            $("#isooption").css("display", "inline");
        });


        $("#proElevator2").click(function(){
            $(".elev").css("display", "none");
        });
        $("#proElevator").click(function(){
            $(".elev").css("display", "inline");
        });


        $("#firstFloorRepeat").click(function(){
            $("#boonone").css("display", "none");
        });
        $("#firstFloorRepeat2").click(function(){
            $("#boonone").css("display", "inline");
        });


        $("#hangingChairs").click(function(){
            $("#Chairs").css("display", "inline");
        });
        $("#hangingChairs2").click(function(){
            $("#Chairs").css("display", "none");
        });

        $("#proPool").click(function(){
            $(".Pool").css("display", "inline");
        });
        $("#proPool2").click(function(){
            $(".Pool").css("display", "none");
        });

        $("#proBasement").click(function(){
            $("#Basement").css("display", "inline");
        });
        $("#proBasement2").click(function(){
            $("#Basement").css("display", "none");
        });


        $("#choice2").click(function(){

            $('input[name=gender]').val('2');
        });
        $("#Pay").click(function(){
            $("#rec").css("display", "inline");

        });
        $("#Pay2").click(function(){
            $("#rec").css("display", "none");

        });
        $("#parenOn").click(function(){
            $('input[name=father_exist]').val('1');
            $("#parent_dis").css("display", "none");

        });
        $("#parenOff").click(function(){
            $('input[name=father_exist]').val('');
            $("#parent_dis").css("display", "block");

        });
    });
    $('#btsubmit').click(function () {

        var phone1 = document.getElementById("phone1").value;
        var gender = document.getElementById("gender").value;
        var idcard_type = document.getElementById("idcard_type").value;
        var idcard_id = document.getElementById("idcard_id").value;
        var nid = document.getElementById("nid").value;
        var birthdate = document.getElementById("birthdate").value;
        var localID = document.getElementById("localID").value;
        var chargername = document.getElementById("chargername").value;
        var job_place = document.getElementById("job_place").value;
        var phone = document.getElementById("phone").value;
        var profilePic = document.getElementById("wizard-picture").value;
        var Attach0 = document.getElementById("Attach0").value;




        if (gender == "") {

            text = "الرجاء اختيار الجنس ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (phone1 == "") {

            text = "الرجاء ادخال رقم الهاتف ";
            swal("عفوا!", text, "error");
            return false;

        }

        if (isNaN(phone1)) {
            text = "رجاء كتابه رقم في حقل رقم الهاتف";
            swal("عفوا!", text, "error");
            return false;

        }

        if (idcard_type == "") {

            text = "الرجاء اختيار نوع اثبات الشخصية ";
            swal("عفوا!", text, "error");
            return false;

        }

        if (idcard_id == "") {

            text = "الرجاء كتابة رقم اثبات الشخصية ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (nid == "") {

            text = "الرجاء اختيار الجنسية ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (birthdate == "") {

            text = "الرجاء اختيار تاريخ الميلاد ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (localID == "") {

            text = "الرجاء اختيار المحلية ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (chargername == "") {

            text = "الرجاء كتابة اسم ولي الأمر ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (job_place == "") {

            text = "الرجاء كتابة مكان عمل ولي الامر ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (phone == "") {

            text = "الرجاء كتابة  رقم هاتف ولي الامر ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (profilePic == "") {

            text = "الرجاء ارفاق الصورة الشخصية ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (Attach0 == "") {

            text = "الرجاء ارفاق اثبات الشخصية ";
            swal("عفوا!", text, "error");
            return false;

        }
        $( "#Registrationform" ).on( "submit", function( event ) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            var myForm = document.getElementById('Registrationform');
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

                            window.location.href = "https://ko-design.ae/my-account/";
                        }, 3000);
                    }else {
                        swal("شكرا", "تم ارسال بياناتك بنجاح , يرجي الانتظار ...", "success");
                        setTimeout(function(){

                            window.location.href = "https://ko-design.ae/my-account/";
                        }, 3000);
                    }
                    //console.log(data);
                },
                error: function(xhr, textStatus, thrownError){
                    swal("عفوا!", "تأكد من صحة البيانات وحاول مرة أخري", "error");
                }
            });
            $("#Registrationform").trigger("reset");

        });

    });
</script>

<script src="{{ asset('jquery-confirm.js') }}" type="text/javascript"></script>
<script src="{{ asset('jquery-ui.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets2/js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets2/js/jquery.bootstrap.js') }}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('assets2/js/material-bootstrap-wizard.js') }}"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{ asset('assets2/js/jquery.validate.min.js') }}"></script>

</body>
<!--   Core JS Files   -->


</html>
