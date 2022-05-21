<?php

namespace App\Http\Controllers;

use App\Models\ActivateFile;
use App\Models\ProjectServices;
use App\Models\packages;
use App\Models\PackageServices;
use App\Models\Orders;
use App\Models\ProjectStages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AppCon extends Controller
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

    public function ediiit(Request $request)
    {
        $input = $request->except('_token');



        $cont2 = Orders::where('number','=',$request->Bennar);
        $cont2->update([
            'total' => $input['total'],
        ]);
        $cont = ActivateFile::where('Bennar','=',$request->Bennar);
        $cont->update([
            'RQS' => $input['RQS'],
            'Bank' => $input['Bank'],
            'DRP' => $input['DRP'],
            'SOA' => $input['SOA'],
            'Port' => $input['Port'],
            'City' => $input['City'],
            'Country' => $input['Country'],
            'Name' => $input['Name'],
            'FileCode' => $input['FileCode'],
            'Bennar' => $input['Bennar'],
            'Phone' => $input['Phone'],
            'Email' => $input['Email'],
        ]);
        \Session::flash('Flash', 'تم تعديل الملف بنجاح');
        return redirect()->back();
    }



    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'picture' => 'required',
            'code' => 'required',
            'about' => 'required',
            'about2' => 'required',
            'about3' => 'required',
            'price' => 'required',
            'pro_url' => 'required',
        ]);

        if($validator->fails()){
            return "تأكد من تعبئة البيانات بصورة صحيحة ";
        }
        $input = $request->except('_token');
       $q = DB::table('app_packages')->insert([
            'name' => $input['name'],
           'cat' => $input['cat'],
            'picture' => $input['picture'],
            'code' => $input['code'],
            'about' => $input['about'],
            'about2' => $input['about2'],
            'about3' => $input['about3'],
            'price' => $input['price'],
            'pro_url' => $input['pro_url'],

        ]);
        //\Session::flash('Flash', 'تمت الاضافة  بنجاح');
        if($q){
            return "تمت الاضافة  بنجاح";
        }else{
            return "لم تتم الاضافة";
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivateFile  $activateFile
     * @return \Illuminate\Http\Response
     */
    public function show(ActivateFile $activateFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivateFile  $activateFile
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivateFile $activateFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivateFile  $activateFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $dddd = $request->except('_method','_token');
        $cont = DB::table('app_packages')->where('id',$id)->update($dddd);
        //$cont->update($dddd);
        \Session::flash('Flash', 'تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivateFile  $activateFile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = DB::table('app_packages')->where('id',$id)->delete();
        //$del->delete();
        return "تم حذف السجل بنجاح";
    }
}
