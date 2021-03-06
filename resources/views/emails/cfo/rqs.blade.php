
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
        padding: 5px;
        height: 15px;
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

<div class="col-xs-12">

    <div class="">
        <table class="tableone">
            <tbody>
            <tr>
                <td class="td" colspan="12">
                    <img src="{{ asset('re22.png') }}"  class="stc pull-left" style="  width: 100%">
                    <img src="{{ asset('kof.png') }}"  class="stc pull-left" style="  width: 100%">
                </td>
            </tr>


            <tr>
                <td class="td" colspan="4"><b>Beneficiary :</b></td>
                <td class="td"  colspan="8">Khayr Oawn.EST,LTD </td>
            </tr>
            <tr>
                <td class="td" colspan="4"><b>Received Bank :</b></td>
                <td class="td"  colspan="8">{{$Bank}} </td>
            </tr>
            <tr>
                <td class="td" colspan="4"><b>Payment Methods :</b></td>
                <td class="td"  colspan="8">Purchasing a package of KO services - non-refundable </td>
            </tr>
            <tr>
                <td class="td" colspan="4"><b>Order Number :</b></td>
                <td class="td"  colspan="8">#{{ $Bennar }}</td>
            </tr>
            <tr>
                <td class="td" colspan="4"><b>KO-CODE :</b></td>
                <td class="td"  colspan="8">{{ $FileCode }} </td>
            </tr>
            <tr>
                <td class="td" colspan="4"><b>Date :</b></td>
                <td class="td"  colspan="8">{{ $DRP }} </td>
            </tr>
            <tr>
                <td class="td" colspan="12"  style="background: #f7b708"><strong>Consignee</strong></td>
            </tr>
            <tr>
                <td class="td" colspan="4"><b>Name :</b></td>
                <td class="td"  colspan="8">{{ $Name }} </td>
            </tr>
            <tr>
                <td class="td" colspan="4"><b>E-mail :</b></td>
                <td class="td"  colspan="8">{{ $Email }} </td>
            </tr>
            <tr>
                <td class="td" colspan="4"><b>City :</b></td>
                <td class="td"  colspan="8">{{ $City }} </td>
            </tr>
            <tr>
                <td class="td" colspan="4"><b>Phone :</b></td>
                <td class="td"  colspan="8">{{ $Phone }} </td>
            </tr>
            <tr>
                <td class="td" colspan="12"  style="background: #f7b708"><strong>Information</strong></td>
            </tr>
            <tr>
                <td class="td" colspan="4"><b>RQ Number :</b></td>
                <td class="td"  colspan="8">{{ $RQS }} </td>
            </tr>
            {{--<tr>
                <td class="td" colspan="4"><b>Invoice No :</b></td>
                <td class="td"  colspan="8">{{ $Order->Bennar }} </td>
            </tr>--}}
            <tr>
                <td class="td" colspan="4"><b>Active package Date :</b></td>
                <td class="td"  colspan="8">{{ $DRP }} </td>
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
                <td class="td"  colspan="4">{{ number_format($SOA)  }} {{$currency}}</td>
                <td class="td"  colspan="5">{{ \App\Helpers\Mysql::makeNumber2Text($SOA) }} </td>
            </tr>
            <tr>
                <td class="td"  colspan="12"><strong>????????????: </strong><span style="color: red">?????? ?????? ?????????? ???? ?????????? ???????????????? ?????? 50 ?????? ???? ?????????? ?????????? ???????? ????????????</span></td>
            </tr>
            <tr>
                <td class="td"  colspan="12"><strong>????????????: </strong><span style="color: red">???????? ???????????? ???? ???????? ???????? ?????????????? ??????????</span></td>
            </tr>
            </tbody>
        </table>


    </div>
</div>