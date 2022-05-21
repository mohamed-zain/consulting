<?php

use App\Events\ApprovalPackage;
use App\Http\Controllers\AttendanceCon;
use App\Http\Controllers\HTMLPDFController;
use App\Models\Documents;
use App\Notifications\AlertNotification;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\AgentsCon;
use App\Http\Controllers\AgentsNamesCon;
use App\Http\Controllers\AppointmentCon;
use App\Http\Controllers\appointmentTypesCon;
use App\Http\Controllers\branchsCon;
use App\Http\Controllers\CategorySiteVisitsCon;
use App\Http\Controllers\ChartsCon;
use App\Http\Controllers\ClientjoinController;
use App\Http\Controllers\ContactInfoCon;
use App\Http\Controllers\ContractorCon;
use App\Http\Controllers\DocumentsCon;
use App\Http\Controllers\EmplyeeController;
use App\Http\Controllers\jobTitleCon;
use App\Http\Controllers\managesNameCon;
use App\Http\Controllers\MobileInfoCon;
use App\Http\Controllers\packagesCon;
use App\Http\Controllers\ProjectsCon;
use App\Http\Controllers\projectsStepsCon;
use App\Http\Controllers\ProjectsTypeCon;
use App\Http\Controllers\readyTasksCon;
use App\Http\Controllers\ReplayTasksCon;
use App\Http\Controllers\ServicesCon;
use App\Http\Controllers\StepsTermCon;
use App\Http\Controllers\SystemInfoCon;
use App\Http\Controllers\tasksApplyCon;
use App\Http\Controllers\TasksCon;
use App\Http\Controllers\UsersCon;
use App\Http\Controllers\vacationTypesCon;
use App\Models\ActivateFile;
use App\Models\Contractor;
use App\Models\Orders;
use App\Models\TasksFile;
use App\Models\User;
use App\Notifications\SendPushNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Http\Request;
use App\Models\JobTitle;
use App\Models\Branchs;
use App\Models\ManagesName;
use App\Models\Emplyee;
use App\Models\Agent;
use App\Models\Projects;
use App\Models\ProjectsFile;
use App\Models\Team;
use App\Models\Tasks;
use App\Models\ReplayTasks;
use App\Models\EmpRequest;
use App\Models\Appointment;
//use Pixelpeter\Woocommerce\Facades\Woocommerce;
use Illuminate\Support\Facades\Crypt;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('redirect');
})->middleware('auth');
Route::get('/yy', function () {
    /*  Nexmo::message()->send([
       'to'   => '966532287984',
       'from' => '16105552344',
       'text' => 'Using the facade to send a message.'
   ]);*/
    return redirect('redirect');
})->middleware('auth');

Route::get('redirect', function () {
    if(auth()->check()){
      /* $haveAccess =  DB::table('sys_access')->where('UID',auth()->user()->id)->first();
       if (isset($haveAccess) && $haveAccess->haveAccess == 1){

       }else{
           auth()->logout();
           \Session::flash('Flash33', 'غير مصرح لك بالدخول');
           return redirect('login');
       }*/
        $level = auth()->user()->Level;
        switch ($level) {
            case '1':

                return redirect('/MainPort');
                break;
            case '2':
                return redirect('/ClientEnd');
                break;
            case '3':
                return redirect('/Dispatcher');
                break;
            case '4':
                return redirect('/Dispatcher');
                break;

        }

    }else{
        return redirect('client_join');
    }

});



Route::get('/engineers', function () {
    $txt = 'عرض ملفات المهندسين';
    App\Helpers\LogActivity::addToLog($txt);
    return view('engineers');
})->middleware('auth','admin');

Route::get('/AllNotifications', function () {
    $txt = 'عرض صفحة التنبيهات ';
    App\Helpers\LogActivity::addToLog($txt);
    return view('notifications');
})->middleware('auth','admin');


