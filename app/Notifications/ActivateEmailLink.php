<?php

namespace App\Notifications;

use Carbon\Carbon; // Permet de générer une periode 
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActivateEmailLink extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage {
        $Url = $this->generateUrl($notifiable);
        return (new MailMessage)
            ->subject("Activation de votre compte")
            ->greeting("Bonjour")
            ->line("Bienvenue sur notre site")
            ->action('Notification Action', $Url)
            ->line('Thank you for using our application!')
            ->salutation("Cordialement");
    }

    public function generateUrl($notifiable) {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 5)), // Donne un timer d'expiration du lien  
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }

}
