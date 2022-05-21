<?php

namespace App\Http\Controllers;

use App\Models\ActivateFile;
use App\Models\DesignRequired;
use App\Models\jobTitle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientjoinController extends Controller
{
    public function CheckUp(Request $request){
        //dd($request->all());

        $client = ActivateFile::where('FileCode',$request->SNO)->first();

        if (!isset($client)){

            session()->flash('Flash', 'رقم الملف المدخل غير صحيح ... حاول مرة أخري');
            return redirect()->back();
        }elseif($client->Status=='UNApproval'){
            session()->flash('Flash', 'ملفك لم يتم تفعيله بعد ... تواصل مع الإدارة');
            return redirect()->back();
        }elseif(isset($client) && $client->Status=='Approved' || $client->Status=='Approved'){

            session()->put('SOA',$client->SOA);
            session()->put('Nameclient',$client->Name);
            session()->put('DRP',$client->DRP);
            session()->put('Bank',$client->Bank);
            session()->put('RQS',$client->RQS);
            session()->put('Bennar',$client->Bennar);
            session()->put('FileCode',$client->FileCode);
            session()->put('Country',$client->Country);
            session()->put('City',$client->City);
            session()->put('Port',$client->Port);
            session()->put('Email',$client->Email);
            session()->put('Phone',$client->Phone);
            //return redirect('ClientEnd');
            return redirect('ClientRegister');

        }else{
            session()->flash('Flash', 'خطأ !!! حاول مرة أخري');
            return redirect()->back();
        }


    }

    public function ClientEnd(Request $request)
    {
        $SOA = session()->get('SOA');
        $Nameclient = session()->get('Nameclient');
        $DRP = session()->get('DRP');
        $Bank = session()->get('Bank');
        $RQS = session()->get('RQS');
        $Bennar = session()->get('Bennar');
        $FileCode = session()->get('FileCode');
        $Country = session()->get('Country');
        $City = session()->get('City');
        $Email = session()->get('Email');
        $Data = User::join('activate_files','activate_files.Bennar','=','users.File_code')->where('users.File_code',auth()->user()->File_code)->first();
        return view('ClientDashboard.index',compact('Data'));
        /*if(isset($SOA) && isset($Nameclient) && isset($DRP) && isset($Bank) && isset($RQS) && isset($Bennar) && isset($FileCode) && isset($Country) && isset($City) && isset($Email)){

        }else{
            return redirect('client_join');
        }*/

    }

    public function ClientListFiles($code,$benaar)
    {

        $Single = \App\Models\Documents::where('projectID',$benaar)
            ->where('mission',$code)
            ->get();
        $na = \App\Models\ProjectServices::where('Bennar_Code',$benaar)->where('ServiceCode',$code)->first();
        return view('ClientDashboard.ClientListFiles',compact('Single','benaar','na','code'));


    }

    public function RejectFile(Request $request)
    {
        $myrqs = DB::table('documents')
            ->where('id',$request->f_id)->first();
        $count = $myrqs->reject_count +1;

        $myrqs2 = DB::table('documents')
            ->where('id',$request->f_id)
            ->update([
                'reject_accept' => '1',
                'reject_count' => $count,
                'reject_reason' => $request->reason
            ]);

        if ($myrqs2){
            session()->flash('Flash', 'تم رفض الملف وارسال تعليقك عليه');
            return redirect()->back();
        }else{
            session()->flash('Flash', 'يوجد خطأ .. ارجو المحاولة مرة اخرى');
            return redirect()->back();
        }


    }


    public function DkoVillaReq(Request $request)
    {
        //dd($request->all());
        $poolServies = '';
        $basementRequirements = '';
        $proHospitality = '';
        $livingSection = '';
        $proKitchens = '';
        $firstFloorUtilities = '';
        $secondFloorUtilities = '';
        $roofComponents = '';

        if (isset($request->poolServies)){
            foreach ($request->poolServies as $item){
                $poolServies .= $item.' - ';
            }
        }

        if (isset($request->basementRequirements)){
            foreach ($request->basementRequirements as $item1){
                $basementRequirements .= $item1.' - ';
            }
        }


        if (isset($request->proHospitality)){
            foreach ($request->proHospitality as $item2){
                $proHospitality .= $item2.' - ';
            }
        }


        if (isset($request->livingSection)){
            foreach ($request->livingSection as $item3){
                $livingSection .= $item3.' - ';
            }
        }


        if (isset($request->proKitchens)){
            foreach ($request->proKitchens as $item4){
                $proKitchens .= $item4.' - ';
            }
        }


        if (isset($request->firstFloorUtilities)){
            foreach ($request->firstFloorUtilities as $item5){
                $firstFloorUtilities .= $item5.' - ';
            }
        }


        if (isset($request->secondFloorUtilities)){
            foreach ($request->secondFloorUtilities as $item6){
                $secondFloorUtilities .= $item6.' - ';
            }
        }

        if (isset($request->roofComponents)){
            foreach ($request->roofComponents as $item7){
                $roofComponents .= $item7.' - ';
            }
        }

        //echo $vv;
        $input = $request->except('_token','finish');
        $input['poolServies'] = $poolServies;
        $input['basementRequirements'] = $basementRequirements;
        $input['proHospitality'] = $proHospitality;
        $input['livingSection'] = $livingSection;
        $input['proKitchens'] = $proKitchens;
        $input['firstFloorUtilities'] = $firstFloorUtilities;
        $input['secondFloorUtilities'] = $secondFloorUtilities;
        $input['roofComponents'] = $roofComponents;


        $ex = DesignRequired::where('fileNumber',$request->fileNumber)->first();
        if (isset($ex)){
            session()->flash('message', 'سبق لك ان ارسلت استفسارات التصميم لهذا المشروع');
            return redirect()->back();
        }else{
            DesignRequired::create($input);
            session()->flash('Flash', 'تم ارسال البيانات بنجاح');
            return redirect()->back();
        }


    }


    public function ESPM(Request $request)
    {
        return view('wizard');
    }
}
