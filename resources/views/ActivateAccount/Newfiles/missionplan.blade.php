<?php
if (Auth::user()->Level == 1){
    $ex = 'index';
}elseif(Auth::user()->email == 'support@ko-design.ae'){
    $ex = 'EMP.layout' ;
}else{
    $access = DB::table('user_groups')
        ->where('UID',auth()->user()->id)
        ->where('Sys','EngineeringManagement')
        ->first();
    $access2 = DB::table('user_groups')
        ->where('UID',auth()->user()->id)
        ->where('Sys','ActivateAccounts')
        ->first();
    //$arr = $access->toArray();
    //dd($access);
    if ($access->accessH == 1){
        $ex = 'ProjectsManager.layout' ;
    }elseif($access2->accessH == 1){
        $ex = 'ActivateAccount.layout' ;
    }else{
        $ex = '';
    }

}
?>

@extends($ex)
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
            padding: 5px;
            height: 15px;
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
                                    <img src="{{ asset('img/koheader.png') }}"  class="stc pull-left" style="  width: 100%">
                                </td>
                            </tr>
                            <tr>
                                <td class="td" colspan="12"><strong>Activate The Account</strong></td>
                            </tr>
                            <tr style="background: #d3b5b5">
                                <td class="td" colspan="12">Client Info</td>
                            </tr>
                            <tr>
                                <td class="td" colspan="6" style="background: #ade1b8"><span>Amount Paid : <strong>{{ $Order->SOA }}</strong></span></td>
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
                                <td class="td" colspan="4" style="background: #ade1b8"><span>Phone : <strong>{{ $Order->Phone }}</strong></span></td>
                                <td class="td" colspan="3" style="background: #ade1b8"><span>Email : <strong>{{ $Order->Email }}</strong></span></td>
                                <td class="td" colspan="5" style="background: #ffe8e8"><span>Services : <strong>
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
                                <td class="td"  colspan="3">{{ number_format($Order->SOA)  }} {{$Order2->currency}}</td>
                                <td class="td"  colspan="5">{{ \App\Helpers\Mysql::makeNumber2Text($Order->SOA) }} </td>

                            </tr>
                            <tr>
                                <td class="td" colspan="4">Remaining amount :</td>
                                <td class="td"  colspan="3">{{ number_format($Order2->total - $Order->SOA) }}</td>
                                <td class="td"  colspan="5">{{ \App\Helpers\Mysql::makeNumber2Text($Order2->total - $Order->SOA) }} </td>

                            </tr>



                            </tbody>
                        </table>


                    </div>
                </div>

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12" id="">
                        <br>
                        <br>
                        <div class="col-xs-2">
                            <a href="#" onclick="print();"  class="btn btn-default"><i class="fa fa-print"></i> طباعة</a>
                        </div>
                        <div class="col-xs-2">
                            <a href="{{ url('EditActivation') }}/{{ $Order->Bennar }}"   class="btn btn-danger"><i class="fa fa-edit"></i> تعديل البيانات</a>
                        </div>
                        <div class="col-xs-2">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#Modal"><i class="fa fa-money"></i> عرض RQS </a>
                        </div>
                        <div class="col-xs-2">
                            <a href="{{ url('htmlPdf') }}/{{ $Order->Bennar }}" class="btn btn-info" ><i class="fa fa-money"></i> Download RQS </a>
                        </div>
                        <div class="col-xs-2">
                            <form action="{{ url('sendRQS') }}" method="POST">
                                @csrf
                                <input type="hidden" name="bennar" value="{{ $Order->Bennar }}">
                                <button type="submit" class="btn btn-warning">ارسال سند الاستلام للعميل</button>
                            </form>
                        </div>


                    </div>
                </div>
            </section>

        </div>
        <!-- /.col -->
    </div>

    <div class="modal fade" id="Modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">

                    <div class="col-xs-12">

                        <div class="">
                            <table class="tableone">
                                <tbody>
                                <tr>
                                    <td class="td" colspan="12">
                                        <img src="{{ asset('re22.png') }}"  class="stc pull" style="  width: 90%;height: 80px">
                                        <img src="{{ asset('kof.png') }}"  class="stc pull-" style="  width: 90%;height: 80px">
                                    </td>
                                </tr>


                                <tr>
                                    <td class="td" colspan="4"><b>Beneficiary :</b></td>
                                    <td class="td"  colspan="8">Khayr Oawn.EST,LTD </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>Received Bank :</b></td>
                                    <td class="td"  colspan="8">{{$Order->Bank}} </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>Payment Methods :</b></td>
                                    <td class="td"  colspan="8">Purchasing a package of KO services - non-refundable </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>Order Number :</b></td>
                                    <td class="td"  colspan="8">#{{ $Order->Bennar }}</td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>KO-CODE :</b></td>
                                    <td class="td"  colspan="8">{{ $Order->FileCode }} </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>Date :</b></td>
                                    <td class="td"  colspan="8">{{ $Order->DRP }} </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="12"  style="background: #f7b708"><strong>Consignee</strong></td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>Name :</b></td>
                                    <td class="td"  colspan="8">{{ $Order->Name }} </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>E-mail :</b></td>
                                    <td class="td"  colspan="8">{{ $Order->Email }} </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>City :</b></td>
                                    <td class="td"  colspan="8">{{ $Order->City }} </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>Phone :</b></td>
                                    <td class="td"  colspan="8">{{ $Order->Phone }} </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="12"  style="background: #f7b708"><strong>Information</strong></td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>RQ Number :</b></td>
                                    <td class="td"  colspan="8">{{ $Order->RQS }} </td>
                                </tr>
                                {{--<tr>
                                    <td class="td" colspan="4"><b>Invoice No :</b></td>
                                    <td class="td"  colspan="8">{{ $Order->Phone }} </td>
                                </tr>--}}
                                <tr>
                                    <td class="td" colspan="4"><b>Active package Date :</b></td>
                                    <td class="td"  colspan="8">{{ $Order->DRP }} </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4"><b>Expire Date :</b></td>
                                    <td class="td"  colspan="8"> 24 Month from Activation </td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="6"  style="background: #f7b708"><strong>Description</strong></td>
                                    <td class="td" colspan="6"  style="background: #f7b708"><strong>Amount</strong></td>
                                </tr>
                                <tr>
                                    <td class="td" colspan="4">Amount Paid :</td>
                                    <td class="td"  colspan="3">{{ number_format($Order->SOA)  }} {{$Order2->currency}}</td>
                                    <td class="td"  colspan="5">{{ \App\Helpers\Mysql::makeNumber2Text($Order->SOA) }} </td>

                                </tr>
                                <tr>
                                    <td class="td" colspan="4">Remaining amount :</td>
                                    <td class="td"  colspan="3">{{ number_format($Order2->total - $Order->SOA) }}</td>
                                    <td class="td"  colspan="5">{{ \App\Helpers\Mysql::makeNumber2Text($Order2->total - $Order->SOA) }} </td>

                                </tr>
                                <tr>
                                    <td class="td"  colspan="12"><strong>ملحوظة: </strong><span style="color: red">سوف يتم البدء في انتاج المخططات بعد 50 يوم من تاريخ تسديد قيمة الباقة</span></td>
                                </tr>
                                <tr>
                                    <td class="td"  colspan="12"><strong>ملحوظة: </strong><span style="color: red">مبلغ الباقة لا يشمل رسوم استخراج الرخص</span></td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    @endsection
