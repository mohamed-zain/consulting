<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProjectManagerNotification extends Component
{
    public $projectCode = '';
    public $missionCode = '';
    public $UserName = '';
    public $NotificationMessage = '';




    public function mountComponent() {
           $not =  DB::table('notifications')
            ->where('notifiable_id', auth()->user()->id)
            ->where('read_at', null)
            ->orderBy('id', 'ASC')
            ->first();


            if (isset($not)){
                $n = json_decode($not->data);
                $this->projectCode = $n->code;
                $this->missionCode = $n->mission;
                $this->UserName = $not->created_at;//$not->data['code'];
                $this->NotificationMessage = $n->message;
                $not_seen =  DB::table('notifications')->where('id', $not->id);
                $not_seen->update(['read_at' => Carbon::now()]);
            }

    }

    public function mount()
    {
        return $this->mountComponent();
    }

    public function render()
    {
        return view('livewire.project-manager-notification',[
            'code' => $this->projectCode,
            'mission' => $this->missionCode,
            'message' => $this->NotificationMessage,
            'name' => $this->UserName,
        ]);
    }

}
