<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Events\TaskEvent;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }
    public function GetUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $task = Task::create($request->all());
        event(new TaskEvent($task, 'created'));
        return response()->json($task, 201);
    }

    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        $task->update($request->all());
        event(new TaskEvent($task, 'updated'));
        return response()->json($task, 200);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        $task->delete();
        event(new TaskEvent($task, 'deleted'));
        return response()->json(null, 204);
    }
}
