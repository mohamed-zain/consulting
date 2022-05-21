<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceCon extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }
    public function index(){
        \App\Helpers\LogActivity::addToLog('دخول سجل الحضور والغياب للمهندسين');
        $checkinoutlist = \App\Helpers\CheckinOut::CheckinOutLists();
        $todayAttendancelist = \App\Helpers\CheckinOut::TodayAttendanceLists();
        $todayAbsencelist = \App\Helpers\CheckinOut::TodayAbsenceLists();


        //dd($todayAbsencelist2);
        $checkCount = $checkinoutlist->count();
        $todayCount = $todayAttendancelist->count();
        $totalAB = $todayAttendancelist->where('checkin')->count();
        $todayAbsenceCount = $todayAbsencelist->count();
        $totalAB = $todayAbsenceCount + $checkinoutlist->where('checkin','=','no')->count();
        $posts = $checkinoutlist->where('checkin','no');



        $usr = User::join('emplyees','emplyees.id','=','users.EmpiD')
            ->select('emplyees.*','users.*',DB::raw('users.created_at as EEE'))
            ->where('users.roll','AdmissionEmp')->where('users.id','!=',24)->get();

        return view('employees.attendance.attendance',
            compact('checkinoutlist','checkCount','todayAttendancelist','todayCount','usr','todayAbsenceCount','todayAbsencelist'));
    }

    public function AttendanceList(){
        $todayAttendancelist = \App\Helpers\CheckinOut::TodayAttendanceLists();
        return view('employees.attendance.AttendanceList',compact('todayAttendancelist'));
    }

    public function AbsenceList(){
        return view('employees.attendance.absenceList');
    }

    public function todayAttendanceList(){
        $todayAttendancelist = \App\Helpers\CheckinOut::TodayAttendanceLists();
        return view('employees.attendance.todayAtten',compact('todayAttendancelist'));
    }

    public function yesterdayAttendanceList(){
        $yesterdayAttendancelist = \App\Helpers\CheckinOut::YesterdayAttendanceLists();
        return view('employees.attendance.yesterdayAtten',compact('yesterdayAttendancelist'));
    }

    public function weekAttendanceList(){
        //$yesterdayAttendancelist = \App\Helpers\CheckinOut::YesterdayAttendanceLists();
        return view('employees.attendance.weekAtten');
    }
}
