<?php
namespace App\Helpers;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Notify
{
    public static function notiUser ($mission,$message,$code){
        $alertData = [];
        $mission ? $alertData['mission'] = $mission : $alertData['mission'] = '';
        $message ? $alertData['message'] = $message : $alertData['message'] = '';
        $code ? $alertData['code'] = $code : $alertData['code'] = '';
        $alertData['deadline'] = '';
        //Notification::send(new \App\Notifications\TaskNotify());
        $usr1 = User::where('id',1)->first();
        $usr2 = User::where('id',31)->first();
        $usr3 = User::where('id',32)->first();
        $usr4 = User::where('id',34)->first();
        $usr1->notify(new \App\Notifications\TaskNotify($alertData));
        $usr2->notify(new \App\Notifications\TaskNotify($alertData));
        $usr3->notify(new \App\Notifications\TaskNotify($alertData));
        $usr4->notify(new \App\Notifications\TaskNotify($alertData));
    }
    public static function GetNoti($id){
       $noti = DB::table('notifications')
            ->where('notifiable_id', $id)
            //->where('read_at', null)
            ->orderBy('id', 'DESC')
           ->take(10)
            ->get();
       return $noti;
    }
}