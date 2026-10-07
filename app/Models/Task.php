<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'completed', 'priority', 'due_date'];

    protected $casts = [
        'completed' => 'boolean',
        'due_date'  => 'date:Y-m-d',
    ];
}