Route::get('/client_join', function () {

    return view('Client_Join');
});

Route::get('downloadClientFiles/{FID}', function ($FID) {
    return Storage::download($FID);
});

Route::get('ClientRegister', function () {
    return view('AppClientRegister');
});

Route::get('logout33', function () {
    Session::flush();
    return redirect('client_join');
});

Route::get('pro_summary', function () {
    //Session::flush();
    return view('ProjectSummary');
});

Route::get('/Dispatcher', function () {

    return view('Dispatcher');
})->middleware('auth','Dis');

Route::get('/mmmm', function () {
    $access = DB::table('user_groups')
        ->where('UID',auth()->user()->id)
        ->where('accessH','1')
        ->pluck('Sys');
    $arr = $access->toArray();
    if (in_array('TopManagement',$arr) || in_array('EngineeringManagement',$arr) || in_array('ActivateAccounts',$arr)){
        return '$next($request);';
    }else{
        session()->flash('Flash', 'ليس لديك صلاحية');
        return redirect('Dispatcher');
    }
    //return view('wizard');
})->middleware('auth');



Route::get('/index', function () {

    return redirect('MainPort');
})->middleware('auth','admin');


Route::get('home', function () {
    return redirect('redirect');
});


Route::get('/Stssage', function () {
    return view('projects/stage');
})->middleware('auth','admin');


Route::get('/BankAccount', function () {
    return view('ProjectsManager.Newfiles.acc');
})->middleware('auth');

/***************************************************************/





Route::get('/usersLog', function () {
    $txt = 'عرض سجل النشاطات داخل النظام';
    App\Helpers\LogActivity::addToLog($txt);
    $logs = \App\Helpers\LogActivity::logActivityLists();
    return view('usersPrivileges/log',compact('logs'));
})->middleware('auth','auth');




Route::post('UpdateAuth', function (Request $request) {
    App\Helpers\LogActivity::addToLog('تفعيل او الغاء صلاحية المستخدم لدخول النظام');

    DB::table('sys_access')
        ->where('UID', $request->UID)
        ->update([
            'haveAccess' => $request->Level
        ]);
    \Session::flash('Flash', 'تم تعديل صلاحية الدخول ');
    //return redirect()->back();
    return 'تم تعديل صلاحية الدخول';
})->name('UpdateAuth')->middleware('auth','admin');


Route::post('SendNotificationToClient', function (Request $request) {
    //dd($request->all());
    App\Helpers\LogActivity::addToLog('ارسال تنبيه للعميل');

    DB::table('app_notification')
        ->insert([
            'bennar' => $request->bennar,
            'Title' => $request->title,
            'Body' => $request->body,
        ]);
    \Session::flash('Flash', 'تم ارسال التنبيه للعميل');
    return redirect()->back();
})->name('SendNotificationToClient')->middleware('auth','admin');


Route::post('SendNotificationToAllClient', function (Request $request) {
    //dd($request->all());
    App\Helpers\LogActivity::addToLog('ارسال تنبيه لكل العملاء');
    foreach (User::where('roll','appUser')->get() as $item){
        DB::table('app_notification')
            ->insert([
                'bennar' => $item->File_code,
                'Title' => $request->title,
                'Body' => $request->body,
            ]);
    }


    \Session::flash('Flash', 'تم ارسال التنبيه للعميل');
    return redirect()->back();
})->name('SendNotificationToClient')->middleware('auth','admin');

/***************************************************************/

Route::get('eventM', function () {
    event(new \App\Events\MessageSent('mog','nbhjghgv',2453));
});

