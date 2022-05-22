<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\ActivateFile;
use App\Models\Orders;
use App\Models\ProjectServices;
use App\Models\Documents;
use App\Models\Tasks;
use App\Models\TasksFile;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class DataController extends BaseController
{
    public function totalPrice(Request $request)
    {
        //dd($request->all());
        //$data = DB::table('activate_files')->where('Bennar',$request->user_pac)->first();
        //dd($data);
        $d = Carbon::now();
        $data = DB::table('orders')->where('number',$request->bennar)->first();
        //dd($data);
        if ($data){
            return response()->json(
                [
                    'total' => $data->total,

                ], 200);
        }else{
            return response()->json(
                [
                    'total' => 00,

                ], 200);
        }


    }

    public function test(Request $request)
    {
        $data = DB::table('orders')->where('number',$request->bennar)->first();
        if ($data){
            return response()->json(
                [
                    'total' => $data->total,

                ], 200);
        }else{
            return response()->json(
                [
                    'total' => 00,

                ], 200);
        }
    }

    public function userPackages(Request $request)
    {
        $data = DB::table('orders')->where('number',$request->bennar)->get();
        if ($data){
            return response()->json(
                [
                    'Data' => $data,

                ], 200);
        }else{
            return response()->json(
                [
                    'total' => 00,

                ], 200);
        }
    }


    public function userMissions(Request $request)
    {
        $missions = ProjectServices::where('Bennar_Code',$request->bennar)->get();
        if ($missions){
            return response()->json(
                [
                    'Data' => $missions,

                ], 200);
        }else{
            return response()->json(
                [
                    'total' => 00,

                ], 200);
        }
    }
    public function userFiles(Request $request)
    {
        $filoo = TasksFile::where('B_Code',$request->Bennar_Code)->where('Mission',$request->ServiceCode)->get();

        $Charts = Documents::where('projectID',$request->Bennar_Code)->where('for_client',0)->where('mission',$request->ServiceCode)->where('cat','1')->get();

        $Reports = Documents::where('projectID',$request->Bennar_Code)->where('for_client',0)->where('mission',$request->ServiceCode)->where('cat','2')->get();

        $Recomends = Documents::where('projectID',$request->Bennar_Code)->where('for_client',0)->where('mission',$request->ServiceCode)->where('cat','3')->get();

        $Others = Documents::where('projectID',$request->Bennar_Code)->where('for_client',0)->where('mission',$request->ServiceCode)->where('cat','4')->get();

        $officeFile = Documents::where('projectID',$request->Bennar_Code)->where('mission',null)->get();


        return response()->json(
            [
                'Data' => $filoo,
                'Office' => $officeFile,
                'chartFiles' => $Charts,
                'reports' => $Reports,
                'Recomends' => $Recomends,
                'others' => $Others,

            ], 200);

    }



    public function userUpgrade(Request $request)
    {
        //return $request->upData();
        $json = $request->upData;
        foreach($json as $obj){

            $succ =  DB::table('user_upgrade')->insert([
                'Sname' => $obj['title'],
                'SPrice' => $obj['price'],
                'uid'  =>  $request->uid
            ]);
            $mw = $succ;
        }


        if ($mw){
            return response()->json(
                [
                    'message' => true

                ], 200);
        }else{
            return response()->json(
                [
                    'message' => false,
                ], 200);
        }
    }

    public function myRqs(Request $request)
    {
        $myrqs = DB::table('user_upgrade')->where('uid',$request->uid)->get();
        if ($myrqs){
            return response()->json(
                [
                    'Data' => $myrqs,

                ], 200);
        }else{
            return response()->json(
                [
                    'total' => 00,

                ], 200);
        }
    }

    public function koProducts(Request $request)
    {
        $myrqs = DB::table('app_packages')->where('cat','p')->get();
        $myrqs2 = DB::table('app_packages')->where('cat','s')->get();
        $myrqs3 = DB::table('app_packages')->where('cat','ts')->get();
        $myrqs4 = DB::table('app_packages')
            ->where('cat','s')
            ->where('cat2',null)
            ->select( DB::raw('app_packages.id as item_id,app_packages.name as title,app_packages.price as price'))
            ->get();
        $myrqs5 = DB::table('app_packages')
            ->where('cat2','v')
            ->select( DB::raw('app_packages.id as item_id,app_packages.name as title,app_packages.price as price'))
            ->get();
        if ($myrqs){
            return response()->json(
                [
                    'Data' => $myrqs,
                    'Data2' => $myrqs2,
                    'Data3' => $myrqs3,
                    'Data4' => $myrqs4,
                    'Data5' => $myrqs5,

                ], 200);
        }else{
            return response()->json(
                [
                    'total' => 00,

                ], 200);
        }
    }


    public function checkNoti(Request $request)
    {
        $myrqs = DB::table('documents')
            ->where('projectID',$request->uid)
            ->where('noti',1)
            ->first();
        $noti = DB::table('app_notification')
            ->where('bennar',$request->uid)
            ->where('active',0)
            ->first();
        // return $noti->Title;

        if ($myrqs){
            $title = "الادارة الهندسية - ".$myrqs->DocName;
            $body = "تحديث ملفاتك الهندسية - ". $myrqs->Docdetails;
            DB::table('documents')
                ->where('id',$myrqs->id)
                ->update([
                    'noti'=>0
                ]);
            DB::table('app_notification')
                ->where('id',$noti->id)
                ->update([
                    'active'=>1
                ]);
            return response()->json(
                [
                    'message' => true,
                    'Title' => $title,
                    'Body' => $body,
                    'id2' => $noti->id,
                    'Title2' => $noti->Title,
                    'Body2' => $noti->Body,

                ], 200);
        }elseif($noti){
            DB::table('app_notification')
                ->where('id',$noti->id)
                ->update([
                    'active'=>1
                ]);
            return response()->json(
                [
                    'message' => true,

                    'id2' => $noti->id,
                    'Title2' => $noti->Title,
                    'Body2' => $noti->Body,

                ], 200);
        }else{
            return response()->json(
                [
                    'message' => false,

                ], 200);
        }
    }


    public function Noti(Request $request)
    {

        $noti = DB::table('app_notification')
            ->where('bennar',$request->uid)
            ->get();

        if ($noti){

            return response()->json(
                [
                    'message' => true,
                    'Data' => $noti,

                ], 200);
        }else{
            return response()->json(
                [
                    'message' => false,
                    'Data' => [],

                ], 200);
        }
    }





    public function rejectFile(Request $request)
    {
        $myrqs = DB::table('documents')
            ->where('id',$request->f_id)->first();
        $count = $myrqs->reject_count +1;

        $myrqs2 = DB::table('documents')
            ->where('id',$request->f_id)
            ->update([
                'reject_accept' => '1',
                'reject_count' => $count,
                'reject_reason' => $request->reason
            ]);

        if ($myrqs2){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'تم رفض الملف وارسال الملاحظة',


                ], 200);
        }else{
            return response()->json(
                [
                    'success' => false,


                ], 200);
        }


    }





    public function acceptFile(Request $request)
    {


        $myrqs2 = DB::table('documents')
            ->where('id',$request->f_id)
            ->update([
                'reject_accept' => '2'

            ]);

        if ($myrqs2){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'تم قبول الملف ',


                ], 200);
        }else{
            return response()->json(
                [
                    'success' => false,


                ], 200);
        }


    }



    public function AppLinks(Request $request)
    {
        $links = DB::table('app_links')->get();
        if ($links){
            return response()->json(
                [
                    'Data' => $links,

                ], 200);
        }else{
            return response()->json(
                [
                    'total' => 00,

                ], 200);
        }
    }


    public function ChatsMessages(Request $request)
    {
        $lastArry = [];
        $larr = array();
        $myrqs = DB::table('messages')
            ->join('activate_files','activate_files.Bennar','=','messages.bennar_id')
            ->join('users','users.id','=','messages.user_id')
            ->where('messages.bennar_id',$request->bennar)
            ->select( DB::raw('users.name as name,messages.message as lastMessage,messages.created_at as time,users.image as image,users.isActive as isActive'))
            ->get();
        $tsk = DB::table('project_services')->where('Bennar_Code','=',$request->bennar)->get();

        foreach ($tsk as $key =>$team){
            $eng = DB::table('tasks')
                ->where('tasks.Mission','=',$team->ServiceCode)
                ->where('tasks.Bennar_Code','=',$request->bennar)
                ->join('users','users.id','=','tasks.EmpID')
                ->select('tasks.*','users.*',DB::raw('users.id as UID'))
                ->first();

            //dd($eng);
            if (isset($eng)){
                $qu = 'اهلا ومرحبا';
                if($eng->Mission =='E0'){
                    $qu = 'المهندس المعماري';
                }elseif ($eng->Mission =='E1'){
                    $qu = 'مهندس التكييف';

                }elseif ($eng->Mission =='E2'){
                    $qu = ' مهندس السباكة';

                }elseif ($eng->Mission =='E3'){
                    $qu = 'المهندس الكهربائي';

                }elseif ($eng->Mission =='E4'){
                    $qu = ' المهندس الانشائي';
                }else{
                    $qu = ' الادارة الهندسية';
                }
                $lastLogin = \Carbon\Carbon::parse($eng->last_login_at)->diffForHumans();
                $lastArry = Arr::add(['id' => $eng->UID,'name' => $eng->name,'lastMessage' =>$qu,'image' => $eng->image,'Mission' => $eng->Mission], 'time', $lastLogin);
                $larr[]=$lastArry;
            }
            //$lastArry = (object)$lastArry;


        }

        //dd($larr);
        if ($larr){
            return response()->json(
                [
                    'Data' => $larr,
                ], 200);
        }else{
            return response()->json(
                [
                    'Data' => 00,
                ], 200);
        }
    }


    public function ChatList(Request $request)
    {
        $lastArry = [];
        $larr = array();
        $issender = false;
        $qur = DB::table('messages')
            ->where('bennar_id',$request->bennar)
            ->where('Mission',$request->mission)
            ->whereIn('user_id',[$request->uid,$request->cid])
            //->where('to_id',$request->toid)
            //->select(DB::raw('message as text, id as uid'))

            ->get();
        //dd($qur);
        foreach ($qur as $item){
            if ($item->user_id == $request->uid){
                $issender = false;
            }else{
                $issender = true;
            }
            $lastArry = Arr::add(['text' => $item->message], 'isSender', $issender);
            $larr[]=$lastArry;
        }


        if ($larr){
            return response()->json(
                [
                    'Data' => $larr,
                ], 200);
        }else{
            return response()->json(
                [
                    'Data' => [],
                ], 200);
        }
    }



    public function ChatListMsg(Request $request)
    {
        $lastArry = [];
        $larr = array();
        $issender = false;
        $item = DB::table('messages')
            ->where('bennar_id',$request->bennar)
            ->where('Mission',$request->mission)
            ->where('is_seen',0)
            ->where('user_id','!=',$request->uid)
            //->where('to_id',$request->toid)
            //->select(DB::raw('message as text, id as uid'))
            ->orderBy('created_at','asc')->first();
        //dd($qur);
        if (isset($item)){
            if ($item->user_id == $request->uid){
                $issender = true;
            }else{
                $issender = false;
            }
            $date = Carbon::parse($item->created_at);
            $d2 = $date->format("H:i A");
            $lastArry = Arr::add(['mid' => $item->id,'text' => $item->message,'dt' => $d2], 'isSender', $issender);
            $larr[]=$lastArry;

            DB::table('messages')->where('id',$item->id)->update(['is_seen'=>1]);

        }

        if ($larr != []){
            return response()->json(
                [
                    'Data' => $larr,
                    'success' => true,
                ], 200);
        }else{
            return response()->json(
                [
                    'Data' => [],
                    'success' => false,
                ], 200);
        }
    }



    public function SendMessage(Request $request)
    {
        //return $request->upData();

        $succ =  DB::table('messages')->insert([
            'user_id' => $request->uid,
            'Mission' => $request->mission,
            'bennar_id'  =>  $request->bennar,
            'message'  =>  $request->message,

        ]);
        $mw = $succ;



        if ($mw){
            return response()->json(
                [
                    'message' => 'تم الارسال',
                    'success' => true

                ], 200);
        }else{
            return response()->json(
                [
                    'success' => false,
                    'message' => ' message not send'
                ], 200);
        }
    }




    public function chatProList(Request $request)
    {
        $lastArry = [];
        $larr = array();
        $issender = false;
        $qur = DB::table('tasks')
            ->where('tasks.EmpID',$request->user_id)
            ->join('activate_files','activate_files.Bennar','=','tasks.Bennar_Code')
            ->join('users','users.File_code','=','tasks.Bennar_Code')
            ->select('tasks.*','activate_files.*','users.*',DB::raw('tasks.id as TID'))
            ->get();
        //dd($qur);
        foreach ($qur as $item){

            $lastArry = Arr::add([
                'id' => $item->TID,
                'name' => $item->Name,
                'lastMessage' => $item->FileCode,
                'image' => $item->image,
                'bennar' => $item->Bennar_Code,
            ],
                'mission', $item->Mission);
            $larr[]=$lastArry;
        }


        if ($larr){
            return response()->json(
                [
                    'Data' => $larr,
                ], 200);
        }else{
            return response()->json(
                [
                    'Data' => [],
                ], 200);
        }
    }

    public function ChatList2(Request $request)
    {
        $lastArry = [];
        $larr = array();
        $issender = false;
        $qur = DB::table('messages')
            ->where('bennar_id',$request->bennar)
            ->where('Mission',$request->mission)
            //->where('user_id',$request->uid)
            //->where('to_id',$request->toid)
            //->select(DB::raw('message as text, id as uid'))
            ->get();
        //dd($qur);
        foreach ($qur as $item){
            if ($item->user_id == $request->uid){
                $issender = true;
            }else{
                $issender = false;
            }
            $date = Carbon::parse($item->created_at);
            $d2 = $date->format("H:i A");
            $lastArry = Arr::add(['mid' => $item->id,'text' => $item->message,'dt' => $d2], 'isSender', $issender);
            $larr[]=$lastArry;
        }


        if ($larr){
            return response()->json(
                [
                    'Data' => $larr,
                ], 200);
        }else{
            return response()->json(
                [
                    'Data' => [],
                ], 200);
        }
    }


    public function FilesByCat(Request $request)
    {
        //$filoo = TasksFile::where('B_Code',$request->Bennar_Code)->where('Mission',$request->ServiceCode)->get();

        $Charts = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission',$request->Mission)->where('cat',$request->Cat)->get();

        //$Reports = Documents::where('projectID',$request->Bennar_Code)->where('for_client',0)->where('mission',$request->ServiceCode)->where('cat','2')->get();

        //$Recomends = Documents::where('projectID',$request->Bennar_Code)->where('for_client',0)->where('mission',$request->ServiceCode)->where('cat','3')->get();

        //$Others = Documents::where('projectID',$request->Bennar_Code)->where('for_client',0)->where('mission',$request->ServiceCode)->where('cat','4')->get();

        //$officeFile = Documents::where('projectID',$request->Bennar_Code)->where('mission',null)->get();


        return response()->json(
            [
                'Data' => $Charts,

            ], 200);

    }

    public function FilesCatStat(Request $request)
    {

        $files = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission',$request->Mission)->where('cat',$request->Cat)->count();
        $reject = Documents::where('projectID',$request->Bennar)
            ->where('for_client',0)
            ->where('mission',$request->Mission)
            ->where('cat',$request->Cat)
            ->where('reject_accept',1)
            ->count();
        $accept = Documents::where('projectID',$request->Bennar)
            ->where('for_client',0)
            ->where('mission',$request->Mission)
            ->where('cat',$request->Cat)
            ->where('reject_accept',2)
            ->count();

        $en = Tasks::where('Bennar_Code',$request->Bennar)
            ->where('Mission',$request->Mission)
            ->value('EmpID');
        $en ? $e = User::find($en)->value('name') : $e = 'لم يتم تحديده';

        return response()->json(
            [
                'eng' => $e,
                'files' => $files,
                'reject' => $reject,
                'accept' => $accept,

            ], 200);

    }


    public function ChartsStat(Request $request)
    {

        $chE0 = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission','E0')->where('cat','1')->count();
        $chE1 = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission','E1')->where('cat','1')->count();
        $chE2 = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission','E2')->where('cat','1')->count();
        $chE3 = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission','E3')->where('cat','1')->count();
        $chE4 = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission','E4')->where('cat','1')->count();



        return response()->json(
            [
                'chE0' => $chE0,
                'chE1' => $chE1,
                'chE2' => $chE2,
                'chE3' => $chE3,
                'chE4' => $chE4,

            ], 200);

    }

    public function QuantityStat(Request $request)
    {

        $QE0 = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission','E0')->where('cat','2')->count();
        $QE1 = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission','E1')->where('cat','2')->count();
        $QE2 = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission','E2')->where('cat','2')->count();
        $QE3 = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission','E3')->where('cat','2')->count();
        $QE4 = Documents::where('projectID',$request->Bennar)->where('for_client',0)->where('mission','E4')->where('cat','2')->count();



        return response()->json(
            [

                'QE0' => $QE0,
                'QE1' => $QE1,
                'QE2' => $QE2,
                'QE3' => $QE3,
                'QE4' => $QE4,
            ], 200);

    }

    public function FilesUpload(Request $request)
    {
        //dd($request->all());
        $ran = mt_rand(10000, 99999);
        $feildName = $request->Fname;

        if($request->hasFile('Docs')) {
            //$docName = '';
            $tms = date('Y-m-d');
            $ran = mt_rand(10000, 99999);
            $file = $request->file('Docs');
            $filename = uniqid().'_'.$tms.'.'.$file->getClientOriginalExtension();
            $file->storeAs('docs/',$ran.'_'.$filename);
            $FileName = 'docs/'.$ran.'_'.$filename;
                if($feildName == 'IDeintyfile'){
                    $docName = 'صورة هوية العميل';
                }elseif ($feildName == 'Checkfile'){
                    $docName = 'صك الارض';
                }elseif ($feildName == 'BankFile'){
                    $docName = 'سند التحويل البنكي';
                }elseif ($feildName == 'Bulldingfile'){
                    $docName = 'كروكي المساحة';
                }elseif ($feildName == 'Glocation'){
                    $docName = 'الموقع الجغرافي للمشروع';
                }elseif ($feildName == 'SoilTest'){
                    $docName = 'ملف فحص التربة';
                }elseif ($feildName == 'EleSave'){
                    $docName = 'مناسيب الارض';
                }elseif ($feildName == 'Saving'){
                    $docName = 'رخصة البناء';
                }else{
                    $docName = 'غير معروف';
                }
            $input = $request->except('_token');
            $input['DocID'] = $ran;
            $input['DocName'] =  $docName;
            $input['Usr_id'] = $request->uid;
            $input['Docdetails'] = '';
            $input['Docs'] = $FileName;
            $up = Documents::create($input);

            $ex = DB::table('projects_files')->where('PrfileID',$request->projectID)->first();
            if (!isset($ex)){
                DB::table('projects_files')->insert([
                    'PrfileID' => $request->projectID,
                     $feildName => $FileName
                ]);
            }else{
                DB::table('projects_files')->where('PrfileID',$request->projectID)->update([
                    $feildName => $FileName,
                ]);
            }

            /*if($up != 'support@ko-design.ae'){
                $user = \App\Models\ActivateFile::where('Bennar',$request->projectID)->first();
                // $recipient = 'e@ko-design.ae';//$user->Email;
                $recipient = $user->Email;
                $input2['ClientName'] = $user->Name;
                //Mail::to($user)->cc($cc)->send(new \App\Mail\SendFiles($input));
                //Mail::to($recipient)->later(now()->addMinutes(2), new \App\Mail\SendFiles($input2));
            }*/
            return response()->json(
                [
                    'success' => true,
                    'message' => 'تم رفع الملف بنجاح',
                ], 200);

        }else{
            return response()->json(
                [
                    'success' => false,
                    'message' => 'not done',
                ], 201);
        }


    }

    public function sendLocation(Request $request){

        $ex = DB::table('projects_files')->where('PrfileID',$request->ProId)->first();

        if(!isset($ex)){
            DB::table('projects_files')->insert([
                'PrfileID' => $request->ProId,
                'Glocation' => $request->address,
                'longe' => $request->longe,
                'late' => $request->late,
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'تم اضافة بيانات الموقع بنجاح',
                ], 201);

        }elseif(isset($ex)){
            DB::table('projects_files')->where('PrfileID',$request->ProId)->update([
                'Glocation' => $request->address,
                'longe' => $request->longe,
                'late' => $request->late,
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'تم تحديث بيانات الموقع بنجاح',
                ], 201);
        }else{
            return response()->json(
                [
                    'success' => false,
                    'message' => 'هناك خطأ في البيانات المرسلة',
                ], 201);
        }
    }


    public function GetFilesList(Request $request){

        $fl = DB::table('projects_files')->where('PrfileID',$request->Bennar)->first();

        if(isset($fl)){

            return response()->json(
                [
                    'Data' => $fl,
                    'success' => true,
                    'message' => 'done',
                ], 201);
        }else{
            return response()->json(
                [
                    'success' => false,
                    'message' => 'not done',
                ], 201);
        }
    }

    public function RequireFilesStat(Request $request){
        $notNull = 0;
        $fl = DB::table('projects_files')->where('PrfileID',$request->Bennar)->first();

        if(isset($fl)){
                if ($fl->IDeintyfile != null){
                    $notNull ++;
                }
                if ($fl->Checkfile != null){
                    $notNull ++;
                }
                if ($fl->BankFile != null){
                    $notNull ++;
                }
                if ($fl->Bulldingfile != null){
                    $notNull ++;
                }
                if ($fl->Glocation != null){
                    $notNull ++;
                }
                if ($fl->SoilTest != null){
                    $notNull ++;
                }
                if ($fl->EleSave != null){
                    $notNull ++;
                }
                if ($fl->Saving != null){
                    $notNull ++;
                }

            return response()->json(
                [
                    'Data' => $notNull,
                    'success' => true,
                    'message' => 'done',
                ], 201);
        }else{
            return response()->json(
                [
                    'Data' => $notNull,
                    'success' => false,
                    'message' => 'not done',
                ], 201);
        }
    }

}
