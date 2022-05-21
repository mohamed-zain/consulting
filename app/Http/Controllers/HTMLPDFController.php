<?php

namespace App\Http\Controllers;

use App\Models\ActivateFile;
use App\Models\Orders;
use PDF;
use Illuminate\Http\Request;

class HTMLPDFController extends Controller
{
    public function htmlPdf($bennar)
    {
        $Order = ActivateFile::where('Bennar',$bennar)->first();
        $Order2 = Orders::where('number',$bennar)->first();
        // selecting PDF view
        $pdf = PDF::loadView('ActivateAccount.Newfiles.htmlPdf',['Order'=>$Order,'Order2'=>$Order2]);
        $fileName = $bennar.'RQS';
        // download pdf file
        return $pdf->download('RQS.pdf');
    }
}
