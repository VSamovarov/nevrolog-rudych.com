<?php

namespace App\Notifications;

use App\Services\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewFeedback extends Notification
{
    use Queueable;
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
            ->greeting('Здравствуйте!')
            ->line(__("Спасибо,") . $notifiable->name . '!')
            ->line(__("Мы получили ваше сообщение!"))
            ->line("----")
            ->line(__("E-mail: ") . $notifiable->email)
            ->line(__("Telephone: ") . $notifiable->phone)
            ->line(__("Сообщение:"))
            ->line($notifiable->message)
            ->line("----")
            ->line(__("Мы ответим в ближайшее время!"))
            ->from(
              Helper::getLocalized(settings()->get('site-email-first', config('mail.from.address', ''))),
              Helper::getLocalized(settings()->get('site-email-from', config('mail.from.name', '')))
            ); //От кого отправляем
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
