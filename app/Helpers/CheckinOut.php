<?php

namespace App\Helpers;
use App\Models\CheckinOut as CheckinOutModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Stevebauman\Location\Facades\Location;

class CheckinOut
{

    public static function NewCheckinOut()
    {
        $ip = Request::ip();
        if ($ip == '::1'){
            $ip2 = '31.167.228.2';
        }else{
            $ip2 = Request::ip();
        }
        $currentUserInfo = Location::get($ip2);
        //dd($ip);
        $log = [];
        $log['checkin'] = 'no';
        $log['checkout'] = 'no';
        $log['ip'] = $currentUserInfo->ip;
        $log['countryName'] = $currentUserInfo->countryName;
        $log['regionName'] =  $currentUserInfo->regionName;
        $log['cityName'] =  $currentUserInfo->cityName;
        $log['latitude'] =  $currentUserInfo->latitude;
        $log['longitude'] =  $currentUserInfo->longitude;
        $log['datetime'] = Carbon::now();
        $log['usr_id'] = auth()->check() ? auth()->user()->id : 1;

        $iftoday = CheckinOutModel::where('usr_id',auth()->user()->id)->whereDate('datetime',Carbon::today())->first();
        if($iftoday){
            return '';
        }else{
            CheckinOutModel::create($log);
        }
    }

    public static function todayCheckinOut()
    {
        return CheckinOutModel::where('usr_id','=',auth()->user()->id)
            ->whereDate('datetime',Carbon::today())->first();
    }

    public static function CheckinOutLists()
    {
        return CheckinOutModel::join('users','users.id','=','user_checkin.usr_id')
            ->whereDate('user_checkin.datetime',Carbon::today())
           // ->where('user_checkin.usr_id','!=',auth()->user()->id)
            ->orderBy('user_checkin.datetime', 'desc')->get();
    }

    public static function TodayAttendanceLists()
    {
        return CheckinOutModel::join('users','users.id','=','user_checkin.usr_id')
            ->whereDate('user_checkin.datetime',Carbon::today())
             ->where('user_checkin.checkin','=','yes')
            ->select('user_checkin.*','users.*',DB::raw('user_checkin.created_at as RCA'))
            ->orderBy('user_checkin.datetime', 'desc')->get();
    }

    public static function YesterdayAttendanceLists()
    {
        return CheckinOutModel::join('users','users.id','=','user_checkin.usr_id')
            ->whereDate('user_checkin.datetime',Carbon::yesterday())
             ->where('user_checkin.checkin','=','yes')
            ->select('user_checkin.*','users.*',DB::raw('user_checkin.checkout_at as coa'))
            ->orderBy('user_checkin.datetime', 'desc')->get();
    }

    public static function TodayAbsenceLists()
    {
        return CheckinOutModel::leftJoin('users','users.id','=','user_checkin.usr_id')
            ->whereDate('user_checkin.datetime',Carbon::today())
             ->where('user_checkin.checkin','=','no')
            ->orderBy('user_checkin.datetime', 'desc')->get();

    }


    public static function EmpCheckIn($id)
    {
        //dd($id);
        $now = Carbon::now();
        return CheckinOutModel::where('id','=',$id)
            ->update([
                'checkin'=>'yes',
                'checkin_at'=>$now
            ]);
    }

    public static function EmpCheckOut($id)
    {
        $now = Carbon::now();
        return CheckinOutModel::where('id','=',$id)
            ->update([
                'checkout'=>'yes',
                'checkout_at'=>$now
            ]);
    }



}
