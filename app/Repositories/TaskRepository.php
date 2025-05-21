<?php

namespace App\Repositories;

use App\Models\Task;
use App\Interfaces\TaskInterface;

class TaskRepository implements TaskInterface
{
    public function getAllTasks()
    {
        return Task::with('user', 'completeStatus')->get();
    }

    public function getTaskById($id)
    {
        return Task::findOrFail($id);
    }
    public function getTaskByUserId($user_id)
    {
        return Task::where('user_id', $user_id)->with('user', 'completeStatus')->get();

    }

    public function createTask(array $data)
    {
        return Task::create($data);
    }

    public function updateTask($id, array $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        return $task->delete();
    }
}
