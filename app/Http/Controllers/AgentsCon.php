<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agent;
class AgentsCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }
    public function index()
    {
         $Data = Agent::all();
        return view('agents/index',compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('agents/create');
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
        Agent::create($input);
        \Session::flash('Flash', 'تمت عملية اضافة معلومات العميل بنجاح');
        return redirect('MainPort');
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
        $dddd = $request->all();
         $cont = Agent::find($id);
        $cont->update($dddd);
        \Session::flash('Flash', 'تمت عملية تعديل بيانات العميل بنجاح');
        return redirect('Agentslist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Agent::where('id','=',$id);
         $del->delete();
         return "تم حذف العميل بنجاح";
    }
}
