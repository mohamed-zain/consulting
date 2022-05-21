@extends('TEMP.layout')
@section('content')

    <div class="row">
        <section class="content-header">
            <div class="container">

                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                    <li><a href="{{ url('emoployeesList') }}"><i class="fa fa-users"></i> الموظفين</a></li>
                    <li class="active">لوحة التحكم</li>
                </ol>
            </div>
        </section>
        <div class="col-lg-12">

            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">اضافة موظف</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li><a href="#timeline" data-toggle="tab">البيانات الشخصية</a></li>
                                <li><a href="#settings" data-toggle="tab">البيانات الوظيفية</a></li>
                                <li><a href="#activity" data-toggle="tab">البيانات المالية</a></li>
                                <li><a href="#magnage" data-toggle="tab">الوثائق الرسمية</a></li>
                            </ul>
                            <div class="tab-content">


                                <!-- /.tab-pane -->

                                <div class="active tab-pane" id="timeline">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">البيانات الشخصية</h3>
                                        </div>
                                        {!! Form::open(array('route'=>'Employee.store','class'=>'form-horizontal','onsubmit'=>'return validation();')) !!}
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="NameAR" class="col-sm-2 control-label">الاسم بالكامل</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" name="NameAR" class="form-control" id="NameAR" placeholder="الاسم بالكامل">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NameEN" class="col-sm-2 control-label">الاسم باللغة الانجليزية</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" name="NameEN" class="form-control" id="NameEN" placeholder="الاسم باللغة الانجليزية">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="btn  btn-file" style="font-size: 27px">
                                                        <i class="fa fa-picture-o fa-lg fa-5x"></i>
                                                        <input type="file" name="Attached" multiple="multiple" id="file" accept="'image/*" class="btn btn-success btn-lg btn-block" >

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="Email" class="col-sm-2 control-label">البريد الالكتروني</label>

                                                    <div class="col-sm-4">
                                                        <input type="text" name="Email" class="form-control" id="Email" placeholder="البريد الالكتروني">
                                                    </div>

                                                    <label for="inputPassword3" class="col-sm-2 control-label">الحالة الاجتماعية</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control select2" style="width: 100%;" name="Status">
                                                            <option value="">اختر الحالة الاجتماعية</option>
                                                            <option value="اعزب">اعزب</option>
                                                            <option value="متزوج">متزوج</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nationality" class="col-sm-2 control-label">الجنسية</label>

                                                    <div class="col-sm-4">
                                                        <input type="text" name="Nationality" class="form-control" id="Nationality" placeholder="الجنسية">
                                                    </div>

                                                    <label for="Qualify" class="col-sm-2 control-label"> المؤهل </label>

                                                    <div class="col-sm-4">
                                                        <input type="text" name="Qualify" class="form-control" id="Qualify" placeholder="المؤهل">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">محل الميلاد</label>

                                                    <div class="col-sm-4">
                                                        <input type="text" name="BirthPlace" class="form-control" id="BirthPlace" placeholder="محل الميلاد">
                                                    </div>

                                                    <label for="inputPassword3" class="col-sm-2 control-label"> تاريخ الميلاد </label>

                                                    <div class="col-sm-4">
                                                        <input type="text" name="BirthDate" class="form-control" id="BirthDate" placeholder="تاريخ الميلاد">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">رقم الجوال</label>

                                                    <div class="col-sm-4">
                                                        <input type="number" name="MobPhone" class="form-control" id="MobPhone" placeholder="رقم الجوال">
                                                    </div>

                                                    <label for="inputPassword3" class="col-sm-2 control-label"> هاتف المنزل </label>

                                                    <div class="col-sm-4">
                                                        <input type="number" name="HomePhone" class="form-control" id="HomePhone" placeholder="هاتف المنزل ">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">المدينة</label>

                                                    <div class="col-sm-4">
                                                        <input type="text" name="City" class="form-control" id="City" placeholder="المدينة">
                                                    </div>

                                                    <label for="inputPassword3" class="col-sm-2 control-label"> اسم الحي </label>

                                                    <div class="col-sm-4">
                                                        <input type="text" name="Quarter" class="form-control" id="Quarter" placeholder=" اسم الحي ">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label"> العنوان </label>
                                                    <div class="col-sm-10">
                                                        <textarea name="Address" class="form-control" id="Address"></textarea>
                                                    </div>
                                                </div>

                                            </div>


                                            <a href="#settings" class="btn btn-info pull-left" data-toggle="tab">التالي</a>


                                        </div>
                                    </div>
                                </div>
                                <!-- /.tabane -->
                                <div class="tab-pane" id="settings">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">البيانات الوظيفية</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2">تاريخ التعين</label>
                                                        <input type="text" name="AssignDate" id="AssignDate" class="form-control col-md-4" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2">الفرع</label>
                                                        <select class="form-control select2" name="Branch" id="Branch" style="width: 33%">
                                                            <option value="">اختر الفرع</option>
                                                            @foreach($branch as $br)
                                                                <option value="{{$br->id}}">{{$br->BranchName}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class=" col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2">نوع التعيين</label>
                                                        <input type="text" name="AssignType" class="form-control col-md-4" id="AssignType">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2">ساعات العمل الاسبوعية</label>
                                                        <input type="number" name="WorkHours" class="form-control col-md-4" id="WorkHours">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2">المسمي الوظيفي</label>
                                                        <select class="form-control  select2" name="JobTitle" style="width: 33%" id="JobTitle">

                                                            @foreach($jobtitle as $job)
                                                                <option value="{{$job->id}}">{{$job->JobTName}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2">الدرجة الوظيفية</label>
                                                        <input type="text" name="JobDegree" id="JobDegree"  class="form-control col-md-4" style="margin-bottom: 9px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2">الادارة</label>
                                                        <select class="form-control select2" name="Managment" id="Managment"  style="width: 33%" >
                                                            <option value="">اختر اسم الادارة</option>
                                                            @foreach($manages as $manage)
                                                                <option value="{{$manage->id}}">{{$manage->ManageName}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2">االمدير المباش</label>
                                                        <select class="form-control select2" name="MainDirector" id="MainDirector" style="width: 33%">
                                                            <option value="">اختر المدير المباشر</option>
                                                            @foreach($ManDirect as $main)
                                                                <option value="{{$main->id}}">{{$main->NameAR}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2">الوصف الوظيفي</label>
                                                        <textarea name="JobName" id="JobName" class="form-control col-md-10" style="margin-bottom: 9px;"></textarea>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2">الراتب الاساسي</label>
                                                        <input type="number" name="MainSalary" id="MainSalary" class="form-control col-md-4" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2">بدل السكن</label>
                                                        <input type="number" name="LivePremium" id="LivePremium" class="form-control col-md-4" value="">
                                                    </div>
                                                </div>

                                                <div class=" col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2">بدل النقل</label>
                                                        <input type="number" name="TransPremium" id="TransPremium" class="form-control col-md-4" value="">
                                                    </div>

                                                </div>

                                                <!-- /.tabane -->
                                            </div>
                                            <div class="box-footer">
                                                <a href="#activity" class="btn btn-info pull-left" data-toggle="tab">التالي</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="activity">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">البيانات المالية</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="box-body">


                                            <div class="row">
                                                <div class="form-group" >
                                                    <label for="inputEmail3" class="col-sm-2 control-label">اسم البنك</label>

                                                    <div class="col-sm-10">
                                                        <input type="text" name="BankName" id="BankNamemm" class="form-control" id="inputEmail3" placeholder="اسم البنك" style="margin-bottom: 9px;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label"> اسم فرع البنك </label>

                                                    <div class="col-sm-10">
                                                        <input type="text" name="BankBranch" id="BankBranch" class="form-control" id="inputPassword3" placeholder="اسم فرع البنك "  style="margin-bottom: 9px;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label">رقم الحساب</label>

                                                    <div class="col-sm-10">
                                                        <input type="number" name="BankAccount" id="BankAccount" class="form-control" id="inputPassword3" placeholder="رقم الحساب" >
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <a href="#magnage" class="btn btn-info pull-left" data-toggle="tab">التالي</a>

                                        </div>
                                        <!-- /.box-footer -->
                                    </div>

                                </div>
                                <div class="tab-pane" id="magnage">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">بيانات الهوية</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">رقم الهوية</label>

                                                <div class="col-sm-4">
                                                    <input type="text" name="IdentityID" class="form-control" id="IdentityID" placeholder="رقم الهوية" style="margin-bottom: 9px;">
                                                </div>
                                                <label for="inputEmail3" class="col-sm-2 control-label">مصدر الهوية</label>

                                                <div class="col-sm-4">
                                                    <input type="text" name="IdentitySrc" class="form-control" id="IdentitySrc" placeholder="مصدر الهوية" style="margin-bottom: 9px;">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">تاريخ الاصدار</label>

                                                <div class="col-sm-4">
                                                    <input type="text" name="IdentityDate" class="form-control" id="IdentityDate" placeholder="تاريخ الاصدار" style="margin-bottom: 9px;">
                                                </div>
                                                <label for="inputPassword3" class="col-sm-2 control-label">تاريخ النتهاء</label>

                                                <div class="col-sm-4">
                                                    <input type="text" name="IdenDateEnd" class="form-control" id="IdenDateEnd" placeholder="تاريخ النتهاء" style="margin-bottom: 9px;">
                                                </div>
                                            </div>


                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">

                                        </div>
                                        <!-- /.box-footer -->

                                    </div>
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">بيانات الجواز</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">رقم الجواز</label>

                                                <div class="col-sm-4">
                                                    <input type="text" name="PassportID" class="form-control" id="PassportID" placeholder="رقم الهوية" style="margin-bottom: 9px;">
                                                </div>
                                                <label for="inputEmail3" class="col-sm-2 control-label">مصدر الجواز</label>

                                                <div class="col-sm-4">
                                                    <input type="text" name="PassportSrc" class="form-control" id="PassportSrc" placeholder="مصدر الهوية" style="margin-bottom: 9px;">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">تاريخ الاصدار</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="PassportDate" class="form-control" id="PassportDate" placeholder="تاريخ الاصدار" style="margin-bottom: 9px;">
                                                </div>

                                                <label for="inputPassword3" class="col-sm-2 control-label">تاريخ النتهاء</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="PasDateEnd" class="form-control" id="PasDateEnd" placeholder="تاريخ النتهاء" style="margin-bottom: 9px;">

                                                </div>
                                            </div>


                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success"  >اضافة</button>
                                        </div>
                                        <!-- /.box-footer -->

                                        {!! Form::close() !!}

                                    </div>
                                </div>


                            </div>



                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


    </div>
    </div>
@endsection