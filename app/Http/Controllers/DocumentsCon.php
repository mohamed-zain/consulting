<?php

namespace App\Http\Controllers;

use App\Models\ActivateFile;
use App\Models\Orders;
use App\Models\ProjectServices;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Documents;
use App\Models\Projects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Vonage\Voice\Webhook\Input;

class DocumentsCon extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $Data = Documents::all();
        $Docs = ActivateFile::all();
         return view('documents.index',compact('Data','Docs'));
    }

    public function OfficeFiles()
        {
            //$Data = Documents::all();
            $Docs = ActivateFile::take(8)->get();
            $activeFi = ActivateFile::all();
            return view('SUPPORT.Files.index',compact('Docs','activeFi'));
        }

    public function getMission(Request $request)
    {
        //dd($request->all());
        $Data = ProjectServices::where('Bennar_Code',$request->bennar)->get();
        return view('SUPPORT.Files.gitmissions',compact('Data'));
    }
    public function DocsByPro(Request $request)
    {
        //dd($request->all());
        $fn = ActivateFile::where('Bennar',$request->search_text)->first();
        $Data2 = Documents::where('projectID','=',$request->search_text)->orderBy('created_at','ASC')->get();
        $Docs = ActivateFile::take(8)->get();
        $activeFi = ActivateFile::all();
        return view('SUPPORT.Files.DocsByPro',compact('Data2','fn','Docs','activeFi'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadeTemp(Request $request)
    {
       $this->validate($request, [
            //'Docs' => 'required|mimes:jpg,jpeg,pdf,dwg,rvt,DWG',
        ],
            $messsages = array(
                //'Docs.mimes'=>'خطأ في صيغة الملف',

            )
        );
            if($request->hasFile('Docs')) {
                $tms = date('Y-m-d');
                $ran = mt_rand(10000, 99999);
                $file = $request->file('Docs');
                $filename = uniqid().'_'.$tms.'.'.$file->getClientOriginalExtension();
                $file->storeAs('docs/',$ran.'_'.$filename);
                DB::table('temp_files')->insert([
                    'usr_id' => auth()->user()->id,
                    'FileName' => 'docs/'.$ran.'_'.$filename
                ]);
                return $filename;
            }

        return '';

    }

        public function store(Request $request)

    {

            $ran = mt_rand(10000, 99999);
        //dd($request->all());
//dd($request->all());
            $path = DB::table('temp_files')->where('usr_id',auth()->user()->id)->first();
            $input = $request->except('_token');
            $input['DocID'] = $ran;
            $input['Usr_id'] = auth()->user()->id;
            $input['Docdetails'] = $request->Docdetails;
            $input['Docs'] = $path->FileName;
            $up = Documents::create($input);

            DB::table('temp_files')->where('usr_id',auth()->user()->id)->where('FileName',$path->FileName)->delete();

                if($up && auth()->user()->email != 'support@ko-design.ae'){
                    $user = \App\Models\ActivateFile::where('Bennar',$request->projectID)->first();
                   // $recipient = 'e@ko-design.ae';//$user->Email;
                    $recipient = $user->Email;
                    $input['ClientName'] = $user->Name;
                    //Mail::to($user)->cc($cc)->send(new \App\Mail\SendFiles($input));
                    Mail::to($recipient)->later(now()->addMinutes(2), new \App\Mail\SendFiles($input));
                }
            //\Session::flash('Flash', 'تم اضافة المستند بنجاح');
            $proCode = ActivateFile::where('Bennar',$request->projectID)->first();
                $msg = ' قام المهندس  '.auth()->user()->name.' برفع ملف جديد ';
            \App\Helpers\Notify::notiUser($request->mission,$msg,$proCode->FileCode);
            \Session::flash('Flash', 'تم اضافة المستند بنجاح');
        return "تم رفع الملف بنجاح";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function DocPerForEng_acc(Request $request)
    {


            //dd($request->all());
            DB::table('documents')
                ->where('id', $request->DocID)
                ->update(['for_eng' => '1']);
            \Session::flash('Flash', 'تم تعديل صلاحية الملف');
        $msg = ' قام المهندس  '.auth()->user()->name.' بتعديل صلاحية المهندس لعرض الملف ';
        \App\Helpers\Notify::notiUser('',$msg,'');
            return 'تم تعديل صلاحية الملف';


    }
    public function DocPerForClient_acc(Request $request)
    {


        //dd($request->all());
        DB::table('documents')
            ->where('id', $request->DocID)
            ->update(['for_client' => '0']);
        \Session::flash('Flash', 'تم تعديل صلاحية الملف');
        $msg = ' قام المهندس  '.auth()->user()->name.' بتعديل صلاحية المهندس لعرض الملف ';
        \App\Helpers\Notify::notiUser('',$msg,'');
        return 'تم تعديل صلاحية الملف';


    }
    public function DocPerForClient_den(Request $request)
    {


            //dd($request->all());
            DB::table('documents')
                ->where('id', $request->DocID)
                ->update(['for_client' => '1']);
            \Session::flash('Flash', 'تم تعديل صلاحية الملف');
        $msg = ' قام المهندس  '.auth()->user()->name.' بتعديل صلاحية المهندس لعرض الملف ';
        \App\Helpers\Notify::notiUser('',$msg,'');
            return 'تم تعديل صلاحية الملف';


    }

    public function DocPerForEng_den(Request $request)
    {


            //dd($request->all());
            DB::table('documents')
                ->where('id', $request->DocID)
                ->update(['for_eng' => '0']);
            \Session::flash('Flash', 'تم تعديل صلاحية الملف');
        $msg = ' قام المهندس  '.auth()->user()->name.' بتعديل صلاحية المهندس لعرض الملف ';
        \App\Helpers\Notify::notiUser('',$msg,'');
            return redirect()->back();


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Documents::find($id);
         $del->delete();
        $msg = ' قام المهندس  '.auth()->user()->name.' بحذف ملف من النظام ';
        \App\Helpers\Notify::notiUser('',$msg,'');
         return "تم حذف السجل بنجاح";
    }
}