Route::get('notify22', function () {
    $not =  DB::table('notifications')
        ->where('notifiable_id', auth()->user()->id)
        ->where('read_at', null)
        ->orderBy('id', 'ASC')
        ->first();
    $n = json_decode($not->data);
    dd($n->mission);
});
Route::get('notify', function () {

    $alertData = [];
    $alertData['mission'] = 'E0';
    $alertData['message'] = 'تم اسناد مهمة جديدة لك للمشروع DKO234';
    $alertData['code'] = 'DKO234';
    $alertData['deadline'] = '20-01-2022';

    //Notification::send(new \App\Notifications\TaskNotify());
    $usr = User::where('id',24)->first();
    $usr->notify(new \App\Notifications\TaskNotify($alertData));
    event(new \App\Events\ApprovalPackage('md.wdzain@gmail.com'));
    $TSK = ActivateFile::where('Bennar',null)->get();
    foreach ($TSK as $item){
       // echo $item->updated_at.'---------' .$item->updated_at->addDays(14).'<br>';
    }
    //return view('wizard');

    //$user = App\Models\User::find(21);
    //$cc = App\Models\User::find(110);
    //Mail::to($user)->cc($cc)->send(new \App\Mail\SendFiles($input));
    //Mail::to($user)->cc($cc)->later(now()->addMinutes(2), new \App\Mail\SendFiles($input));

    //Mail::to($user)->cc($cc)->send(new \App\Mail\SendFiles());
    //$user->notify(new \App\Notifications\TaskNotify());
    //dd($user->notifications);
   /* foreach ($user->unreadNotifications as $notification) {
        foreach ($notification->data as $items){
            echo $items;
        }

    }*/
    /*
    Notification::send(null,new SendPushNotification($title,$message,$user));
    auth()->user()->notify(new SendPushNotification($title,$message,$user));
    $user->notify($user ,new \App\Notifications\Smsnotify());
    Notification::send($user ,new \App\Notifications\Smsnotify());*/
    //return view('index');
});




Route::get('/MainSetting', function () {
    $txt = 'دخول صفحة اعدادات النظام';
    App\Helpers\LogActivity::addToLog($txt);
    return view('setting/MainSetting');
})->middleware('auth','admin');

Route::get('notice', function () {

$pro = ActivateFile::where('Status','=','Approved')->get();
    $kdf= [];
foreach ($pro as $item){
    $data = DB::table('project_services')
        ->where('Bennar_Code',$item->Bennar)
        ->get();
    //dd();
    //echo $item->Bennar .'-';
    $yesTime = 0;

    foreach ($item->Pservices as $item2){

        if ( $item2->status == 'yes' ){
            $yesTime++;
           // echo $item2->Bennar_Code.'-'.$item2->ServiceCode.'-'.$item2->status.'<br>';
           // echo $item2->Bennar_Code.'-'.$item2->status.'<br>';
        }
    }

    if ($yesTime >3){
       //$array = Arr::add($kdf, 'price', $item->Bennar);
        array_push($kdf,$item->Bennar);
        echo $item->Bennar;

    }

}
    dd($kdf);
   //dd($data);
    //return view('nm');

});


Route::get('/MainPort', function () {
    $txt = 'الدخول لوحة تحكم الادارة العليا';
    App\Helpers\LogActivity::addToLog($txt);
    $user = auth()->user()->getRememberToken();
//dd($user);
    //$title = 'test';
    //$message = 'test test testtest test test test';
    //Notification::send(null,new SendPushNotification($title,$message,$user));
    App\Helpers\LogActivity::addToLog('عرض الصفحة الرئيسية.');
    //$Appointment = Appointment::join('appointment_types','appointment_types.id','=','appointments.AppType')->get();
    $MainPort =  Projects::join('emplyees','emplyees.id','=','projects.ProManager')->get();
    $Heed = 1;

    //dd($orders);
    return view('home',compact('MainPort'));
})->middleware('auth','admin');
/*************************************projectsList********************************************/




Route::get('/projectCreate', function () {
    App\Helpers\LogActivity::addToLog('طلب صفحة انشاء مشروع.');
    //$Branchs = Branchs::all();
    //$Emplyee = \App\User::all();
    //$Agent = Agent::all();
    //$files = DB::table('exprofiles')->first();
    return view('projects/create');
})->middleware('auth','Sheared');
/*************************************end projectsList****************************************/


