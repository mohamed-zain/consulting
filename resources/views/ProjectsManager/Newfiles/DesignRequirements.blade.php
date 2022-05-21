@extends('ProjectsManager.layout')
@section('content')

    <div class="col-md-12">
        <h3> الادارة الهندسية  <small> متطلبات التصميم  </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>    متطلبات التصميم </a></li>

        </ol>
    </div>

    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">  استفسارات التصميم - المرسلة من العملاء </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                    <thead>
                    <tr>
                        <th> رقم البينار</th>
                        <th>المشروع</th>
                        <th>اسم العميل</th>
                        <th> الايميل</th>
                        <th> الجوال</th>
                        <th>تاريخ الاشتراك</th>
                        <th> تفاصيل</th>
                        <th> المتطلبات</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $single)
                <?php

                $RQ = \App\Models\DesignRequired::where('fileNumber',$single['number'])->first();

                $sha = DB::table('Schedule_tasks')
                    ->where('Bennar_Code',$single['number'])
                    //->where('Scheduled',$single['number'])
                    ->first(); ?>
                        <tr>
                            <td><span class="badge bg-yellow ">{{ $single['number'] }}</span></td>
                            <td><span class="">{{ $single['FileCode'] }}</span></td>
                            <td><span class=" ">{{$single['first_name'] }} {{$single['last_name'] }}</span></td>
                            <td>  <span>{{ $single['email'] }} </span></td>
                            <td>  <span dir="ltr">{{ $single['phone'] }} </span></td>
                            <td>
                                {{ Carbon\Carbon::parse($single['date_created'])->format('Y-m-d') }}
                                <span style="color: red" dir="ltr">{{ Carbon\Carbon::parse($single['date_created'])->diffForHumans() }}</span>

                            </td>

                            <td>
                                @if($single->EngID == null)
                                    @if(isset($sha))
                                        <a class="btn bg-blue btn-flat " href="#" >مجدولة لتاريخ  {{ $sha->assign_date }}</a>
                                    @else
                                        <a class="btn bg-navy btn-flat " href="#"  data-toggle="modal" data-target="#{{ $single['number'] }}">فتح JobCard</a>
                                    @endif
                                @else
                                    <?php $uer = DB::table('users')->where('id',$single->EngID)->first() ?>
                                    <a class="btn bg-red-active btn-flat " href="#" >مسند للمهندس {{ $uer->name }}</a>

                                @endif
                            </td>
                            <td><a class="btn bg-orange btn-flat " href="#"  data-toggle="modal" data-target="#DR{{ $single['number'] }}">متطلبات التصميم</a></td>

                        </tr>
                        <div class="modal fade" id="{{ $single['number'] }}" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">بدء العمل علي المخططات الهندسية</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="{{ route('OpenJobCard')}}" method="post">
                                                    {{ csrf_field() }}

                                                    <label for="BranchID" class="control-label"> أختر المهندس</label>
                                                    <input type="hidden" name="Bennar_Code" value="{{ $single['number'] }}">
                                                    <?php

                                                    $Services = App\Models\ProjectServices::where('Bennar_Code',$single['number'])->first();
                                                    ?>

                                                    <input type="hidden" name="Mission" value="{{ $Services->ServiceCode }}">
                                                    <div class="form-inline">
                                                        <select name="EmpID" class="form-control select2" id="EmpID"   style="margin-bottom: 9px; width: 80%" required>
                                                            @foreach(App\Models\User::where('roll','=','AdmissionEmp')->get() as $ser)
                                                                <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <br>
                                                    <div id="shadu" style="">
                                                        <label>تاريخ فتح بطاقة العمل للمهندس:</label>
                                                        <div class="input-group date">

                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="date" class="form-control pull-right" name="assign_date" required>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <label>تاريخ تسليم المهمة:</label>
                                                    <div class="input-group date">

                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="date" class="form-control pull-right" name="Deadline" required>
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-success">إرسال</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="DR{{ $single['number'] }}" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">متطلبات  التصميم</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <div class="box box-warning box-solid">
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title">  المتطلبات </h3>
                                                            <!-- /.box-tools -->
                                                        </div>
                                                        <!-- /.box-header -->
                                                        <div class="box-body">
                                                            @if(isset($RQ))
                                                                <div class="col-md-6">
                                                                    <ul class="list-group list-group-unbordered">
                                                                        <li class="list-group-item">
                                                                            <p>الاسم بالكامل</p> <a class="">{{ $RQ->fullName }}</a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>رقم الملف</p> <a class="">{{ $RQ->fileNumber }}</a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> مساحة الأرض بالمتر المربع</p>
                                                                            <a class=""> {{ $RQ->proLandArea }}</a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> ابعاد الارض طبقا للصك الصادر بحق الارض</p>
                                                                            <a class=""> {{ $RQ->proCircumference }}</a>

                                                                        </li>

                                                                        <li class="list-group-item">
                                                                            <p> نسبة البناء</p>
                                                                            <a class=""> <span>{{ $RQ->constructionRatio }}</span></a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>ميزانية المشروع</p>
                                                                            <a class=""> <span>{{ $RQ->proBudget }}</span></a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> هل تم استخراج الرخصة</p>
                                                                            <a class=""> <span>{{ $RQ->IssuanceOfLicense }}</span></a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>العزل بالجدار الخارجي</p> <a class=""> {{ $RQ->proInsulation }}</a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>   سيتم تشغيل المشروع والهدف من ذلك</p> <a class=""> {{ $RQ->proObjective }}</a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>  هل ترغب بمصعد</p> <a class="">{{ $RQ->proElevator }}</a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>نوع المصعد</p><a class=""> {{ $RQ->proElevatorType }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>كم عدد المصاعد</p><a class=""> {{ $RQ->proElevatorNum }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>إستايل الواجهة الخارجية للمشروع </p><a class=""> {{ $RQ->facadeType }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>هل مطلوب المرافق الخاصة بالكرام ( الوالد و الوالدة ) ؟</p><a class=""> {{ $RQ->parentalUtilities }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>عدد الابناء الذكور</p><a class=""> {{ $RQ->maleChildrenNum }}  </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>عدد البنات </p><a class=""> {{ $RQ->femaleChildrenNum }}  </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>عدد الخدم المنزلي</p><a class=""> {{ $RQ->servantsNum }}  </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>عدد السواقين إن وجد</p><a class=""> {{ $RQ->driversNum }}  </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>هل ترغب بوجود القبو</p><a class=""> {{ $RQ->proBasement }}  </a>
                                                                        </li>


                                                                        {{-- <li class="list-group-item">
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
                                                                         </li>--}}


                                                                        {{-- <li class="list-group-item">
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
                                                                         </li>--}}



                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <ul class="list-group list-group-unbordered">
                                                                        {{-- <li class="list-group-item">
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
                                                                         </li>--}}
                                                                        <li class="list-group-item">
                                                                            <p> ماهيه متطلبات القبو</p><a class=""> {{ $RQ->basementRequirements }}  </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> مسبح</p><a class=""> {{ $RQ->proPool }}  </a>
                                                                        </li>

                                                                        <li class="list-group-item">
                                                                            <p> في أي موقع تفضل المسبح الداخلي</p><a class=""> {{ $RQ->poolLocation }}  </a>
                                                                        </li>

                                                                        <li class="list-group-item">
                                                                            <p> نوع المسبح</p><a class=""> {{ $RQ->poolType }}  </a>
                                                                        </li>

                                                                        <li class="list-group-item">
                                                                            <p> متطلبات خدمات مرافقه للمسبح</p><a class=""> {{ $RQ->poolServies }}  </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>   قسم الضيافة :</p>
                                                                            <a class=""> {{ $RQ->proHospitality }}</a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p>   قسم المعيشة </p>
                                                                            <a class="">{{ $RQ->livingSection }}</a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> المطابخ</p>
                                                                            <a class=""> {{ $RQ->proKitchens }} </a>
                                                                        </li>

                                                                        <li class="list-group-item">
                                                                            <p> عدد غرف النوم </p>
                                                                            <a class=""> {{ $RQ->bedroomsNum }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> اذكر ما ترغب فيه من منافع في الدور الأول </p>
                                                                            <a class=""> {{ $RQ->firstFloorUtilities }} - {{ $RQ->firstFloorUtilitiesOther }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> هل يعتبر هذا الدور متكرر للدور السابق </p>
                                                                            <a class=""> {{ $RQ->firstFloorRepeat }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> اذكر ما ترغب فيه من منافع في الدور الثاني </p>
                                                                            <a class=""> {{ $RQ->secondFloorUtilities }} - {{ $RQ->secondFloorUtilitiesOther }}</a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> اذكر ما ترغب فيه من منافع في السطح </p>
                                                                            <a class=""> {{ $RQ->roofComponents }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> السباكة  </p>
                                                                            <a class=""> {{ $RQ->plumbing }} - {{ $RQ->plumbingOther }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> هل ترغب بتركيب الكراسي المعلقة ؟ </p>
                                                                            <a class=""> {{ $RQ->hangingChairs }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> اماكن الكراسي المعلقة </p>
                                                                            <a class=""> {{ $RQ->hangingChairsLocation }}  - {{ $RQ->hangingChairsLocationOther }}</a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> الكهرباء </p>
                                                                            <a class=""> {{ $RQ->electricity }} - {{ $RQ->electricityOther }} </a>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <p> النوافذ والابواب </p>
                                                                            <a class=""> {{ $RQ->WindowsDoors }} - {{ $RQ->WindowsDoorsOther }}</a>
                                                                        </li>

                                                                        <li class="list-group-item">
                                                                            <p> نظام التكييف في المشروع </p>
                                                                            <a class=""> {{ $RQ->airConditioning }} </a>
                                                                        </li>
                                                                        {{-- <li class="list-group-item">
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
                                 --}}

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
                                                    </div>
                                                    <!-- /.box -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.col -->
                                        </div>

                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>

                    </tr>
                    </tfoot>
                </table>

            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <script>

    </script>

@endsection
