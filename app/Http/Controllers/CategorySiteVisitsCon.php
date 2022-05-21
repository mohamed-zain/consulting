<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorySiteVisits;
class CategorySiteVisitsCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = CategorySiteVisits::all();
        return view('setting.maindata.sitevisit.index', compact('Data'));
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
        CategorySiteVisits::create($input);
        \Session::flash('Flash', 'تم  تعديل البيانات بنجاح');
        return redirect('SiteVisitCategory');
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
        $cont = CategorySiteVisits::where('id', $id)->first();
        $cont->update($dddd);
        \Session::flash('Flash', 'تم  تعديل البيانات بنجاح');
        return redirect('SiteVisitCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = CategorySiteVisits::where('id','=',$id);
        $del->delete();
        return "تم الحذف  بنجاح";
    }
}
