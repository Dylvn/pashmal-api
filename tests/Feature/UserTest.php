<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->seed();

        $response = $this->getJson(route('user_index'));

        $userId = 1;
        $response
            ->assertOk()
            ->assertJsonFragment([
                '_links' => [
                    'self' => route('user_show', ['user' => $userId], false),
                    'modify' => route('user_update', ['user' => $userId], false),
                    'delete' => route('user_destroy', ['user' => $userId], false),
                ],
            ])
        ;
    }

    public function testShow()
    {
        $this->seed();

        $userId = 1;
        $response = $this->getJson(route('user_show', ['user' => $userId]));

        $response
            ->assertOk()
            ->assertJsonPath('id', $userId)
            ->assertJsonPath('_links.modify', route('user_update', ['user' => $userId], false))
        ;
    }

    public function testStore()
    {
        $this->seed();

        $response = $this->postJson(route('user_store'), [
            'fname' => 'Patricia',
            'lname' => 'Bruce',
            'email' => 'PatriciaABruce@rhyta.com',
            'password' => 'P@ssw0rd',
            'address' => '2035 Oakwood Circle',
            'postalcode' => '92501',
            'city' => 'Riverside',
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('email', 'PatriciaABruce@rhyta.com')
        ;
    }

    public function testStoreError()
    {
        $this->seed();

        $response = $this->postJson(route('user_store'), [
            'fname' => '',
            'lname' => 'Bruce',
            'email' => 'PatriciaABruce@rhyta.com',
            'password' => 'P@ssw0rd',
            'address' => '2035 Oakwood Circle',
            'postalcode' => '92501',
            'city' => 'Riverside',
        ]);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonPath('errors.fname.0', 'The fname field is required.')
        ;
    }

    public function testUpdate()
    {
        $this->seed();

        $response = $this->postJson(route('user_store', ['user' => 1]), [
            'fname' => 'Patricia',
            'lname' => 'Bruce',
            'email' => 'PatriciaABruce@rhyta.com',
            'password' => 'P@ssw0rd',
            'address' => '2035 Oakwood Circle',
            'postalcode' => '92501',
            'city' => 'Riverside',
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('email', 'PatriciaABruce@rhyta.com')
        ;
    }

    public function testDestroy()
    {
        $this->seed();

        $response = $this->deleteJson(route('user_destroy', ['user' => 1]));

        $response
            ->assertNoContent()
        ;
    }
}
