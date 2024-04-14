<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompletedTaskNotification extends Notification
{
    use Queueable;
    public $housekeeper_name;
    public $room_no;
    public $updated;
    /**
     * Create a new notification instance.
     */
    public function __construct($housekeeper_name, $room_no, $updated)
    {
        $this->housekeeper_name = $housekeeper_name;
        $this->room_no = $room_no;
        $this->updated = $updated;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'housekeeper_name' =>  $this->housekeeper_name,
            'room_no' => $this->room_no,
            'updated' => $this->updated
        ];
    }
}
