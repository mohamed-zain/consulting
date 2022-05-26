<?php

namespace App\Helpers;
use App\Models\Log_activities as LogActivityModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class LogActivity
{

    public static function addToLog($subject)
    {
        $log = [];
        $log['subject'] = $subject;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['Date'] = Carbon::now();
        $log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        LogActivityModel::create($log);
    }

    public static function logActivityLists()
    {
        return LogActivityModel::join('users','users.id','=','log_activities.user_id')
            //->where('log_activities.user_id','!=',auth()->user()->id)
            ->orderBy('Date', 'desc')->get();
    }
    public static function logActivityListsByEng($id)
    {
        return LogActivityModel::join('users','users.id','=','log_activities.user_id')
            ->where('log_activities.user_id','=',$id)
            ->orderBy('Date', 'desc')->get();
    }

}
