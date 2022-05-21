@extends('ProjectsManager.layout')
@section('content')
    <style>


        /*************************************/
        .tableone{
            width: 100%;
            /* align-content: center; */
            text-align: center;
            direction: ltr;
            font-family: 'STC Regular';
        }
        .tableone , .td, .th {
            border: 2px solid #595959;
            border-collapse: collapse;

        }
        .tableone ,.td, .th {
            padding: 10px;
            height: 25px;
        }
        .ta2 {
            border: solid 1px #FFF;
            width: 100%;
            /* align-content: center; */
            text-align: center;
            direction: ltr;
            font-family: 'STC Regular';
        }
        .ta2 {
            border: solid 1px #FFF;
            width: 100%;
            /* align-content: center; */
            text-align: center;
            direction: ltr;
            font-family: 'STC Regular';
        }

        .td2, .th {
            font-size: 2em;
            font-family: "STC Regular";
            border-collapse: collapse;

        }
        .td3 {
            font-size: 2em;
            font-family: "STC Regular";
            border-collapse: collapse;

        }
        .ta2 ,.td2, .th {
            padding: 10px;
            height: 25px;
        }
        .sercode{
            padding: 10px;
            background: #e39548;
            width: 100px ;
            -webkit-print-color-adjust: exact;

        }
