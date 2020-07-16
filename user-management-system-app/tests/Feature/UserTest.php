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
    public function registerNewUser_WhenUserObjectGiven_ShouldReturnTrue()
    {
        $response = $this->post('/create', ['name' => 'Ben', 'email' => 'Ben@mail.com', 'password' => 'J1234']);
        $response->assertkOk();

    }

    /** @test */
    public function registerNewUser_WhenEmptyUserObjectGiven_ShouldReturnFalse()
    {
        $response = $this->post('/create', []);
        $response->assertStatus(400);
    }




}
