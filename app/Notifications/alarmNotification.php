<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class alarmNotification extends Notification
{
    use Queueable;

    public $arr;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('the introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable) {
        // This will be stored in Database, You'll fetch this notification later to display in application
        return [
            'Code' => $this->arr['Code'],
            'Room' => $this->arr['Room'],
            'Message' => 'Alarm!!! ',
        ];

        // dd($this->arr);
    }

    public function toBroadcast($notifiable) {
        // This will be stored in Database, You'll fetch this notification later to display in application
        return new BroadcastMessage([
            'Code' => $this->arr['Code'],
            'Room' => $this->arr['Room'],
            'Message' => 'Alarm!!! ',
        ]);
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
