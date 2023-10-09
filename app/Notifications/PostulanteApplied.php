<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostulanteApplied extends Notification
{
    use Queueable;

    public $postulante;

    public function __construct($postulante)
    {
        $this->postulante = $postulante;
    }

    public function toDatabase($notifiable)
{
    return [
        'message' => 'Un postulante ha aplicado a tu empleo.',
        'postulante_name' => $this->postulante->name,
        'postulante_email' => $this->postulante->email,
        'postulante_phone' => $this->postulante->phone,
        'postulante_skills' => $this->postulante->skills,
        // ... agregar más datos del postulante según lo requieras ...
    ];
}

    public function via($notifiable)
{
    return ['database'];
}


}
