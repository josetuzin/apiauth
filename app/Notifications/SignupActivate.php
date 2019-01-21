<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SignupActivate extends Notification
{
    use Queueable;

    
    public function __construct()
    {
        //
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $url = url('/api/auth/signup/activate/' . $notifiable->activation_token);
        return (new MailMessage)
            ->subject('Confirma tu cuenta')
            ->line('Gracias por suscribirte! Antes de continuar, debes configurar tu cuenta.')
            ->action('Confirmar tu cuenta', url($url))
            ->line('Muchas gracias por utilizar nuestra aplicación!');
    }


    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
