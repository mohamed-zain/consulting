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


Route::get('redirect', function () {
    if(auth()->check()){
      /* $haveAccess =  DB::table('sys_access')->where('UID',auth()->user()->id)->first();
       if (isset($haveAccess) && $haveAccess->haveAccess == 1){

       }else{
           auth()->logout();
           \Session::flash('Flash33', 'غير مصرح لك بالدخول');
           return redirect('login');
       }*/
        $level = auth()->user()->roll;
        switch ($level) {
            case 'CO':
                return redirect('ConsultingDashboard');
                break;
            case 'SA':
                return redirect('/index');
                break;

        }

    }else{
        return redirect('/');
    }

});



Route::get('/ConsultingDashboard', function () {
    $txt = 'عرض ملفات المهندسين';
    App\Helpers\LogActivity::addToLog($txt);
    return view('home');
})->middleware('auth','admin');

Route::get('/index', function () {
    $txt = 'عرض صفحة التنبيهات ';
    App\Helpers\LogActivity::addToLog($txt);
    return view('notifications');
})->middleware('auth','admin');


require __DIR__.'/auth.php';
