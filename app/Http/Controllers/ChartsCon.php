<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charts;
class ChartsCon extends Controller
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
        $path = "public/folder/";
        $Chartm = mt_rand(10000, 99999).'.'.$request->Chart->getClientOriginalExtension();
         $request->Chart->move($path,$Chartm);
         $input = $request->all();
         $do = new Charts;
        $do->ProjectID = $request->ProjectID;
        $do->Title =  $request->Title;
        $do->Brand =  $request->Brand;
        $do->Chart =  $path.$Chartm;
        $do->save();
        \Session::flash('Flash', 'تمت عملية اضافة معلومات العميل بنجاح');
        return redirect('redirect');
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
