<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewFeedbackAdmin extends Notification
{
    use Queueable;
    private $feedback;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($feedback)
    {
      $this->feedback = $feedback;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->greeting(__("Сообщение от ") . $this->feedback->name)
            ->line('----')
            ->line(__("E-mail: ") . $this->feedback->email)
            ->line(__("Telephone: ") . $this->feedback->phone)
            ->line(__("Сообщение:"))
            ->line($this->feedback->message); //От кого отправляем
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
