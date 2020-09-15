<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->seed();

        $response = $this->registerUser();

        $response
            ->assertCreated()
            ->assertJsonPath('fname', 'Dylvn')
            ->assertJsonMissing(['password' => 'password'])
        ;
    }

    public function testLogin()
    {
        $this->seed();

        $this->registerUser();

        $response = $this->postJson(route('auth_login'), [
            'email' => 'test@test.fr',
            'password' => 'password',
        ]);

        $response
            ->assertOk()
        ;

        $this->assertNotEmpty($response->json()['access_token']);
    }

    public function testRefresh()
    {
        $token = $this->getAccessToken();

        $response = $this->postJson(route('auth_refresh'), [], [
            'Authorization' => sprintf('Baerer %s', $token),
        ]);

        $response
            ->assertOk()
            ->assertJsonFragment([
                'expires_in' => 3600,
            ])
        ;
    }

    public function testProfile()
    {
        $token = $this->getAccessToken();

        $response = $this->getJson(route('auth_profile'), [], [
            'Authorization' => sprintf('Baerer %s', $token),
        ]);

        $response
            ->assertOk()
            ->assertJsonFragment([
                'fname' => 'Dylvn',
                'lname' => 'Test',
            ])
        ;
    }

    public function testLogout()
    {
        $token = $this->getAccessToken();

        $response = $this->postJson(route('auth_logout'), [], [
            'Authorization' => sprintf('Baerer %s', $token),
        ]);

        $response
            ->assertNoContent()
        ;
    }

    private function getAccessToken() : string
    {
        $this->registerUser();
        $response = $this->loginUser();

        return $response->json()['access_token'];
    }

    private function loginUser()
    {
        return $this->postJson(route('auth_login'), [
            'email' => 'test@test.fr',
            'password' => 'password',
        ]);
    }

    private function registerUser()
    {
        return $this->postJson(route('auth_register'), [
            'fname' => 'Dylvn',
            'lname' => 'Test',
            'email' => 'test@test.fr',
            'password' => 'password',
            'password_confirmation' => 'password',
            'address' => 'test address',
            'city' => 'test city',
            'postalcode' => '69000',
        ]);
    }
}