/**************************************8/
 */
        @media print {
            .tableone{
                width: 100%;
                /* align-content: center; */
                text-align: center;
                direction: ltr;
                font-family: 'STC Regular';
            }
            .tableone , .td, .th {
                border: 2px solid #595959;
                border-collapse: collapse;

            }
            .tableone ,.td, .th {
                padding: 10px;
                height: 25px;
            }
            .ta2 {
                border: solid 1px #FFF;
                width: 100%;
                /* align-content: center; */
                text-align: center;
                direction: ltr;
                font-family: 'STC Regular';
            }
            .ta2 {
                border: solid 1px #FFF;
                width: 100%;
                /* align-content: center; */
                text-align: center;
                direction: ltr;
                font-family: 'STC Regular';
            }

            .td2, .th {
                font-size: 2em;
                font-family: "STC Regular";
                border-collapse: collapse;

            }
            .td3 {
                font-size: 2em;
                font-family: "STC Regular";
                border-collapse: collapse;

            }
            .ta2 ,.td2, .th {
                padding: 10px;
                height: 25px;
            }
            .sercode{
                padding: 10px;
                background: #e39548;
                width: 100px ;
                -webkit-print-color-adjust: exact !important;

            }
        }
    </style>
    <div class="col-md-12 no-print">
        <h3>ادارة القبول  <small>تفعيل الحسابات </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>  Mission Plan</a></li>

        </ol>
    </div>

    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <section class="invoice">
                <!-- title row -->
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">

                    </div>

                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col pull-right">

                    </div>

                </div>

                <!-- Table row -->
                <div class="col-xs-12">

                    <div class="">
                        <table class="tableone">
                            <tbody>
                            <tr>
                                <td class="td" colspan="12">
                                    <img src="{{ asset('img/headerpdf.jpg') }}"  class="stc pull-left" style="  width: 100%">
                                </td>
                            </tr>
                            <tr>
                                <td class="td" colspan="12"><strong>Activate The Account</strong></td>
                            </tr>
                            <tr style="background: #d3b5b5">
                                <td class="td" colspan="12">Client Info</td>
                            </tr>
                            <tr>
                                <td class="td" colspan="6" style="background: #ade1b8"><span>Submission of the application : <strong>{{ $Order->SOA }}</strong></span></td>
                                <td class="td" colspan="2" style="background: #ffe8e8"><span>Date of receipt of payment : <strong>{{ $Order->DRP }}</strong></span></td>
                                <td class="td" colspan="2" style="background: #ade1b8"><span>Bank : <strong>{{ $Order->Bank }}</strong></span></td>
                                <td class="td" colspan="2" style="background: #ffe8e8"><span>RQS : <strong>{{ $Order->RQS }}</strong></span></td>
                            </tr>
                            <tr>
                                <td class="td" style="background: #ffe8e8">#{{ $Order->Bennar }}</td>
                                <td class="td" colspan="3" style="background: #ffe8e8"><span>File code : <strong>{{ $Order->Bank }}</strong></span></td>
                                <td class="td" colspan="4" style="background: #ade1b8"><span>Name : <strong>{{ $Order->Name }}</strong></span></td>
                                <td class="td" colspan="2" style="background: #ffe8e8"><span>Country : <strong>{{ $Order->Country }}</strong></span></td>
                                <td class="td" style="background: #ade1b8"><span>City : <strong>{{ $Order->City }}</strong></span></td>
                                <td class="td" style="background: #ade1b8"><span>Port : <strong>{{ $Order->Port }}</strong></span></td>
                            </tr>
                            <tr>
                                <td class="td" colspan="4" style="background: #ade1b8"><span>Port : <strong>{{ $Order->Phone }}</strong></span></td>
                                <td class="td" colspan="3" style="background: #ade1b8"><span>Port : <strong>{{ $Order->Email }}</strong></span></td>
                                <td class="td" colspan="5" style="background: #ffe8e8"><span>Port : <strong>
                                        @foreach($Services as $item)
                                                {{ $item->ServiceCode }} -
                                            @endforeach
                                        </strong></span></td>
                            </tr>
                            <tr>
                                <td class="td" colspan="12"></td>
                            </tr>
                            <tr>
                                <td class="td" colspan="12"><strong>Project financial details</strong></td>
                            </tr>
                            <tr>
                                <td class="td" colspan="4">Package Price :</td>
                                <td class="td"  colspan="3">{{ number_format($Order2->total) }} </td>
                                <td class="td"  colspan="5">{{ \App\Helpers\Mysql::makeNumber2Text($Order2->total) }} </td>

                            </tr>
                            <tr>
                                <td class="td" colspan="4">Amount Paid :</td>
                                <td class="td"  colspan="3">{{ number_format($Order->SOA)  }} AED</td>
                                <td class="td"  colspan="5">{{ \App\Helpers\Mysql::makeNumber2Text($Order->SOA) }} </td>

                            </tr>
                            <tr>
                                <td class="td" colspan="4">Remaining amount :</td>
                                <td class="td"  colspan="3">{{ number_format($Order2->total - $Order->SOA) }}</td>
                                <td class="td"  colspan="5">{{ \App\Helpers\Mysql::makeNumber2Text($Order2->total - $Order->SOA) }} </td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="ta2">
                            <tbody>
                            {{--<tr>
                                <td class="td2" colspan="12">
                                    <img src="{{ asset('img/mhe.png') }}"  class="stc pull-left" style="  width: 100%">
                                </td>
                            </tr>--}}
                            <tr style="border: none">
                                <td class="td2" colspan="12"><strong>  {{ $Order->SOA }}  ملف شرح الخدمات المقدمة للمشروع  </strong></td>
                            </tr>
                            <tr style="direction: rtl">
                                <td class="td3" colspan="12" style="text-align: right">
                                    <strong>اسم العميل : {{ $Order->Name }}</strong>
                                </td>
                            </tr>
                            <tr style="direction: rtl;">
                                <td class="td3" colspan="12" style="text-align: right">
                                    <strong> الملف : {{ $Order->FileCode }}</strong>
                                </td>
                            </tr>

                            <tr style="direction: rtl;">
                                <td class="td3" colspan="12" style="text-align: right">
                                    <strong> المدينة : {{ $Order->City }}</strong>
                                </td>
                            </tr>
                            <tr style="direction: rtl;">
                                <td class="td3" colspan="12" style="text-align: right">
                                    <strong> تاريخ الاشتراك : {{ $Order->DRP }}</strong>
                                </td>
                            </tr>

                            <tr style="direction: rtl;">
                                <td class="td3" colspan="12" style="text-align: right">
                                    يقدم خيرعون الدعم الهندسي و التجاري للمشروع من تصميم المخططات من مرحلة الزيرو مع حساب كميات المواد الموردة من الصين و ضبط الاستاندرد مع توزيع دورات المياه السليم بالاضافة الي تصميم الارضيات و الديكور مع الاثاث وايضا مرحلة توريد المنتجات من الصين مع الحماية القانونية للعميل بالاضافة الي الزيارات الفنية لارض المشروع كما موضح بالتفصيل من ضمن مراحل الباقة .
                                </td>
                            </tr>
                            <tr>
                                <td class="td3" colspan="12"></td>
                            </tr>
                            @foreach($Services as $item)


                                <tr style="direction: rtl;">
                                    <td class="td2" colspan="12" style="text-align: right">
                                        <span class="sercode"> {{ $item->ServiceCode }}</span>
                                    </td>

                                </tr>

                                <tr style="direction: rtl;">
                                    <td class="td2" colspan="3" style="text-align: right;width:20%;">
                                        <strong style="font-size: 0.7em">المدة الزمنية</strong>
                                        <p style="font-size: 0.7em"> ما بين 18-21 يوم عمل </p>
                                    </td>
                                    <td class="td2" colspan="9" style="text-align: right;width: 100%">
                                        <strong style="font-size: 0.7em"> شرح الخدمة</strong>
                                        <div style="font-size: 0.7em">{!! $item->ServiceDetails !!}</div>
                                    </td>


                                </tr>
                            @endforeach




                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12" id="">
                        <br>
                        <a href="#" onclick="print();"  class="btn btn-default"><i class="fa fa-print"></i> طباعة</a>

                    </div>
                </div>
            </section>

        </div>
        <!-- /.col -->
    </div>
    @endsection