Route::get('/PrintRecipt/{id}', function ($id) {
    App\Helpers\LogActivity::addToLog('طباعة سند صرف مشروع معين.');
    $ddd = DB::table('catch_receipts')
        ->join('users','users.id','=','catch_receipts.RecUserID')
        ->select('catch_receipts.*','users.*', DB::raw('catch_receipts.created_at as edate'))
        ->where('ReceiptID','=',$id)->first();
    //$Data = Projects::where('ProID','=',$id)->first();
    return view('accounting/Print',compact('ddd'));
})->middleware('auth','admin');




Route::get('/ProjectFiles/{id}', function ($id) {
    App\Helpers\LogActivity::addToLog('عرض ملفات مشروع معين.');
    $ProjectsFile = Documents::where('projectID','=',$id)->get();

    return view('projects/ProFiles',compact('ProjectsFile'));
})->middleware('auth','admin');


Route::post('UpdateState', function (Request $request) {
    App\Helpers\LogActivity::addToLog('تحديث حالة المشرع.');

    DB::table('activate_files')
        ->where('Bennar', $request->ProID)
        ->update([
            'stat' => $request->State
        ]);
    \Session::flash('Flash', 'تم حفظ حالة المشروع بنجاح');
    return redirect()->back();
})->name('UpdateState')->middleware('auth');

Route::post('UpdateStage', function (Request $request) {
    App\Helpers\LogActivity::addToLog('تحديث مرحلة  المشرع.');

    DB::table('projects')
        ->where('ProID', $request->ProID)
        ->update([
            'Stage' => $request->Stage
        ]);
    \Session::flash('Flash', 'تم حفظ المرحلة بنجاح');
    return redirect('Projects');
})->name('UpdateStage')->middleware('auth');


Route::post('UpdateDuration', function (Request $request) {
    App\Helpers\LogActivity::addToLog('تحديث الفترة الزمنية للمشروع.');

    DB::table('projects')
        ->where('ProID', $request->ProID)
        ->update([
            'Duration' => $request->Duration
        ]);
    \Session::flash('Flash', 'تم حفظ المده الزمنية للمشروع بنجاح');
    return redirect('Projects');
})->name('UpdateDuration')->middleware('auth');






/************************************emoployees**********************************************/

Route::get('/emoployeesList', function () {
    App\Helpers\LogActivity::addToLog('عرض سجل الموظفين.');

    $Data = Emplyee::join('branchs','branchs.id', '=','emplyees.Branch')
        ->join('manages_names','manages_names.id','=','emplyees.Managment')
        ->select('emplyees.*','manages_names.*','branchs.*', DB::raw('emplyees.id as emp_id'))
        ->get();
    return view('TEMP.emps.index',compact('Data'));

})->middleware('auth','admin');


Route::get('/emoployeeCreate', function () {
    App\Helpers\LogActivity::addToLog('طلب صفحة تسجيل موظف.');

    $branch = Branchs::all();
    $jobtitle = JobTitle::all();
    $manages = ManagesName::all();
    $ManDirect = Emplyee::all();
    return view('employees/create',compact('branch','jobtitle','manages','ManDirect'));
})->middleware('auth','admin');

Route::get('/emoployeeCreate2', function () {
    App\Helpers\LogActivity::addToLog('طلب صفحة تسجيل موظف.');

    $branch = Branchs::all();
    $jobtitle = JobTitle::all();
    $manages = ManagesName::all();
    $ManDirect = Emplyee::all();
    return view('TEMP.emps.add',compact('branch','jobtitle','manages','ManDirect'));
})->middleware('auth','admin');

