@extends('EngineerDashboard.layouts.layout')
@section('content')
    <style>
        .btn-app{
            width: 100%;
            height: 200px;
            color: #e39548;
            border: solid 2px #e39548;
        }
    </style>
    <div class="">
        <section class="content-header">
            <div class="">
                <h3>
                    مهندس خير عون
                    <small> برنامج خيرعون لإدارة الخدمات الهندسية </small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('EngineerDashboard') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </ol>
            </div>
        </section>
    </div>

    <div class="col-md-12">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/bb.png') }}" alt="User profile picture" style="margin-right:20%">

                    <h3 class="profile-username text-center">{{ $Data->name }}</h3>

                    <p class="text-muted text-center">مهندس خيرعون</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>البريد</b> <a class="pull-left">{{ $Data->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>الجوال</b> <a class="pull-left">{{ $Data->MobPhone }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>قيمة الاشتراك</b> <a class="pull-left"> {{ $Data->Address }}  </a>
                        </li>
                    </ul>

                </div>
                <!-- /.box-body -->
            </div>

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="col-md-4">
                <a href="{{url('UpdateProfile')}}" class="btn btn-app" style="">
                    <i class="fa fa-user fa-3x"  style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>الملف الشخصي
                </a>
            </div>
            <div class="col-md-4" style="align-items: center;">

                <a href="{{url('InCompleteTasks')}}" class="btn btn-app">

                    <i class="fa fa-list fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>  المهام الغير منجزة
                </a>
            </div>
            <div class="col-md-4" style="align-items: center;">

                <a href="{{url('CompleteTasks')}}" class="btn btn-app">
                    <i class="fa fa-edit fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i> مهام منجزة
                </a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">متطلبات التصميم</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            @if(isset($RQ))
                                <div class="col-md-6">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <p>الاسم بالكامل</p> <a class="">{{ $RQ->yourname }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>رقم الملف</p> <a class="">{{ $RQ->yourfilenumber }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> مساحة الأرض بالمتر المربع</p>
                                            <a class=""> {{ $RQ->projectlandarea }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> ابعاد الارض طبقا للصك الصادر بحق الارض</p>
                                            <a class=""> {{ $RQ->landtype }}</a>
                                            @if($RQ->landtype=='الارض متوازية بعدين')
                                                <p>{{ $RQ->twodim1 }} * {{ $RQ->twodim2 }}</p>
                                            @elseif($RQ->landtype=='الارض مشطورة ثلاثة ابعاد')
                                                <p>{{ $RQ->threedim1 }} * {{ $RQ->threedim2 }} * {{ $RQ->threedim3 }}</p>
                                            @elseif($RQ->landtype=='الارض مشطورة اربعة ابعاد')
                                                <p>{{ $RQ->fourdim1 }} * {{ $RQ->fourdim2 }} {{ $RQ->fourdim3 }} * {{ $RQ->fourdim4 }}</p>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            <p> نسبة البناء</p>
                                            <a class=""> <span>{{ $RQ->buildpercentage }}</span></a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>العزل بالجدار الخارجي</p> <a class=""> {{ $RQ->isolatorthickness }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>   سيتم تشغيل المشروع والهدف من ذلك</p> <a class=""> {{ $RQ->projectoperationsype }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>  هل ترغب بمصعد</p> <a class="">{{ $RQ->projectelevator }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>نوع المصعد</p><a class=""> {{ $RQ->projectelevatortype }} </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>كم عدد المصاعد</p><a class=""> {{ $RQ->projectelevatornumber }} </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>إستايل الواجهة الخارجية للمشروع </p><a class=""> {{ $RQ->villasurfacestyle }} </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>هل مطلوب المرافق الخاصة بالكرام ( الوالد و الوالدة ) ؟</p><a class=""> {{ $RQ->familyparentsyesno }} </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>عدد الخدم المنزلي</p><a class=""> {{ $RQ->numberofservants }}  </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>عدد السواقين إن وجد</p><a class=""> {{ $RQ->numberofdrivers }}  </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>هل ترغب بوجود القبو</p><a class=""> {{ $RQ->undergroundyesno }}  </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> ماهيه متطلبات القبو</p><a class=""> {{ $RQ->undergroundfunction }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> سعة الخزان الماء الارضي</p><a class=""> {{ $RQ->groundfloorpooltankvolume }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> هل يتطلب الخزان للصرف</p><a class=""> {{ $RQ->groundfloorpoolsewage }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> مواقف السيارات</p><a class=""> {{ $RQ->groundfloorparkingyesno }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> موقع مواقف السيارات</p><a class=""> {{ $RQ->groundfloorparkinglocation }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> مواقف السيارات المطلوبة</p><a class=""> {{ $RQ->groundfloorparkingnumbercars }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> نوع السقف المواقف</p><a class=""> {{ $RQ->groundfloorparkingrooftype }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> مسبح</p><a class=""> {{ $RQ->groundfloorpool }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> في أي موقع تفضل المسبح الداخلي</p><a class=""> {{ $RQ->groundfloorpoolcoveredarea }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> نوع المسبح</p><a class=""> {{ $RQ->groundfloorpooltype }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> متطلبات خدمات مرافقه للمسبح</p><a class=""> {{ $RQ->groundfloorpooladditions }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> هل ترغب بوجود نادي رياضي في المشروع</p><a class=""> {{ $RQ->outsidefitness }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> هل ترغب بوجود البهو ( اللوبي )</p><a class=""> {{ $RQ->outsidereceptionlobby }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> هل ترغب باستخدام السطح ك حديقة معلقه</p><a class=""> {{ $RQ->outsideroofgarden }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> هل ترغب بوجود مستودع للمشروع في السطح</p><a class=""> {{ $RQ->outsideroofwarehouse }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> المداخل الرئيسية للمشروع</p><a class=""> {{ $RQ->groundfloormainentrance }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> عددها</p><a class=""> {{ $RQ->groundfloormainentrancenumber }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> الخدمات المطلوبة فيها</p><a class=""> {{ $RQ->groundfloormainentranceservices }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> المطبخ الضغط العالي (ديرتي )</p><a class=""> {{ $RQ->groundfloorhighpressurekitchen }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> المطبخ الداخلي</p><a class=""> {{ $RQ->groundfloorkitchen }}  </a>
                                        </li>



                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <p> مستودع الاطعمه</p><a class=""> {{ $RQ->groundfloorfoodstorage }}  </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> عدد الكراسي المطلوبة في طاولات الطعام</p> <a class="">{{ $RQ->groundfloordiningtablechairs }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>بوفيه الدور العلوي</p> <a class="">{{ $RQ->groundfloorbuffet }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> يحتوي البوفيه على</p> <a class=""> {{ $RQ->groundfloorbuffetcomponents }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> هل ترغب بمجلس خارج الفيلا مستقل بخدماته</p> <a class=""> {{ $RQ->firstfloorguestroomindepq }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> عدد الأشخاص</p>
                                            <a class=""> <span>{{ $RQ->firstfloorguesthallindnumber }}</span></a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> إستايل الديكور المطلوب</p>
                                            <a class=""> {{ $RQ->firstfloorguesthallindstyle }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>   مجلس ضيافة الرجال الداخلي:</p>
                                            <a class=""> {{ $RQ->firstfloormenguesthallnumber }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>   إستايل الديكور المطلوب</p>
                                            <a class="">{{ $RQ->firstfloormenguesthallstyle }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <p>  محتويات دورة المياه المرافقة</p>
                                            <a class=""> {{ $RQ->groundfloormenguesthallbathcomponents }} </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> عدد المغاسل الضيوف المطلوبة</p><a class=""> {{ $RQ->groundfloormenguesthallbathwashingnumber }} </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> غرفة طعام الضيوف (المقلط ) </p><a class=""> {{ $RQ->groundfloorguestdiningroom1 }} </a>
                                        </li>
                                        <li class="list-group-item">
                                            <p> غرفة طعام الضيوف | نوع الجلسة</p><a class=""> {{ $RQ->groundfloorguestdiningroom2 }} </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> مجلس نساء - عدد الاشخاص</p><a class=""> {{ $RQ->firstfloorwomenguesthallnumber }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> اختر إستايل الديكور المطلوب</p><a class=""> {{ $RQ->firstfloorwomenguesthallstyle }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> محتويات دورة المياه المرافقة</p><a class=""> {{ $RQ->groundfloorwomenguesthallbathcomponents }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> عدد المغاسل الضيوف المطلوبة</p><a class=""> {{ $RQ->groundfloorwomenguesthallbathwashingnumber }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> جناح متكامل نوم ضيوف في الدور الأرضي</p><a class=""> {{ $RQ->groundfloorguestsleepingsuite }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> الدرج</p><a class=""> {{ $RQ->groundfloorstairs }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> حديقة</p><a class=""> {{ $RQ->groundflooryard }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p>  مكونات غرفه النوم</p><a class=""> {{ $RQ->secondfloormainbedroomcomponents }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p>  مكونات غرفة الملابس</p><a class=""> {{ $RQ->secondfloormainbedroomdressingcomponents }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p>  مكونات دورة المياه الفندقيه</p><a class=""> {{ $RQ->secondfloormaintoiletcomponents }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> اختر مكونات الجلسه الداخليه</p><a class=""> {{ $RQ->secondfloormainloungecomponents }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> الجناح العام الأبناء المكرر - عدد الاجنحه المطلوبه </p><a class=""> {{ $RQ->villafirstfloorkidsnumberrooms }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> مكونات الجناح العام -الابناء</p><a class=""> {{ $RQ->villafirstfloorkidsroomsoptions }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> اختر مكونات غرفه النوم</p><a class=""> {{ $RQ->secondfloorkidsbedroomcomponents }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> اختر مكونات دورة مياه الأبناء</p><a class=""> {{ $RQ->secondfloorkidsbathcomponents }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> عدد اجنحه نوم الأبناء المشتركه | غرفه بسرير مزدوج لشخصين</p><a class=""> {{ $RQ->villafirstfloorkidsnumberdoublerooms }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> اختر الخدمات المطلوبه في الطابق الأخير-مُلحق العماله المنزليه</p><a class=""> {{ $RQ->thirdfloorstaffsection }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> مُلحق منطقه الغسيل:</p><a class=""> {{ $RQ->thirdfloorlaundrysection }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> السينما:</p><a class=""> {{ $RQ->thirdfloorcinema }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p> صالة رياضية </p><a class=""> {{ $RQ->thirdfloorfitness }}  </a>
                                        </li>

                                        <li class="list-group-item">
                                            <p>  المسبح المعلق </p><a class=""> {{ $RQ->thirdfloorpool }}  </a>
                                        </li>


                                    </ul>
                                </div>
                            @else
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> تنبيه !</h4>
                                    <span>متطلبات التصميم لهذا المشروع غير متوفرة حاليا ... تواصل مع العميل للتنبيه</span>
                                </div>
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{ url('EngineerDashboard') }}" class="uppercase">رجوع للسابق</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>

            </div>
        </div>
    </div>


@endsection