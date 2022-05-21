<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendFiles extends Mailable
{
    use Queueable, SerializesModels;
    public $dataMission;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataMission)
    {
        $this->dataMission = $dataMission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(auth()->user()->email, 'الادارة الهندسية')
            ->subject($this->dataMission['DocName'])
            ->markdown('emails.mission.sendFiles')
            ->cc(['mission@ko-design.ae'])
            ->attachFromStorageDisk('public',$this->dataMission['Docs'])->with([
            'DocName' => $this->dataMission['DocName'],
            'ClientName' => $this->dataMission['ClientName'],
            'Docdetails' => $this->dataMission['Docdetails'],
        ]);
    }
}