Route::get('AttendanceList', [AttendanceCon::class,'AttendanceList'])->name('AttendanceList');
Route::get('AbsenceList', [AttendanceCon::class,'AbsenceList'])->name('AbsenceList');
Route::get('yesterdayAttendanceList', [AttendanceCon::class,'yesterdayAttendanceList'])->name('yesterdayAttendanceList');
Route::get('todayAttendanceList', [AttendanceCon::class,'todayAttendanceList'])->name('todayAttendanceList');
Route::get('weekAttendanceList', [AttendanceCon::class,'weekAttendanceList'])->name('weekAttendanceList');

/***********************************end emoployees***********************************************/
Route::resources([
    'Employee' => EmplyeeController::class,
    'UsersPrivileges' => UsersCon::class,
    'ChartsControl' => ChartsCon::class,
    'Attendance' => AttendanceCon::class,

]);


Route::middleware(['auth'])->group(function () {

Route::get('UpdateProfile', [UsersCon::class,'Updateprofile'])->name('UpdateProfile');
Route::post('UserProfile', [UsersCon::class,'updateuserinfo'])->name('UserProfile');
Route::post('updateuserpass', [UsersCon::class,'updateuserpass'])->name('updateuserpass');
Route::get('takeAccess/{id}/{sys}', [UsersCon::class,'takeAccess'])->name('takeAccess');
Route::get('givAccess/{id}/{sys}', [UsersCon::class,'givAccess'])->name('givAccess');

});

/***********************************ESPM***********************************************/



Route::resources([
    'SiteVisitCategory' => CategorySiteVisitsCon::class,
    'StepsTerms' => StepsTermCon::class,
    'ProjectsType' => ProjectsTypeCon::class,
    'appointmentTypes' => appointmentTypesCon::class,
    'branchs' => branchsCon::class,
    'AgentsNames' => AgentsNamesCon::class,
    'jobTitle' => jobTitleCon::class,
    'managesName' => managesNameCon::class,
    'packages' => packagesCon::class,
    'Services' => ServicesCon::class,
    'readyTasks' => readyTasksCon::class,
    'tasksApply' => tasksApplyCon::class,
]);

Route::get('delete_SiteVisitCategory/{id}', [CategorySiteVisitsCon::class,'destroy'])->name('delete_SiteVisitCategory');
/***********************************END - ESPM***********************************************/

Route::get('deleteStepsTerm/{id}', [StepsTermCon::class,'destroy'])->name('deleteStepsTerm');

Route::get('deleteProjectsType/{id}', [ProjectsTypeCon::class,'destroy'])->name('deleteProjectsType');

Route::get('deletappointmentTypes/{id}', [appointmentTypesCon::class,'destroy'])->name('deletappointmentTypes');

Route::get('deletbranchs/{id}', [branchsCon::class,'destroy'])->name('deletbranchs');

Route::get('deletAgn/{id}', [AgentsNamesCon::class,'destroy'])->name('deletAgn');
// Route::get('UpdateReqState/{id}', 'EmpRequestCon@update')->name('UpdateReqState');

Route::get('deletjobTitle/{id}', [jobTitleCon::class,'destroy'])->name('deletjobTitle');

Route::get('deletmanagesName/{id}', [managesNameCon::class,'destroy'])->name('deletmanagesName');

Route::get('deletprojectsSteps/{id}', [projectsStepsCon::class,'destroy'])->name('deletprojectsSteps');

