@extends('TEMP.layout')
@section('content')



    <div class="row">
        <section class="content-header">
            <div class="container">
                <h3>
                    الموظفين
                    <small>التفاصيل</small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                    <li class=""><a href="{{ url('/emoployeesList') }}"> قائمة الموظفين</a></li>

                    <li class="active"><a href="{{ url('/') }}">تفاصيل الموظف</a></li>



                </ol>
            </div>
        </section>
    </div>


    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">بيانات الموظف الاساسيه</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 table-responsive" >
                        <table class="table table-striped" >

                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <td>اسم الموظف</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->NameAR }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>جنسية الموظف</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->Nationality }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>المؤهل الاكاديمي</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->Qualify }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>البريد</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->Email }}
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td>الحالة الاجتماعية</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->Status }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>تاريخ الميلاد</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->BirthDate }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>مكان الميلاد</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->BirthPlace }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>هاتف المنزل</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->HomePhone }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>الجوال</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->MobPhone }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>المدينة</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->City }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>المحليه</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->Quarter }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>العنوان</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->Address }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>العنوان</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->Address }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>تاريخ التسجيل</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ date('F d, Y', strtotime($Single->created_at)) }}
                                    </div>
                                </td>

                            </tr>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="box-footer">
                </div>

            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>


    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">بيانات الموظف الوظيفية</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 table-responsive" >
                        <table class="table table-striped" >

                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <td>تاريخ التعين</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->AssignDate }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>نوع العميل</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->AgentType }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>نوع العميل</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->AssignType }}
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td>الفرع </td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->BranchName }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>ساعات العمل</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->WorkHours }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>الادارة</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->ManageName }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>المدير المباشر </td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->NameAR }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>المسمي الوظيفي</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->JobTName }}
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td>الدرجه الوظيفية</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->JobDegree }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>الوظيفة</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->JobName }}
                                    </div>
                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="box-footer">
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">بيانات الموظف المالية</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 table-responsive" >
                        <table class="table table-striped" >

                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <td>المرتب الاساسي</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->MainSalary }} ريال
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>بدل السكن</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->LivePremium }} ريال
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td>بدل النقل</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->TransPremium }} ريال
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>اسم بنك الموظف</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->BankName }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>اسم فرع بنك الموظف</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->BankBranch }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>رقم حسلب بنك الموظف</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->BankAccount }}
                                    </div>
                                </td>
                            </tr>



                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="box-footer">
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">بيانات الوثائق الرسمية للموظف</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 table-responsive" >
                        <table class="table table-striped" >
                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <td>رقم الهوية</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->IdentityID }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>مصدر الهوية</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->IdentitySrc }}
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td>تاريخ الاصدار</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->IdentityDate }}
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>تاريخ النتهاء</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->IdenDateEnd }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>رقم الجواز</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->PassportID }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>مصدر الجواز</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single-> PassportSrc}}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>تاريخ الاصدار</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single-> PassportDate}}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>تاريخ النتهاء</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{ $Single->PasDateEnd }}
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="box-footer">
                    <a href="#" onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> طباعة</a>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>



@endsection