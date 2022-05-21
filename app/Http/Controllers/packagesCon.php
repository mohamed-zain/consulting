<?php

namespace App\Http\Controllers;

use App\Models\packages;
use App\Models\PackageServices;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class packagesCon extends Controller
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
        $Data = packages::latest()->get();
        $ser = Services::latest()->get();
        return view('setting/maindata/packages', compact('Data','ser'));
    }

    public function PackageDetails($id)
    {
        $pservices  = DB::table('p_services')
            ->join('services','services.id','=','p_services.SID')
            ->select('p_services.*','services.*', DB::raw('p_services.id as DELID'))
            ->where('p_services.PID','=',$id)->get();
        //dd($pservices);
        return view('setting/maindata/packageDetails', compact('pservices','id'));
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
        packages::create($input);
        return "تمت اضافة الباقة بنجاح";
    }

    public function Addserv(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $data = PackageServices::where('PID',$request->PID)->where('SID',$request->SID)->first();
        if(isset($data)){
            return "هذه الخدمة موجوده مسبقا";
        }else{
            PackageServices::create($input);
            return "تمت اضافة الخدمة بنجاح";
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


    public function deletePackagesServ($id)
    {
        $del = PackageServices::find($id);
        $del->delete();
        return "تم حذف السجل بنجاح";
    }


    public function destroy($id)
    {
        $del = packages::find($id);
        $del->delete();
        return "تم حذف السجل بنجاح";
    }
}
