<?php

namespace App\Events;

use App\Models\Task;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;
    public $action;

    public function __construct(Task $task, $action)
    {
        $this->task = $task;
        $this->action = $action;
    }
}
