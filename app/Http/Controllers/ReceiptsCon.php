<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipts;
use Illuminate\Support\Facades\Auth;
class ReceiptsCon extends Controller
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
         $path = "public/docs/";

        $input = $request->all();
        $input['PayID'] = $ran;
        $input['PayUserID'] = Auth::user()->id;
        $input['PayProID'] = $request->PayProID;
         if ($request->hasFile('PayAttach')) {
            $docs = mt_rand(10000, 99999).'.'.$request->PayAttach->getClientOriginalExtension();
         $request->PayAttach->move($path,$docs);
         $input['PayAttach'] =  $path.$docs;
        }
        Receipts::create($input);
       \Session::flash('Flash', 'تم حفظ بيانات سند الصرف');

        return redirect('accounting');
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
