<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\DocumentsLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DocumentsLibararyCon extends Controller
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

    public function uploadeTemp(Request $request)
    {
        $this->validate($request, [
            //'Docs' => 'required|mimes:jpg,jpeg,pdf,dwg,rvt,DWG',
        ],
            $messsages = array(
                //'Docs.mimes'=>'خطأ في صيغة الملف',

            )
        );

        if($request->hasFile('Docs')) {
            $ran = mt_rand(10000, 99999);
            $file = $request->file('Docs');
            $filename = uniqid() .$file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('Library/',$ran.'_'.$filename);
            DB::table('temp_files2')->insert([
                'usr_id' => auth()->user()->id,
                'FileName' => 'Library/'.$ran.'_'.$filename
            ]);
            return $filename;
        }


        return '';

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
        //dd($request->all());
//dd($request->all());
        $path = DB::table('temp_files2')->where('usr_id',auth()->user()->id)->first();
        $input = $request->except('_token');
        $input['DocID'] = $ran;
        $input['Usr_id'] = auth()->user()->id;
        $input['Docdetails'] = $request->Docdetails;
        $input['Docs'] = $path->FileName;
        $up = DocumentsLibrary::create($input);
        DB::table('temp_files2')->where('usr_id',auth()->user()->id)->where('FileName',$path->FileName)->delete();
        //\Session::flash('Flash', 'تم اضافة المستند بنجاح');
        return 'تم اضافة المستند بنجاح';
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
