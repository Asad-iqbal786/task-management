<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\TaskCompleteStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function login(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Optional: Delete old tokens
        $user->tokens()->delete();

        // Create new token
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    public function taskApi()
    {
        $userInfo = auth()->user();
        // dd( $userInfo);

        $taskData = TaskResource::collection(Task::get());
        return response()->json([
            'success' => true,
            'data' => $taskData
        ]);
    }

    public function getTaskDetails($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json($task);
    }

    public function userTaskStatusUpdate(Request $request, $id)
    {

        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $tastStatus = new TaskCompleteStatus();
        $tastStatus->is_completed = $request->input('is_completed');
        $tastStatus->user_id = $task['user_id'];
        $tastStatus->task_id = $task['id'];
        $tastStatus->save();
        return response()->json(['message' => 'Task status updated successfully', 'task' => $task]);
    }

}
