<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emplyee;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EmplyeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin');

    }
    public function index()
    {
        $Data = Emplyee::join('branchs','branchs.id', '=','emplyees.Branch')
        ->join('manages_names','manages_names.id','=','emplyees.Managment')
        ->select('emplyees.*','manages_names.*','branchs.*', DB::raw('emplyees.id as emp_id'))
        ->get();
         //dd($Data);
        return view('employees.index',compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
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
         if ($request->hasFile('Attached')) {
         $path = $request->Attached->store('profiles','public');
        $input['Attached'] = $path;
        }

        $emp = Emplyee::create($input);

        $usr = User::create([
            'name' => $request->NameAR,
            'email' => $request->Email,
            'Level' => 3,
            'EmpiD' => $emp->id,
            'password' => bcrypt('emp@ko@uae'),
        ]);
        DB::table('sys_access')->insert([
            'UID' => $usr->id,
            'haveAccess' => 0,
        ]);
        $sys = DB::table('our_sys')->get();
        foreach ($sys as $sys22){
            DB::table('user_groups')->insert([
                'UID' => $usr->id,
                'Sys' => $sys22->SysName,
                'accessH' => 0,
            ]);
        }

        \Session::flash('Flash', 'تمت عملية اضافة بيانات الموظف بنجاح');
        return redirect()->back();

        //return response()->json($request);


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
        //dd();
        $dddd = $request->all();
        Emplyee::find($id)->update($dddd);
        \Session::flash('Flash', 'تمت عملية تعديل بيانات الموظف بنجاح');
        return redirect()->back();
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
