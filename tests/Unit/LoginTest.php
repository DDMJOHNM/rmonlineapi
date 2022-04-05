<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class LoginTest extends TestCase
{
    /**
     * Tests for the Login Class
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->postJson('/login',['email'=>'jmason176@gmail.com','password'=>'password']);
        $response
                ->assertJson(['login'=> 'success']);

    }

    public function test_loggedIn()
    {
        $this->assertTrue(true);
    }

    public function test_logout()
    {
        $response = $this->postJson('/logout',['email'=>'jmason176@gmail.com','password'=>'password']);
        $response
            ->assertJson(['logout'=> 'user successfully logged out']);
    }
}