Route::middleware(['auth'])->group(function () {
    Route::get('deletePackages/{id}', [packagesCon::class, 'destroy'])->name('deletePackages');
    Route::get('PackageDetails/{id}', [packagesCon::class, 'PackageDetails'])->name('PackageDetails');
    Route::post('Addserv', [packagesCon::class, 'Addserv'])->name('Addserv');

    Route::get('deleteServices/{id}', [ServicesCon::class, 'destroy'])->name('deleteServices');

    Route::get('deletePackagesServ/{id}', [packagesCon::class, 'deletePackagesServ'])->name('deletePackagesServ');

    Route::get('deletreadyTasks/{id}', [readyTasksCon::class, 'destroy'])->name('deletreadyTasks');

    Route::get('delettasksApply/{id}', [tasksApplyCon::class, 'destroy'])->name('delettasksApply');

    /***************************************** Reports ******************************************************/
    Route::get('ProjectsReports', [\App\Http\Controllers\ReportsCon::class,'ProjectsReports'])->middleware('Sheared');
    Route::get('TasksReports', [\App\Http\Controllers\ReportsCon::class,'TasksReports'])->middleware('Sheared');
    Route::get('EngReports', [\App\Http\Controllers\ReportsCon::class,'EngReports'])->middleware('Sheared');
    Route::post('TasksReports', [\App\Http\Controllers\ReportsCon::class,'ByTask'])->name('TasksReports');
    Route::post('ProjectsReports', [\App\Http\Controllers\ReportsCon::class,'ByProject'])->name('ProjectsReports')->middleware('Sheared');
    /******************************************* End Reports ****************************************************/

    Route::resources([
        'SystemInfo' => SystemInfoCon::class,
        'ContactInfo' => ContactInfoCon::class,
        'MobileInfo' => MobileInfoCon::class,
        'Projects' => ProjectsCon::class,
        'Tasks' => TasksCon::class,
        'ReplayTasks' => ReplayTasksCon::class,
        'Appointments' => AppointmentCon::class,
        'Documents' => DocumentsCon::class,
        'vacationTypes' => vacationTypesCon::class,
    ]);

    Route::get('htmlPdf/{bennar}', [HTMLPDFController::class,'htmlPdf'])->name('htmlPdf');
    Route::get('deleteproject/{id}', [ProjectsCon::class,'destroy'])->name('deleteproject');
    Route::get('/ProProduction/{id}', [ProjectsCon::class,'ProProduction']);
    Route::get('/ProServices/{id}', [ProjectsCon::class,'ProServices']);
    Route::get('/ProjectsSummary', [ProjectsCon::class,'ProjectsSummary'])->middleware('Sheared');
    Route::get('/WaitingProjects', [ProjectsCon::class,'WaitingProjects'])->middleware('Sheared');
    Route::get('/ArchiveProjects', [ProjectsCon::class,'ArchiveProjects'])->middleware('Sheared');
    Route::post('ArchivePro', [ProjectsCon::class,'ArchivePro'])->middleware('Sheared')->name('ArchivePro');
    Route::post('FrozePro', [ProjectsCon::class,'FrozePro'])->middleware('Sheared')->name('FrozePro');
    Route::get('/FrozenProjects', [ProjectsCon::class,'FrozenProjects'])->middleware('Sheared');
    Route::get('deleteProSer/{id}', [ProjectsCon::class,'deleteProSer'])->name('deletePƒroSer');
    Route::post('editProSer', [ProjectsCon::class,'editProSer'])->name('editProSer');
    Route::post('PStages', [ProjectsCon::class,'PStages'])->name('PStages');

});








Route::get('TasksManagement', [TasksCon::class,'TasksManagement'])->name('TasksManagement')->middleware('Sheared');

Route::get('TM_by_project', [TasksCon::class,'TasksManagement_by_project'])->middleware('Sheared');
Route::get('TasksManage', [TasksCon::class,'TasksManage'])->name('TasksManage')->middleware('Sheared');
Route::post('ChangeEng', [TasksCon::class,'ChangeEng'])->name('ChangeEng')->middleware('Sheared');
Route::post('SetDeadline', [TasksCon::class,'SetDeadline'])->name('SetDeadline')->middleware('Sheared');

Route::get('deltasks/{id}', [ReplayTasksCon::class,'destroy'])->name('deltasks')->middleware('Sheared');


