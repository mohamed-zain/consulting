<?php

namespace App\Http\Controllers;
use App\Models\ActivateFile;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\TasksFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class TasksCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function TasksManagement()
    {
        $tasks = Tasks::join('activate_files','activate_files.Bennar','=','tasks.Bennar_Code')
            ->join('users','users.id','=','tasks.EmpID')
            ->select('tasks.*','activate_files.*','users.*', DB::raw('tasks.created_at as CA , tasks.id as TID'))
            ->get();
        return view('SUPPORT.Tasks.index',compact('tasks'));
    }

    public function TasksManagement_by_project(Request $request)
    {

        $i = $request->pro;
           // dd($i);
        $tasks = Tasks::join('activate_files','activate_files.Bennar','=','tasks.Bennar_Code')
            ->join('users','users.id','=','tasks.EmpID')
            ->where('activate_files.Bennar',$i)
            ->select('tasks.*','activate_files.*','users.*', DB::raw('tasks.created_at as CA , tasks.id as TID, tasks.Status as TStatus'))
            ->get();
        //dd($tasks);

        if (!$tasks->isEmpty()){
            //dd('ddsds');
            foreach ($tasks as $t){

            }
           return view('SUPPORT.Tasks.by_project',compact('tasks','i'));
        }else{
            \Session::flash('Flash', 'تاكد من رقم المشروع');
           return redirect('TasksManagement');
        }

    }

    public function TasksManage()
    {
        $tasks = Tasks::join('activate_files','activate_files.Bennar','=','tasks.Bennar_Code')
            ->join('users','users.id','=','tasks.EmpID')
            ->select('tasks.*','activate_files.*','users.*', DB::raw('tasks.created_at as CA , tasks.id as TID'))
            ->get();
        return view('ActivateAccount.Tasks.index',compact('tasks'));
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


    public function ChangeEng(Request $request)
    {
        Tasks::find($request->TID)->update([
            'EmpID' => $request->EmpID,
            'TaskDone' => 'no'
        ]);
        \Session::flash('Flash', 'تم تغيير المهندس المسئول');

        return redirect()->back();
    }

    public function SetDeadline(Request $request)
    {
        Tasks::find($request->TID)->update([
            'Deadline'=>$request->Deadline
        ]);
        \Session::flash('Flash', 'تم تحديد الموعد النهائي للمهمة');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'EmpID' => 'required|',
            'Bennar_Code' => 'required',
            'Mission' => 'required',

        ],
            $messsages = array(
                'EmpID.required'=>'يجب اختيار احد الموظفين',
                'Bennar_Code.required'=>'يجب اختيار احد المشاريع',
                'Mission.required'=>'يجب كتابة رمز للمهمة',
            )
        );


       // dd($input = $request->all());
        $input = $request->all();
        $che = Tasks::where('Bennar_Code',$request->Bennar_Code)->where('Mission',$request->Mission)->first();
        if (isset($che)){
            session()->flash('Flash', 'المهمة مفتوحة مسبقا');
            return redirect()->back();
        }else{
            DB::table('tasks')->insert([
                'Bennar_Code' => $request->Bennar_Code,
                'EmpID' => $request->EmpID,
                'Mission' => $request->Mission,
                'Deadline' => $request->Deadline,
            ]);

            /*DB::table('Schedule_tasks')->insert([
                'Bennar_Code' => $request->Bennar_Code,
                'EmpID' => $request->EmpID,
                'Mission' => $request->Mission,
                'Deadline' => $request->Deadline,
                'assign_date' => $request->assign_date,
            ]);*/
            ActivateFile::where('Bennar','=',$request->Bennar_Code)
                ->update(
                    [
                        'EngID' => $request->EmpID,
                    ]
                );
            $alertData = [];
            $alertData['mission'] = $request->Mission;
            $alertData['message'] = 'تم اسناد مهمة جديدة لك للمشروع ';
            $alertData['code'] = $request->Bennar_Code;
            $alertData['deadline'] = $request->Deadline;
            $usr = User::where('id',$request->EmpID)->first();
            $usr->notify(new \App\Notifications\TaskNotify($alertData));
            session()->flash('Flash', 'تمت عملية اسناد المهمة للمهندس بنجاح');
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
        //
    }
}
