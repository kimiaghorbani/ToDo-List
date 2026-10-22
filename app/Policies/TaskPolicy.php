<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    
    public function before(User $user, string $ability): ?bool
    {
         if ($user->role === 'admin') {
            return true;   
        }
        return null; 
    }

    
    public function view(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }

    
    public function create(User $user): bool
    {
        return true;
    }

    
    public function update(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }

    
    public function delete(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        return false;
    }
}
