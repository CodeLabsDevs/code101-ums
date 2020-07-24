<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function showAllUsers_StatusShouldReturn200(){
        $response = $this->get('/api/user');
        $response->assertStatus(200);
    }
     /** @test */
    public function registerNewUser_WhenUserObjectGiven_StatusShouldReturn200()
    {
        $response = $this->postJson('/api/user', ['name' => 'Frank', 'email' => 'Frank@mail.com', 'password' => 'J1234']);
        $response->assertStatus(200);
    }

    /** @test */
    public function registerNewUser_WhenEmptyUserObjectGiven_StatusShouldBe400()
    {
        $response = $this->post('/api/user', []);
        $response->assertStatus(400);
    }
    
    /** @test */
    public function retrieveUser_WhenIdGiven_StatusShouldReturn200()
    {
        $this->postJson('/api/user', ['name' => 'Frank', 'email' => 'Frank@mail.com', 'password' => 'J1234']);
        $id = 1;
        $response = $this->get('/api/user/'.$id);
        $response->assertStatus(200);
    }

    /** @test */
    public function retrieveUser_WhenFalseIdGiven_StatusShouldReturn400()
    {
        $id = -10;
        $response = $this->get('/api/user/'.$id);
        $response->assertStatus(400);
    }
    
    /** @test */
    public function updateUser_WhenObjectGiven_StatusShouldReturn200()
    {
        $id = 1;
        $this->postJson('/api/user', ['name' => 'Frank', 'email' => 'Frank@mail.com', 'password' => 'J1234']);
        $response = $this->json('PUT', '/api/user/'.$id, ['name' => 'Tom']);
        $response->assertStatus(200);
    }

    /** @test */
    public function deleteUser_WhenIdGiven_StatusShouldReturn200()
    {
        $id = 1;
        $this->postJson('/api/user', ['name' => 'Frank', 'email' => 'Frank@mail.com', 'password' => 'J1234']);
        $response = $this->json('DELETE', '/api/user/'.$id);
        $response->assertStatus(200);

    }
   
}