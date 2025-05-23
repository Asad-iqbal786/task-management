<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskCompleteStatus extends Model
{
    protected $fillable = ['task_id', 'user_id', 'is_completed'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
