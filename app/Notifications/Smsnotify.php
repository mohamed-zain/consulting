<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
class Smsnotify extends Notification
{
    use Queueable;

  
    public function via($notifiable)
    {
        return ['nexmo'];
    }


    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                   ->content('Welcome To Knowz International IT Dr. Sahar Hassan');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
