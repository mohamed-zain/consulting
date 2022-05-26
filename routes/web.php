<?php


use App\Http\Controllers\DocumentsCon;
use App\Http\Controllers\ProjectsCon;
use App\Http\Controllers\UsersCon;
use App\Models\Projects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


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
    $Data =  Projects::join('projects_status','projects_status.id','=','projects.Status')
        ->orderBy('projects.id','DESC')
        ->Owne()
        //->where('activate_files.Status','Approved')
        ->get();
    $count1 = Projects::Owne()->count();
    $count2 = Projects::Owne()->where('Status',1)->count();
    $count3 = Projects::Owne()->where('Status',7)->count();
    return view('home',compact('Data','count1','count2','count3'));
})->middleware('auth','admin');

Route::get('/index', function () {
    $txt = 'عرض صفحة التنبيهات ';
    App\Helpers\LogActivity::addToLog($txt);
    return view('notifications');
})->middleware('auth','admin');


Route::get('/test', function () {
    $db_ext = DB::connection('skyCon');
    $countries = $db_ext->table('documents')->first();
dd($countries);

})->middleware('auth','admin');

Route::middleware(['auth','admin'])->group(function () {

    Route::post('UpdateStage', [ProjectsCon::class, 'UpdateStage'])->name('UpdateStage');
    Route::post('UpdateStat', [ProjectsCon::class, 'UpdateStat'])->name('UpdateStat');
    Route::get('ProjectDetails/{id}', [ProjectsCon::class, 'ProjectDetails']);
    Route::post('PStages', [ProjectsCon::class,'PStages'])->name('PStages');

    Route::get('OfficeDocs', [DocumentsCon::class, 'OfficeDocs'])->name('OfficeDocs');
    Route::get('DocsByPro', [DocumentsCon::class, 'DocsByPro'])->name('DocsByPro');
    Route::get('deleteDocuments/{id}', [DocumentsCon::class, 'destroy'])->name('deleteDocuments');
    Route::post('getMission', [DocumentsCon::class, 'getMission'])->name('getMission');

    Route::post('uploadeTemp', [DocumentsCon::class, 'uploadeTemp'])->name('uploadeTemp');
    Route::post('RefreshTempFiles', [DocumentsCon::class, 'RefreshTempFiles'])->name('RefreshTempFiles');


    Route::post('UpdateAuth', [UsersCon::class, 'UpdateAuth'])->name('UpdateAuth');
    Route::get('usersLog', [UsersCon::class, 'usersLog'])->name('usersLog');

    Route::resources([
        'Projects' => ProjectsCon::class,
        'Documents' => DocumentsCon::class,
        'Users' => UsersCon::class,
    ]);

});

require __DIR__.'/auth.php';
