<?php

namespace App\Http\Controllers;

use App\Helpers\Notify;
use App\Models\DocsType;
use App\Models\Documents;
use App\Models\Files;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DocumentsCon extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }


    public function index()
    {
        $Data = Documents::Owne()->get();
        return view('documents.index',compact('Data'));
    }

    public function OfficeDocs()
    {
        //$Data = Documents::all();
        $Docs = Projects::Owne()->take(8)->get();
        $activeFi = Projects::Owne()->get();
        return view('documents.index',compact('Docs','activeFi'));
    }

    public function DocsByPro(Request $request)
    {
        //dd($request->all());
        $fn = Projects::Owne()->where('Bennar',$request->search_text)->first();
        $Data2 = Documents::Owne()->where('Bennar','=',$request->search_text)->orderBy('created_at','ASC')->get();
        $Docs = Projects::Owne()->take(8)->get();
        $activeFi = Projects::Owne()->get();
        return view('documents.DocsByPro',compact('Data2','fn','Docs','activeFi'));
    }


    public function RefreshTempFiles(Request $request)
    {
        DB::table('temp_files')->where('usr_id',auth()->user()->Office_code)->delete();
        return 'done Refreshing';
    }


    public function uploadeTemp(Request $request)
    {
        $this->validate($request, [
            'Docs' => 'required|mimes:jpg,jpeg,pdf,dwg,rvt,DWG',
        ],
            $messsages = array(
                'Docs.mimes'=>'خطأ في صيغة الملف'

            )
        );
        if($request->hasFile('Docs')) {

            $tms = date('Y-m-d');
            $ran = mt_rand(10000, 99999);
            $file = $request->file('Docs');
            $filename = uniqid().'_'.$tms.'.'.$file->getClientOriginalExtension();
            $file->storeAs('docs/',$ran.'_'.$filename);
            DB::table('temp_files')->insert([
                'usr_id' => auth()->user()->Office_code,
                'FileName' => 'docs/'.$ran.'_'.$filename
            ]);
            return $filename;
        }

        return '';

    }



    public function store(Request $request)

    {

        $ran = mt_rand(10000, 99999);
        $DN = DocsType::where('id',$request->DocName)->first();
        //dd($request->all());
//dd($request->all());
        $path = DB::table('temp_files')->where('usr_id',auth()->user()->Office_code)->first();
        $input = $request->except('_token');
        $input['Office_code'] = auth()->user()->Office_code;
        $input['Docdetails'] = $request->Docdetails;
        $input['Docs'] = $path->FileName;
        $input['DocName'] = $DN->DocTypeName;
        $input['DocType'] = $request->DocName;
        $up = Documents::create($input);
        if (isset($up)){
            $DT = DocsType::where('id',$request->DocName)->first();
            Projects::where('Bennar',$request->Bennar)->update([
                'Status' => $DT->FileStage
            ]);
        }

        DB::table('temp_files')->where('usr_id',auth()->user()->Office_code)->where('FileName',$path->FileName)->delete();

        /*if($up && auth()->user()->email != 'support@ko-design.ae'){
            $user = \App\Models\Projects::where('Bennar',$request->projectID)->first();
            // $recipient = 'e@ko-design.ae';//$user->Email;
            $recipient = $user->Email;
            $input['ClientName'] = $user->Name;
            //Mail::to($user)->cc($cc)->send(new \App\Mail\SendFiles($input));
            Mail::to($recipient)->later(now()->addMinutes(2), new \App\Mail\SendFiles($input));
        }*/
        //\Session::flash('Flash', 'تم اضافة المستند بنجاح');
        $proCode = Projects::where('Bennar',$request->Bennar)->first();
        $msg = ' قام المكتب  '.auth()->user()->name.' برفع ملف جديد ';
        //Notify::notiUser($DN->DocTypeName,$msg,$proCode->FileCode);
        session()->flash('Flash', 'تم اضافة المستند بنجاح');
        return "تم رفع الملف بنجاح";

    }

    public function destroy($id)
    {
        $del = Documents::find($id);
        $del->delete();
        $msg = ' قام المكتب   '.auth()->user()->name.' بحذف ملف من النظام ';
        \App\Helpers\Notify::notiUser('',$msg,'');
        return "تم حذف السجل بنجاح";
    }




}
