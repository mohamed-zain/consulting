<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsCon extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }
    public function index()
    {
        $Data =  Projects::Owne()->join('projects_status','projects_status.id','=','projects.Status')
            ->orderBy('projects.id','DESC')
            //->where('activate_files.Status','Approved')
            ->get();

        return view('projects/index2',compact('Data'));
    }

    public function ProjectDetails($id){
        LogActivity::addToLog('عرض تفاصيل مشروع.');
        $Single = Projects::Owne()->join('projects_status','projects_status.id','=','projects.Status')
            ->where('projects.Bennar',$id)
            ->first();
        //$files = TasksFile::where('B_Code','=',$id)->get();
        return view('projects/ProProduction',compact('Single','id'));
    }


    public function UpdateStage(Request $request){
        LogActivity::addToLog('تحديث مرحلة  المشروع.');

        DB::table('projects')
            ->where('Bennar', $request->Bennar)
            ->update([
                'Status' => $request->Stage
            ]);
        session()->flash('Flash', 'تم حفظ المرحلة بنجاح');
        return redirect()->back();
    }

    public function UpdateStat(Request $request){
        LogActivity::addToLog('تحديث حالة  المشروع.');

        DB::table('projects')
            ->where('Bennar', $request->Bennar)
            ->update([
                'stat' => $request->stat
            ]);
        session()->flash('Flash', 'تم حفظ الحالة بنجاح');
        return redirect()->back();
    }


    public function PStages(Request $request)
    {
        //dd($id);
        $Data = Projects::where('Bennar', $request->PStages)->first();
        return redirect('ProjectDetails/'.$request->PStages);
        // return  view('projects/ProProduction', compact('Data'));
    }
}
