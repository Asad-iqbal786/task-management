<?php

namespace Tests\Feature\Feature;
// namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_task_through_form()
    {
        $user = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($user);

        $response = $this->post('/admin/add-edit-tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'is_completed' => 'no',
            'user_id' => $user->id,
        ]);

        // Update this line based on actual redirect
        $response->assertRedirect('/admin/tasks');

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
        ]);
    }

    public function test_authenticated_user_can_edit_task()
    {
        $user = User::factory()->create([
            'is_admin' => 1,
            'role' => 'admin',
        ]);

        $this->actingAs($user);

        // Create a task first
        $task = Task::factory()->create([
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'is_completed' => 'no',
            'user_id' => $user->id,
        ]);

        // Now update it
        $response = $this->post("/admin/add-edit-tasks/{$task->id}", [
            'title' => 'Updated Title', // ← Correct this
            'description' => 'This is a test task',
            'is_completed' => 'no',
            'user_id' => $user->id,
        ]);



        $response->assertRedirect('/admin/tasks');

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Title',
        ]);
    }


    public function test_authenticated_user_can_delete_task()
    {
        $user = User::factory()->create([
            'is_admin' => 1,
            'role' => 'admin',
        ]);

        $this->actingAs($user);
        // Create a task
        $task = Task::factory()->create([
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'is_completed' => 'no',
            'user_id' => $user->id,
        ]);
        // Delete the task
        $response = $this->get("/admin/tasks-destroy/{$task->id}");

        // $response->assertRedirect('/admin/tasks');
        $response = $this->get(route('taskDestroy', $task->id));


        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }


}
