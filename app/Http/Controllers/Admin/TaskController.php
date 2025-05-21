<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskCompleteStatus;
use App\Models\User;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    protected $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    public function index()
    {
        $tasks = $this->taskService->all();
        return view('admin.pages.tasks.index', compact('tasks'));
    }
    public function addEditTask(Request $request, $id = null)
    {
        if (empty($id)) {
            $taskData = [];
            $task = new Task;
            $message = "Task added successfully.";
        } else {
            $task = Task::findOrFail($id);
            $taskData = $task->toArray();
            $message = "Task updated successfully.";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
            ]);

            DB::beginTransaction();
            try {

                if (empty($id)) {
                    // Create a new Task
                    $task = $this->taskService->store($data);
                    // Create TaskCompleteStatus record for the newly created task
                    TaskCompleteStatus::create([
                        'task_id' => $task->id,
                        'user_id' => auth()->id(),
                        'is_completed' => 'no',
                    ]);
                } else {
                    // Update Task if $id is provided
                    $task = Task::find($id);
                    if ($task) {
                        $data['is_completed'] = $data['is_completed'] ?? 'no';
                        $taskData = $this->taskService->update($id, $data);
                        // Update TaskCompleteStatus for the task if it exists
                        $status = TaskCompleteStatus::where('task_id',  $taskData->id)->first();
                        if ($status) {
                            $status->update([
                                'is_completed' => $data['is_completed'] ?? 'no',
                            ]);
                        }
                    }
                }

                DB::commit();
                Session::flash('success', $message);
                return redirect()->route('taskIndex');
            } catch (\Exception $e) {
                DB::rollback();
                return back()->withErrors(['error' => $e->getMessage()]);
            }
        }
        $getUer = User::whereNot('role', 'admin')->get();

        return view('admin.pages.tasks.add-edit-tasks', compact('taskData', 'getUer'));
    }

    public function taskDestroy($id)
    {
        $task = $this->taskService->find($id);
        try {
            $task->delete();
            Session::flash('success', 'Task deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error deleting Task: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'is_completed' => 'required|in:yes,no',
        ]);

        $task = $this->taskService->find($id);

        // Update the task
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
