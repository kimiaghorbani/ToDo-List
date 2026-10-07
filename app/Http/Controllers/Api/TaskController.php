<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    // GET /api/tasks
    public function index()
    {
        return Task::all();
    }

    // POST /api/tasks
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());

        return response()->json($task, 201);
    }

        // GET /api/tasks/{id}
        public function show(Task $task)
        {
            return $task;
        }

    // PUT/PATCH /api/tasks/{id}
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return $task;
    }

    // DELETE /api/tasks/{id}
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }

    // PATCH /api/tasks/{id}/toggle
    public function toggle(Task $task)
    {
        $task->update(['completed' => ! $task->completed]);

        return $task;
    }
}