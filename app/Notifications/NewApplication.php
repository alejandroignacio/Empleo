<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewApplication extends Notification
{
    use Queueable;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function toDatabase($notifiable)
    {
        return [
            'applicant_name' => $this->details['applicant_name'],
            'job_title' => $this->details['job_title'],
        ];
    }
}
