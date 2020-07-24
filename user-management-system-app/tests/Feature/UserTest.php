<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function registerNewUser_WhenUserObjectGiven_StatusShouldBeOK()
    {
        $response = $this->post('/api/user', ['name' => 'Ben', 'email' => 'Ben@mail.com', 'password' => 'J1234']);
        $response->assertkOk();

    }

    /** @test */
    public function registerNewUser_WhenEmptyUserObjectGiven_StatusShouldBeBadRequest()
    {
        $response = $this->post('/api/user', []);
        $response->assertStatus(400);
    }
    
    
     /** @test */
    public function registerNewUser_WhenUserObjectGiven_CreatedShouldReturnTrue()
    {
        $response = $this->postJson('/api/user', ['name' => 'Frank', 'email' => 'Frank@mail.com', 'password' => 'J1234']);
        $response->assertStatus(200);

    }

    /** @test */
    public function registerNewUser_WhenEmptyUserObjectGiven_CreatedShouldReturnFalse()
    {
        $response = $this->postJson('/api/user', []);
        $response->assertStatus(400);
    }
    
    public function getAllUsers_ShouldReturnDataSet(){
        
            $response = $this->json('GET', '/api/users');
            $response->assertStatus(200);

            $response->assertJsonStructure(
                [
                    [
                            'id',
                            'name',
                            'email',
                            'password',
                            'created_at',
                            'updated_at',
                            'deleted_at'
                    ]
                ]
            );
        }
    }




