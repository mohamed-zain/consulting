<?php

namespace App\Http\Controllers;

use App\Models\ArchiveProjects;
use App\Models\Documents;
use App\Models\FrozenProjects;
use App\Models\Message;
use App\Models\ActivateFile;
use App\Models\Orders;
use App\Models\packages;
use App\Models\PackageServices;
use App\Models\ProjectServices;
use App\Models\ProjectStages;
use App\Models\Tasks;
use App\Models\TasksFile;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\BennarStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectsCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
            $this->middleware('auth');
        $this->middleware('Sheared');

    }
    public function index()
    {
        $Data =  ActivateFile::join('orders','orders.number','=','activate_files.Bennar')
            ->orderBy('orders.id','DESC')
            ->where('activate_files.Status','Approved')
            ->get();

    return view('projects/index2',compact('Data'));
    }


    public function ProjectsSummary()
    {
        $count1 = 0;
        $count2 = 0;
        $under = 0;
        $notBeg = 0;
        $waiting = 0;
        $pro_aproveCount = \App\Models\ActivateFile::where('Status','Approved')->count();
        $pro_ = \App\Models\ActivateFile::where('Status','Approved')->get();

        foreach ($pro_ as $value){
            $sub = 0;
            $sub2 = 0;
            $ps0 = \App\Models\ProjectServices::where('Bennar_Code',$value->Bennar)
                ->where('ServiceCode','E0')
                ->where('status','yes')
                ->first();
            $ps1 = \App\Models\ProjectServices::where('Bennar_Code',$value->Bennar)
                ->where('ServiceCode','E1')
                ->where('status','yes')
                ->first();
            $ps2 = \App\Models\ProjectServices::where('Bennar_Code',$value->Bennar)
                ->where('ServiceCode','E2')
                ->where('status','yes')
                ->first();
            $ps3 = \App\Models\ProjectServices::where('Bennar_Code',$value->Bennar)
                ->where('ServiceCode','E3')
                ->where('status','yes')
                ->first();
            $ps4 = \App\Models\ProjectServices::where('Bennar_Code',$value->Bennar)
                ->where('ServiceCode','E4')
                ->where('status','yes')
                ->first();
            if (isset($ps0) && isset($ps1) && isset($ps2) && isset($ps3) && isset($ps4)){
                $count1 ++;
            }

            if (isset($ps0)){
                $count2 ++;
            }

            $sr = \App\Models\ProjectServices::where('Bennar_Code',$value->Bennar)->get();
            $pt = Tasks::where('Bennar_Code',$value->Bennar)->first();
            $wt = Documents::where('projectID',$value->Bennar)->where('reject_accept',0)->where('cat',1)->where('mission','E0')->first();
            $wt2 = Documents::where('projectID',$value->Bennar)->where('reject_accept',1)->where('cat',1)->where('mission','E0')->first();

            if (isset($wt) ){
                if (!isset($wt2)){
                    $waiting++;
                }

            }

            if (!isset($pt)){
                $notBeg++;
            }
            foreach ($sr as $item){

                if ($item->status == 'yes'){
                    $sub++;
                }
                if ($item->status == 'yes'){
                    $sub2++;
                }

            }

            if ($sub2 >= 1 && $sub2 < 5){
                $under++;
            }


        }
        $stats =  ActivateFile::join('orders','orders.number','=','activate_files.Bennar')
            ->orderBy('orders.id','DESC')
            ->where('activate_files.Status','Approved')
            ->get();

    return view('projects/summary',compact('stats','pro_aproveCount','count1','count2','under','notBeg','waiting'));
    }

    public function ArchivePro (Request $request){
        $pro = ActivateFile::findOrFail($request->id);
        //dd($pro);
        // replicate (duplicate) the data
        $arch = $pro->replicate();

        // make into array for mass assign.
        //make sure you activate $guarded in your Staff model
        $newArch = $arch->toArray();

        ArchiveProjects::firstOrCreate($newArch);
        $pro->delete();
        session()->flash('Flash', 'تم ارشفة المشروع بنجاح');
        return redirect()->back();

    }

    public function FrozePro (Request $request){
        $pro = ActivateFile::findOrFail($request->id);
        //dd($pro);
        // replicate (duplicate) the data
        $arch = $pro->replicate();

        // make into array for mass assign.
        //make sure you activate $guarded in your Staff model
        $newArch = $arch->toArray();

        FrozenProjects::firstOrCreate($newArch);
        $pro->delete();
        session()->flash('Flash', 'تم تجميد المشروع بنجاح');
        return redirect()->back();

    }
    public function WaitingProjects()
    {
        $Data =  ActivateFile::join('orders','orders.number','=','activate_files.Bennar')
            //->leftJoin('tasks','tasks.Bennar_Code','=','activate_files.Bennar')
               // ->select('activate_files.*','orders.*',DB::raw('activate_files.'))
            ->where('activate_files.EngID',null)
            ->where('activate_files.Status','Approved')
            ->Orwhere('activate_files.EngID','')
            ->select('orders.*','activate_files.*',DB::raw('activate_files.id as AID'))
            ->orderBy('activate_files.created_at','DESC')
            ->get();

    return view('projects/WaitingProjects',compact('Data'));
    }

    public function ArchiveProjects()
    {
        $Data =  ArchiveProjects::join('orders','orders.number','=','archive_files.Bennar')
            //->leftJoin('tasks','tasks.Bennar_Code','=','activate_files.Bennar')
               // ->select('activate_files.*','orders.*',DB::raw('activate_files.'))
            ->where('archive_files.EngID',null)
            ->where('archive_files.Status','Approved')
            ->Orwhere('archive_files.EngID','')
            ->orderBy('archive_files.created_at','DESC')
            ->get();

            return view('projects/ArchiveProjects',compact('Data'));
    }

    public function FrozenProjects()
    {
        $Data =  FrozenProjects::join('orders','orders.number','=','frozen_files.Bennar')
            //->leftJoin('tasks','tasks.Bennar_Code','=','activate_files.Bennar')
               // ->select('activate_files.*','orders.*',DB::raw('activate_files.'))
            ->where('frozen_files.EngID',null)
            ->where('frozen_files.Status','Approved')
            ->Orwhere('frozen_files.EngID','')
            ->orderBy('frozen_files.created_at','DESC')
            ->get();

            return view('projects/FrozenProjects',compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    public function ProProduction($id)
    {
        //dd($id);
        $Single = ActivateFile::join('orders','orders.number','=','activate_files.Bennar')
            ->where('orders.number','=',$id)
            ->first();
        $files = TasksFile::where('B_Code','=',$id)->get();
        $Data = Projects::where('ProID', $id)->first();


        $Order = ActivateFile::where('Bennar',$id)->first();
        $Order2 = Orders::where('number',$id)->first();
        $PID = packages::where('packageName',$Order2->name)->first();
        $Services = PackageServices::join('services','services.id','=','p_services.SID')->where('p_services.PID',$PID->id)->get();
        $messages = Message::where('user_id', auth()->id())->where('bennar_id', $id)->orderBy('id', 'DESC')->get();

        return  view('projects/ProProduction', compact('Data','Single','files','Order2','Order','Services','id','messages'));
    }

    public function ProServices(Request $request)
    {
        //dd($id);
        $Data = ProjectServices::where('Bennar_Code', $request->id)->get();
        //return redirect('ProServices');
       return  view('projects/project_services', compact('Data'));
    }

    public function PStages(Request $request)
    {
        //dd($id);
        $Data = ActivateFile::where('Bennar', $request->PStages)->first();
        return redirect('ProProduction/'.$request->PStages);
       // return  view('projects/ProProduction', compact('Data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        //dd($request->all());

        $input = $request->except('_token');
        $che = Orders::where('number',$request->number)->first();
        //$input['RecValue'] = $request->Price;
        if (isset($che)){
            session()->flash('Flash', 'المشروع موجود في النظام');
            return redirect()->back();
        }else{
            $input['address_2'] = $request->address_1;
            $input['status'] = "completed";
            $input['currency'] = "AED";
            $input['is_vat_exempt'] = "1";
            $input['_billing_myfield12'] = "مرحلة بناء الهيكل الإنشائي فقط";
            $input['payment_method_title'] = "حوالة بنكية";
            $input['cart_tax'] = "0.00";

            $input2['bennar_number'] = $request->number;
            $input2['bennar_status'] = 6;
            $input2['client_type'] = 'عميل خير عون';
            $input2['notes'] = 'لا توجد ملاحظات';
            BennarStatus::create($input2);
            Orders::create($input);
            session()->flash('Flash', 'تم حفظ بيانات المشروع بنجاح');

            return redirect()->back();
        }



}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Data = Projects::findOrFail($id);
        return  view('projects/show', compact('Data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $Data = Projects::findOrFail($id);
       return  view('projects.show', compact('Data'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $dddd = $request->all();
         $cont = Projects::where('ProID', $id)->first();
        $cont->update($dddd);
        \Session::flash('Flash', 'تمت عملية تعديل بيانات المشروع بنجاح');
        return redirect('Projects');
    }

    public function editProSer(Request $request)
    {
        //dd($request->all());
         $dddd = $request->except('_token');
         $cont = ProjectServices::find($request->id)->update($dddd);

        \Session::flash('Flash', 'تمت عملية تعديل بيانات الخدمة بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteProSer($id)
    {
        //dd($id);
        // ProjectServices::find($id)->delete();
         return "تم حذف السجل بنجاح";
    }

    public function destroy($id)
    {
         $del = Projects::where('ProID','=',$id);
         $del->delete();
         return "تم حذف السجل بنجاح";
    }
}
