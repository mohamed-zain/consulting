<?php

namespace App\Http\Controllers;

use App\Models\ActivateFile;
use App\Models\ProjectServices;
use App\Models\packages;
use App\Models\PackageServices;
use App\Models\Orders;
use App\Models\ProjectStages;
use Illuminate\Http\Request;

class ActivateFileController extends Controller
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
            'currency' => $input['currency'],
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
        $input = $request->except('_token');
        ActivateFile::create([
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
        \Session::flash('Flash', 'تم تفعيل الملف بنجاح');
        $cont = Orders::where('number','=',$request->Bennar);
        $cont->update([
            'StatusActive' => 1
        ]);

        $Order = Orders::where('number',$request->Bennar)->first();
        $PID = packages::where('packageName','=',$Order->name)->first();

        $Services = PackageServices::join('services','services.id','=','p_services.SID')->where('p_services.PID',$PID->id)->get();
        //dd($Services);
        foreach($Services as $item){
        $input['Bennar_Code'] = $request->Bennar;
        $input['ServiceCode'] = $item->ServiceCode;
        $input['ServiceID'] = $item->ServiceName;
        ProjectServices::create($input);
    };
        ProjectStages::updateOrCreate(

            [
                'Bennar' => $request->Bennar
            ],

            [
                'current_main_Stage' => 1,
                'current_sub_Stage' => 2,
            ]
        );
        return redirect('NewFiles');
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
    public function update(Request $request, ActivateFile $activateFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivateFile  $activateFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivateFile $activateFile)
    {
        //
    }
}
