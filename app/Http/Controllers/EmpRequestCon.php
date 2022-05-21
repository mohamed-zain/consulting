<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpRequest;
use Illuminate\Support\Facades\DB;

class EmpRequestCon extends Controller
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
        $ran = mt_rand(10000, 99999);
         $input = $request->all();
         $input['RID'] =  $ran;
        EmpRequest::create($input);
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
        DB::table('emp_requests')
            ->where('RID', $id)
            ->update([
                'RStatus' => 2
                    ]);
             \Session::flash('Flash', 'تم حذف الطلب  بنجاح');
       return 'تم حذف الطلب  بنجاح';
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
