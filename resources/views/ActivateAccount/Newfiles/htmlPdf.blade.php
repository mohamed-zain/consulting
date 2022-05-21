<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
</head>
<body>
<div class="">
    <table class="tableone" style="font-size: 10px;">
        <tbody>
        <tr>
            <td class="td" colspan="12">
                <img src="{{ asset('re22.png') }}"  class="stc pull-left" style="  width: 90%;height: 80px">
                <img src="{{ asset('kof.png') }}"  class="stc pull-left" style="  width: 90%;height: 80px">
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
        {{--<tr>
            <td class="td" colspan="4"><b>RQ Number :</b></td>
            <td class="td"  colspan="8">{{ $Order->RQS }} </td>
        </tr>--}}
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
            <td class="td"  colspan="8">{{ number_format($Order->SOA)  }} {{$Order2->currency}}</td>
{{--            <td class="td"  colspan="5">{{ \App\Helpers\Mysql::makeNumber2Text($Order->SOA) }} </td>--}}

        </tr>
       {{-- <tr>
            <td class="td" colspan="4">Remaining amount :</td>
            <td class="td"  colspan="3">{{ number_format($Order2->total - $Order->SOA) }}</td>
            <td class="td"  colspan="5">{{ \App\Helpers\Mysql::makeNumber2Text($Order2->total - $Order->SOA) }} </td>

        </tr>--}}
        <tr>
            <td class="td"  colspan="12"><strong>ملحوظة: </strong><span style="color: red">سوف يتم البدء في انتاج المخططات بعد 50 يوم من تاريخ تسديد قيمة الباقة</span></td>
        </tr>
        <tr>
            <td class="td"  colspan="12"><strong>ملحوظة: </strong><span style="color: red">مبلغ الباقة لا يشمل رسوم استخراج الرخص</span></td>
        </tr>


        </tbody>
    </table>


</div>
</body>
</html>