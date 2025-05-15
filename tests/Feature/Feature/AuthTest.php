<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class AuthTest extends TestCase
{
    /** @test */
    public function user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->post('/custom-login', [
            'email' => 'testuser@example.com',
            'password' => 'password',
        ]);
        $response = $this->get(route('dashboard'));

        $this->assertAuthenticatedAs($user);
    }


    public function user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response = $this->get(route('dashboard'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com',
        ]);
    }
}
