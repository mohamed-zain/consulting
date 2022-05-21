@extends('ActivateAccount.layout')
@section('content')
    <div class="col-md-12">
        <h3>ادارة القبول  <small>تفعيل الحسابات </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>  تفعيل الملفات </a></li>

        </ol>
    </div>



    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">بيانات تفعيل الملف</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td><strong>اسم الشركة</strong></td>
                        <td>مؤسسة خير عون للتصميم</td>
                        <td style="direction: ltr;">Khayr Oawn Designing Corporation</td>
                        <td style="direction: ltr;"><strong>COMPANY NAME</strong></td>
                    </tr>
                    <tr>
                        <td><strong>عنوان الشركة</strong></td>
                        <td><small>المملكة العربية السعودية ، جدة</small></td>
                        <td style="direction: ltr;">Saudi Arabia, Jeddah</td>
                        <td style="direction: ltr;"><strong>COMPANY ADDRESS</strong></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">
                            <strong> فاتورة ضريبية </strong>
                            <p>الرقم الضريبي : 311114804500003 </p>
                        </td>
                        <td><small>المملكة العربية السعودية ، جدة</small></td>
                        <td style="direction: ltr;">Saudi Arabia, Jeddah</td>
                        <td style="direction: ltr;"><strong>COMPANY ADDRESS</strong></td>
                    </tr>

                    <tr>
                        <td><strong>اسم البنك</strong></td>
                        <td>مصرف الإنماء</td>
                        <td style="direction: ltr;">Alinma Bank</td>
                        <td style="direction: ltr;"><strong>BANK NAME</strong></td>
                    </tr>
                    <tr>
                        <td><strong> الفرع</strong></td>
                        <td>جده</td>
                        <td style="direction: ltr;">Jeddah</td>
                        <td style="direction: ltr;"><strong>BRANCH </strong></td>
                    </tr>


                    <tr>
                        <td><strong> حساب جاري</strong></td>
                        <td>68203455918000</td>
                        <td style="direction: ltr;">68203455918000</td>
                        <td style="direction: ltr;"><strong> ACCOUNT NUMBER</strong></td>
                    </tr>
                    <tr>
                        <td><strong>رقم ايبان </strong></td>
                        <td>SA3505000068203455918000</td>
                        <td style="direction: ltr;">SA3505000068203455918000</td>
                        <td style="direction: ltr;"><strong>IBAN NUMBER </strong></td>
                    </tr>
                    <tr>
                        <td><strong> رقم سويفت</strong></td>
                        <td>INMASARI</td>
                        <td style="direction: ltr;">INMASARI</td>
                        <td style="direction: ltr;"><strong>SWIFIT CODE </strong></td>
                    </tr>

                </table>
            </div>
            <!-- /.box -->
        </div>
    </div>

    @endsection