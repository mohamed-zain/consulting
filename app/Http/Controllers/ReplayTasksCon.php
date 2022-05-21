<?php

namespace App\Http\Controllers;

use App\Models\ReplayTasksFile;
use Illuminate\Http\Request;
use App\Models\ReplayTasks;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;

class ReplayTasksCon extends Controller
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
    public function store(Request $request)
    {

       $input = $request->all();

        if ($request->hasFile('AttacheD')) {
            foreach($request->file('AttacheD') as $file) {
                $path = $file->store('replay','public');
                $do['RTaskID'] = $input['TaskID'];
                $do['RTaskName'] =  $path;
                ReplayTasksFile::create($do);
            }
            $input['EMPID'] = Auth::user()->id;
            ReplayTasks::create($input);
            \Session::flash('Flash', 'تم نجاز المهمة بنجاح');
            Tasks::where('TID', $request->TaskID)->update(['TState' =>1,'TState2'=>1]);
            return redirect('UsersTasks');
        }else{
            $input['EMPID'] = Auth::user()->id;
            ReplayTasks::create($input);
            \Session::flash('Flash', 'تم نجاز المهمة بنجاح');
            Tasks::where('TID', $request->TaskID)->update(['TState' =>1,'TState2'=>1]);
            return redirect('UsersTasks');
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
        $del = ReplayTasks::where('TaskID','=',$id);
         $del->delete();
         return "تم حذف السجل بنجاح";
    }
}
