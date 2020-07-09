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

     // Sum_ThrowsException_WhenNegativeNumberAs1stParam
    public function registerNewUser_WhenUserObjectGiven_ShouldReturnTrue()
    {
        $this->post('/create', ['name' => 'John', 'email'=> 'John@mail.com', 'password' => 'J1234'])->seeJsonEquals(['created' => 'true']);
    }

    public function registerNewUser_WhenEmptyUserObjectGiven_ShouldReturnFalse()
    {
        $this->post('/create', [])->seeJsonEquals(['created' => 'false']);
    }




}
