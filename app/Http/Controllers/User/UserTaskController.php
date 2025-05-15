<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskCompleteStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
        use AuthorizesRequests;

    public function index()
    {
        $userInfo = auth()->user();
        $tasks = Task::where('user_id', $userInfo->id)->with('user', 'completeStatus')->get();
        return view('user.pages.tasks.index', compact('tasks'));
    }

    public function userTaskStatusUpdate(Request $request, $id)
    {

        $request->validate([
            'is_completed' => 'required|in:yes,no',
        ]);

        $task = Task::findOrFail($id);
        // Update the task
        $this->authorize('updateStatus', $task); // auto 403 if not allowed

        $task->update([
            'is_completed' => $request->is_completed
        ]);

        // create the task status
        TaskCompleteStatus::create([
            'task_id' => $task->id,
            'user_id' => $task->user_id,
            'is_completed' => $request->is_completed,
        ]);

        return back()->with('success', 'Task status updated successfully.');
    }
}
