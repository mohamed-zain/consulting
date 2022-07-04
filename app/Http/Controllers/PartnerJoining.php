<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PartnerJoining extends Controller
{

    public function ConsultJoinRequest(Request $request){
        //dd($request->all());
        $request->validate([
            'provinces' => 'required|max:255',
            'streetAddress' => 'required|max:255',
            'name' => 'required|max:255',
            'officeActivity' => 'required|max:255',
            'officeManager' => 'required|max:255',
            'OMPhone' => 'required|max:255',
            'OMEmail' => 'required|max:255|email',
            'EngnieeringCert' => 'required',
            'TradeCert' => 'required',
            'email' => 'required|max:255|email',
            'phone' => 'required|max:255',
            'City' => 'required|max:255',
            'Identity' => 'required|max:255',
            'OfficeType' => 'required|max:255',
        ]);
        $f = DB::table('users')->latest()->first();
        $CI = DB::table('regions_cities')->where('id',$request->City)->first();
        $f2 = $f->id+1;
        //dd($f);
        $Office_code = 'CO-'.$CI->CCode.'-'.$f2;
        if($request->hasFile('EngnieeringCert') && $request->hasFile('TradeCert')) {
            $tms = date('Y-m-d');
            $ran = mt_rand(10000, 99999);
            $EngnieeringCert = $request->file('EngnieeringCert');
            $TradeCert = $request->file('TradeCert');
            $filename = uniqid().'_'.$tms.'.'.$EngnieeringCert->getClientOriginalExtension();
            $filename2 = uniqid().'_'.$tms.'.'.$TradeCert->getClientOriginalExtension();
            $F1 = $EngnieeringCert->storeAs('licences/',$ran.'_'.$filename);
            $F2 = $TradeCert->storeAs('licences/',$ran.'_'.$filename2);

            $Data = User::create([
                'provinces' => $request->provinces,
                'streetAddress' => $request->streetAddress,
                'officeActivity' => $request->officeActivity,
                'officeManager' => $request->officeManager,
                'OMPhone' => $request->OMPhone,
                'OMEmail' => $request->OMEmail,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'OfficeType' => $request->OfficeType,
                'Identity' => $request->Identity,
                'EngnieeringCert' => 'licences/'.$ran.'_'.$filename,
                'TradeCert' => 'licences/'.$ran.'_'.$filename2,
                'Office_code' => $Office_code,
                'roll' => 'CO',
                'City' => $request->City,
                'created_at' => Carbon::now(),
                'password' => Hash::make('ko@office2022'),
            ]);
            //session()->flash('Flash','تم اضافة شريك النجاح');
            return response()->json(
                [
                    'status' => true,
                ], 200);
        }

    }

    public function GetCity(Request $request){
        $cities = DB::table('regions_cities')->where('regionsID',$request->provinces)->get();
        return view('join.city_list',compact('cities'));
    }
}
