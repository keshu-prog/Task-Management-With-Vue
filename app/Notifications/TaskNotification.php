<?php


namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TaskNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $task;
    protected $action;

    public function __construct(Task $task, $action)
    {
        $this->task = $task;
        $this->action = $action;
    }

    public function via($notifiable)
    {
        return ['mail']; 
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Task Notification')
                    ->line('Task ' . $this->action . ': ' . $this->task->title)
                    ->action('View Task', url('/tasks/' . $this->task->id));
    }
}
