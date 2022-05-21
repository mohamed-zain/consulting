<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulting;
use Illuminate\Support\Facades\DB;

class ConsultCon extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }
    public function index()
    {
         $Data = DB::table('consultings')
->join('agents','agents.id','=','consultings.AgentID')
->join('consult_types','consult_types.id','=','consultings.ConsultT')
->select('consultings.created_at as Date','agents.AgentName as AgentName','consult_types.ConsType as ConsType','consultings.ConsText as ConsText','consultings.ConsultID as ID')
->get();
        return view('consults.Consultindex',compact('Data'));
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
        $ran = mt_rand(10000, 99999);
         $input = $request->all();
         $input['ConsultID'] =  $ran;
        Consulting::create($input);
       // \Session::flash('Flash', 'تمت عملية اضافة معلومات العميل بنجاح');
        return 'تم ارسال الطلب للادارة بنجاح';
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
