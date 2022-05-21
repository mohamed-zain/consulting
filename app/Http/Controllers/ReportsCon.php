<?php

namespace App\Http\Controllers;

use App\Models\ActivateFile;
use App\Models\ProjectServices;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ReportsCon extends Controller
{
    public function ProjectsReports (){
        return view('ProjectsManager.reports.ProjectsReports');
    }

    public function TasksReports (){
        return view('ProjectsManager.reports.TasksReports');
    }

    public function EngReports (){
        return view('ProjectsManager.reports.EngReports');
    }

    public function ByTask (Request $request){
        //dd($request->all());
        $entry1 = $request->TaskType;
        $entry2 = $request->DFrom;
        $entry3 = $request->DTo;
        $entry4 = $request->EngId;
        if ($entry1 == 'yes' || $entry1 == 'no'){
            $Data = Tasks::where('TaskDone',$entry1)->whereBetween('tasks.created_at',[$entry2,$entry3])
                ->join('users','users.id','=','tasks.EmpID')
                ->where('users.id',$entry4)
                ->join('activate_files','activate_files.Bennar','=','tasks.Bennar_Code')
                ->select('tasks.*','users.*','activate_files.*', DB::raw('tasks.created_at as TCA'))
                ->get();
            return view('ProjectsManager.reports.index',compact('Data','entry1','entry2','entry3'));
        }elseif($entry1 == 'sh'){
            //dd($request->all());
            $Data = DB::table('Schedule_tasks')->whereBetween('Schedule_tasks.assign_date',[$entry2,$entry3])
                ->join('users','users.id','=','Schedule_tasks.EmpID')
                ->where('users.id',$entry4)
                ->join('activate_files','activate_files.Bennar','=','Schedule_tasks.Bennar_Code')
                ->select('Schedule_tasks.*','users.*','activate_files.*', DB::raw('Schedule_tasks.assign_date as TCA'))
                ->get();
            return view('ProjectsManager.reports.sh',compact('Data','entry1','entry2','entry3'));
        }elseif ($entry1 == 'all'){
            $Data = Tasks::whereBetween('tasks.created_at',[$entry2,$entry3])
                ->join('users','users.id','=','tasks.EmpID')
                ->join('activate_files','activate_files.Bennar','=','tasks.Bennar_Code')
                ->where('users.id',$entry4)
                ->select('tasks.*','users.*','activate_files.*', DB::raw('tasks.created_at as TCA'))
                ->get();
            return view('ProjectsManager.reports.index',compact('Data','entry1','entry2','entry3'));
        }


    }



    public function ByProject (Request $request){

        $entry1 = $request->ProType;
        $entry2 = $request->PFrom;
        $entry3 = $request->PTo;
        if ($entry1 == '1'){
            $pro = ActivateFile::where('Status','=','Approved')->get();
            $kdf= [];
            foreach ($pro as $item){
                $data = DB::table('project_services')
                    ->where('Bennar_Code',$item->Bennar)
                    ->get();
                //dd();
                //echo $item->Bennar .'-';
                $yesTime = 0;

                foreach ($item->Pservices as $item2){

                    if ( $item2->status == 'yes' ){
                        $yesTime++;
                        // echo $item2->Bennar_Code.'-'.$item2->ServiceCode.'-'.$item2->status.'<br>';
                        // echo $item2->Bennar_Code.'-'.$item2->status.'<br>';
                    }
                }

                if ($yesTime >3){
                    //$array = Arr::add($kdf, 'price', $item->Bennar);
                    array_push($kdf,$item->Bennar);
                    //echo $item->Bennar;

                }

            }
            //dd($kdf);
            $Data1 = ActivateFile::all();
            $Data = $Data1->whereIn('Bennar',$kdf)->whereBetween('created_at',[$entry2,$entry3])->all();
            //$Data['ename'] = User::UrsName($item->EngID);
            //dd($Data);
            $tota = $Data1->whereIn('Bennar',$kdf)->whereBetween('created_at',[$entry2,$entry3])->sum('SOA');
            return view('ProjectsManager.reports.projects.index',compact('Data','entry1','entry2','entry3','tota'));
        }elseif($entry1 == '2'){
            /**
            ************************ Case 2 *********************************/
            $pro = ActivateFile::where('Status','=','Approved')->get();
            $kdf= [];
            $pSer = [];
            foreach ($pro as $item){
                $data = DB::table('project_services')
                    ->where('Bennar_Code',$item->Bennar)
                    ->get();
                //dd();
                //echo $item->Bennar .'-';
                $yesTime = 0;

                foreach ($item->Pservices as $item2){

                    if ( $item2->status == 'yes' ){
                        $yesTime++;
                        // echo $item2->Bennar_Code.'-'.$item2->ServiceCode.'-'.$item2->status.'<br>';
                        // echo $item2->Bennar_Code.'-'.$item2->status.'<br>';
                    }
                }

                if ($yesTime <= 3){
                    //$array = Arr::add($kdf, 'price', $item->Bennar);
                    array_push($kdf,$item->Bennar);
                    //echo $item->Bennar;

                }

            }
            //dd($pSer);
            $Data1 = ActivateFile::where('Status','=','Approved')->get();
            $Data = $Data1->whereIn('Bennar',$kdf)->whereBetween('created_at',[$entry2,$entry3])->all();
            //dd($Data);

            //$Data['ename'] = User::UrsName($item->EngID);
            //dd($Data);
            $tota = $Data1->whereIn('Bennar',$kdf)->whereBetween('created_at',[$entry2,$entry3])->sum('SOA');
            return view('ProjectsManager.reports.projects.onProgress',compact('Data','entry1','entry2','entry3','tota','pSer'));

        }elseif ($entry1 == '9'){
            /**
             ************************ Case 3 *********************************/
            $pSer = [];

            //dd($pSer);
            $Data1 = ActivateFile::where('Status','=','Approved')->get();
            $Data = $Data1->whereBetween('created_at',[$entry2,$entry3])->all();
            //dd($Data);

            //$Data['ename'] = User::UrsName($item->EngID);
            //dd($Data);
            $tota = $Data1->whereBetween('created_at',[$entry2,$entry3])->sum('SOA');
            return view('ProjectsManager.reports.projects.allProjects',compact('Data','entry1','entry2','entry3','tota'));


        }


    }

}