Route::get('OfficeFiles', [DocumentsCon::class,'OfficeFiles'])->name('OfficeFiles')->middleware('Sheared');
Route::post('getMission', [DocumentsCon::class,'getMission'])->name('getMission')->middleware('Sheared');
Route::get('deleteDocuments/{id}', [DocumentsCon::class,'destroy'])->name('deleteDocuments')->middleware('Sheared');
Route::post('DocPerForEng_acc', [DocumentsCon::class,'DocPerForEng_acc'])->name('DocPerForEng_acc')->middleware('Sheared');
Route::post('DocPerForEng_den', [DocumentsCon::class,'DocPerForEng_den'])->name('DocPerForEng_den')->middleware('Sheared');
Route::post('DocPerForClient_den', [DocumentsCon::class,'DocPerForClient_den'])->name('DocPerForClient_den')->middleware('Sheared');
Route::post('DocPerForClient_acc', [DocumentsCon::class,'DocPerForClient_acc'])->name('DocPerForClient_acc')->middleware('Sheared');
Route::get('DocsByPro', [DocumentsCon::class,'DocsByPro'])->name('DocsByPro')->middleware('Sheared');


Route::get('deletvacationTypes/{id}', [vacationTypesCon::class,'destroy'])->name('deletvacationTypes');



Route::get('/PrintProject/{id}', function ($id) {
    App\Helpers\LogActivity::addToLog('طباعة بيانات مشروع.');

    $Data = Projects::join('emplyees','emplyees.id','=','projects.ProManager')
        ->join('agents','agents.id','=','projects.AgenName')
        ->where('projects.ProID','=',$id)
        ->get();
    $Team = Team::join('emplyees','emplyees.id','=','teams.EmpID')->where('ProjectID','=',$id);
    return view('projects/print',compact('Data','Team'));
})->middleware('auth')->middleware('TasksManage');


Route::get('projects_progress', function () {
    App\Helpers\LogActivity::addToLog('عرض صفحة انجاز المشاريع');
    $Data = ActivateFile::all();
    return view('projects/projects_progress',compact('Data'));
})->middleware('auth','Sheared');




Route::get('EmployeesPerformance', function () {
    App\Helpers\LogActivity::addToLog('عرض صفحة اداء الموظفين');

    $usr = User::where('Level','=','3')->where('roll','=','AdmissionEmp')->whereNotIn('id',[25,28])->get();
    return view('projects/EmployeesPerformance',compact('usr'));
})->middleware('auth','Sheared');


Route::get('/ShowProject/{id}', function ($id) {
    App\Helpers\LogActivity::addToLog('عرض تفاصيل مشروع.');

    $Single = ActivateFile::join('orders','orders.number','=','activate_files.Bennar')
        ->where('orders.number','=',$id)
        ->first();
    $files = TasksFile::where('B_Code','=',$id)->get();
    return view('projects/show',compact('Single','files','id'));
})->middleware('auth','EmployeesPerformance');


Route::get('/ShowEmp/{id}', function ($id) {
    App\Helpers\LogActivity::addToLog('تعديل بيانات الموظف.');

    $Single = Emplyee::join('branchs','branchs.id','=','emplyees.Branch')
        ->join('manages_names','manages_names.id','=','emplyees.Managment')
        ->join('job_titles','job_titles.id','=','emplyees.JobTitle')
        ->where('emplyees.id','=',$id)
        ->first();

    return view('employees/show',compact('Single','id'));
})->middleware('auth','admin');

Route::get('/ShowEmp2/{id}', function ($id) {
    App\Helpers\LogActivity::addToLog('تعديل بيانات الموظف.');

    $Single = Emplyee::join('branchs','branchs.id','=','emplyees.Branch')
        ->join('manages_names','manages_names.id','=','emplyees.Managment')
        ->join('job_titles','job_titles.id','=','emplyees.JobTitle')
        ->where('emplyees.id','=',$id)
        ->first();

    return view('TEMP.emps.show',compact('Single','id'));
})->middleware('auth');



