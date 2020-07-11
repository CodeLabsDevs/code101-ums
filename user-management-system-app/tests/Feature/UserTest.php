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
        $this->post('/create', ['name' => 'Ben', 'email' => 'Ben@mail.com', 'password' => 'J1234'])->assertJsonStructure(['created' => 'true']);
    }

    /** @test */
    public function registerNewUser_WhenEmptyUserObjectGiven_ShouldReturnFalse()
    {
        $this->post('/create', [])->assertJsonFragment(['created' => 'false']);
    }




}
