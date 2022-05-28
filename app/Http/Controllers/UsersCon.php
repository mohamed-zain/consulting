<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\CheckinOut as CheckinOutModel;
use App\Models\Documents;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UsersCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $Data = User::all();
        return view('Users.index',compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function updateuserinfo(Request $request)
    {
        $dddd = $request->email;
        //dd($dddd);

        $cont = User::find(Auth::user()->id)->update(['email' => $dddd]);

        \Session::flash('Flash', 'تم تعديل بياناتك بنجاح');
        return redirect('/UpdateProfile');


    }

    public function usersLog(Request $request)
    {
        $txt = 'عرض سجل النشاطات داخل النظام';
        LogActivity::addToLog($txt);
        $logs = \App\Helpers\LogActivity::logActivityLists();
        return view('Users/log',compact('logs'));

    }

    public function UpdateAuth(Request $request)
    {
        LogActivity::addToLog('تفعيل او الغاء صلاحية المستخدم لدخول النظام');

        DB::table('sys_access')
            ->where('UID', $request->UID)
            ->update([
                'haveAccess' => $request->Level
            ]);
        session()->flash('Flash', 'تم تعديل صلاحية الدخول ');
        //return redirect()->back();
        return 'تم تعديل صلاحية الدخول';


    }
    public function updateuserpass(Request $request)
    {

        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);
        $dddd = $request->all();
         //dd($dddd);

        $dddd['password'] = bcrypt($request->password);
        $cont = User::find(Auth::user()->id);
        $cont->update($dddd);
        \Session::flash('Flash', 'تم تعديل كلمة المرور');
        return redirect('UpdateProfile');

    }
     public function Updateprofile()
    {

         $Data = User::where('id','=',Auth::user()->id)->first();
         if (Auth::user()->Level == 1) {
            return view('users/Updateprofile',compact('Data'));
         }else{
             $Data = User::join('agents','agents.id','=','users.Agent_id')
                 ->join('projects','projects.AgenName','=','agents.id')
                 ->join('packages','packages.id','=','projects.Package')
                 ->where('users.id','=',Auth::user()->id)
                 ->first();
            return view('users/Updateprofile2',compact('Data'));
         }

    }

    public function EmpProfile()
    {
        \App\Helpers\LogActivity::addToLog('عرض الصفحة بروفايل الموظف.');
         //$Data = User::where('id','=',Auth::user()->id)->first();

             $Data = User::join('emplyees','emplyees.id','=','users.EmpiD')
                    ->join('branchs','branchs.id', '=','emplyees.Branch')
                    ->join('manages_names','manages_names.id','=','emplyees.Managment')
                    //->select('emplyees.*','manages_names.*','branchs.*','users.*', DB::raw('emplyees.id as emp_id, users.email as email'))
                    ->where('users.id','=',Auth::user()->id)->first();
             //dd($Data);

            return view('EMP/Updateprofile2',compact('Data'));


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
         $p1 = $request->password;
         $p2 = $request->password_confirmation;
         if ($p1 !== $p2) {
             \Session::flash('Flash44', 'كلمة السر غير متطابقة ... حاول مرة اخري');
        return redirect('UpdateProfile');
         }else{

        $dddd['password'] = bcrypt($request->password);
         $cont = User::find($id);
        $cont->update($dddd);
        \Session::flash('Flash', 'تم تعديل بياناتك بنجاح');
        return redirect('/');
         }

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
    public function takeAccess($id,$sys)
    {
        $upda = DB::table('user_groups')->where('UID',$id)->where('Sys',$sys)->update([
            "accessH" => 0
        ]);;

        return "تم نزع الصلاحية";
    }
    public function givAccess($id,$sys)
    {
        $upda = DB::table('user_groups')->where('UID',$id)->where('Sys',$sys)->update([
            "accessH" => 1
        ]);

        return "تم منح الصلاحية";
    }

    public function checkin($id)
    {
       // dd()
        $del = \App\Helpers\CheckinOut::EmpCheckIn($id);
        return "تم تسجيل حضورك بنجاح";
    }

    public function checkout($id)
    {
        $del = \App\Helpers\CheckinOut::EmpCheckOut($id);
       // $del = \App\Helpers\CheckinOut::EmpCheckOut($id);
        $times = CheckinOutModel::where('id',$id)->first();
        $startTime = Carbon::parse($times->checkin_at);
        $finishTime = Carbon::parse($times->checkout_at);
        $totalDuration = $finishTime->diffInSeconds($startTime);
        $du = gmdate('H:i:s', $totalDuration);
        CheckinOutModel::where('id','=',$id)
            ->update([
                'du'=>$du
            ]);

        return 'Your Time at Office Today : '.$du;
    }
}