Route::get('/Editpro/{id}', function ($id) {
    App\Helpers\LogActivity::addToLog('تعديل بيانات مشروع معين.');

    $Data = Projects::where('ProID','=',$id)->first();
    //dd($Data);
    return view('projects/Proedit',compact('Data'));
})->middleware('auth','admin');

Route::get('/EditEmp/{id}', function ($id) {
    App\Helpers\LogActivity::addToLog('تعديل بيانات موظف معين.');

    $Single3 = Emplyee::join('branchs','branchs.id','=','emplyees.Branch')
        ->join('manages_names','manages_names.id','=','emplyees.Managment')
        ->join('job_titles','job_titles.id','=','emplyees.JobTitle')
        ->where('emplyees.id','=',$id)
        ->select('branchs.*','emplyees.*','manages_names.*','job_titles.*', DB::raw('emplyees.id as EMPID'))
        ->first();
    return view('employees/EditEmp',compact('Single3','id'));
})->middleware('auth','admin');



Route::get('/EditEmp2/{id}', function ($id) {
    App\Helpers\LogActivity::addToLog('تعديل بيانات موظف معين.');

    $Single3 = Emplyee::join('branchs','branchs.id','=','emplyees.Branch')
        ->join('manages_names','manages_names.id','=','emplyees.Managment')
        ->join('job_titles','job_titles.id','=','emplyees.JobTitle')
        ->where('emplyees.id','=',$id)
        ->select('branchs.*','emplyees.*','manages_names.*','job_titles.*', DB::raw('emplyees.id as EMPID'))
        ->first();
    return view('TEMP.emps.edit',compact('Single3','id'));
})->middleware('auth');

Route::resources([
    'Agents' => AgentsCon::class,
]);

Route::get('deleteAgents/{id}', [AgentsCon::class,'destroy'])->name('deleteAgents');

Route::get('Agentslist', [AgentsCon::class,'index']);

Route::get('/Agentscreate', function () {
    App\Helpers\LogActivity::addToLog('طلب صفحة تسجيل عميل جديد.');
    return view('agents/create');
})->middleware('auth','admin');


Route::get('/Agentscreate55', function () {
    App\Helpers\LogActivity::addToLog('طلب صفحة تسجيل عميل جديد.');
    return view('agents/create2');
})->middleware('auth','admin');

Route::post('UpdateAgents', function (Request $request) {
    App\Helpers\LogActivity::addToLog('تحديث بيانات عميل.');

    $cont = Agent::find($request->id)->update($request->all());
    session()->flash('Flash', 'تمت عملية تعديل بيانات العميل بنجاح');
    return "تمت عملية تعديل بيانات العميل بنجاح";
})->name('UpdateAgents');


/******************************Contractor*******************************************/
Route::resources([
    'Contractor' => ContractorCon::class,
]);

Route::get('deleteContractor/{id}', [ContractorCon::class,'destroy'])->name('deleteContractor');


Route::get('/ContractorCreate', function () {
    App\Helpers\LogActivity::addToLog('طلب صفحة تسجيل مقاول جديد.');
    return view('contractor/create');
})->middleware('auth','admin');


Route::post('UpdateContractor', function (Request $request) {
    App\Helpers\LogActivity::addToLog('تحديث بيانات عميل.');
    $cont = Contractor::find($request->id)->update($request->all());
    session()->flash('Flash', 'تمت عملية تعديل بيانات المقاول بنجاح');
    return "تمت عملية تعديل بيانات المقاول بنجاح";
})->name('UpdateContractor');
/******************************End Contractor*******************************************/



Route::get('/Uesersgroups', function () {
    App\Helpers\LogActivity::addToLog('عرض صلاحيات النظام.');

    return view('usersPrivileges/Uesersgroups');
})->middleware('auth','admin');












Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
