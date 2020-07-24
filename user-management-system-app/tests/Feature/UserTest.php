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
    
    
    
    /** @test*/
    public function retrieveUser_WhenIdGiven_StatusShouldReturn200()
    {
        $id = 1;
        $response = $this->get('/api/user/'.$id);
        $response->assertStatus(200);
    }
    
    public function retrieveUser_WhenFalseIdGiven_StatusShouldReturn400()
    {
        $id = 10;
        $response = $this->get('/api/user/'.$id);
        $response->assertStatus(400);
    }
    
    public function updateUser_WhenObjectGiven_StatusShouldReturn200()
    {
        
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
