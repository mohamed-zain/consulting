<?php

namespace App\Listeners;

use App\Events\ApprovalPackage;
use App\Mail\ApprovalPackageServices;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprovPackges
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ApprovalPackage  $event
     * @return void
     */
    public function handle(ApprovalPackage $event)
    {
        \Mail::to($event->CusEmail)->send(
            new ApprovalPackageServices($event->CusEmail)
        );
    }
}
