<?php

namespace App\Listeners;

use App\Events\TaskEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\TaskNotification;
use App\Models\User;
class TaskEventListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(TaskEvent $event)
    {
       
        $task = $event->task;
        $action = $event->action;

        // email notification
        $user = User::where('id',$task->user_id)->first(); 
        $user->notify(new TaskNotification($task, $action));
    }
}
