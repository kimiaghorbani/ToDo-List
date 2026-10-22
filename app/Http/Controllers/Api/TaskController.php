<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();

        return $user->role === 'admin' ? Task::all() : $user->tasks;
    }

    
        public function store(StoreTaskRequest $request)
        {
            Gate::authorize('create', Task::class);

            $task = $request->user()->tasks()->create($request->validated());

            return response()->json($task, 201);
        }


        public function show(Task $task)
        {
            Gate::authorize('view', $task);

            return $task;
        }


    public function update(UpdateTaskRequest $request, Task $task)
    {
        Gate::authorize('update', $task);

        $task->update($request->validated());

        return $task;
    }

    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);

        $task->delete();

        return response()->noContent();
    }


    public function toggle(Task $task)
    {
        Gate::authorize('update', $task);

        $task->update(['completed' => ! $task->completed]);

        return $task;
    }
}