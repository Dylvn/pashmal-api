<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     */
    public function testIndex()
    {
        $this->seed();

        $response = $this->getJson(route('genre_index'));

        $genreId = 1;
        $response
            ->assertOk()
            ->assertJsonFragment([
                '_links' => [
                    'self' => route('genre_show', ['genre' => $genreId], false),
                    'modify' => route('genre_update', ['genre' => $genreId], false),
                    'delete' => route('genre_destroy', ['genre' => $genreId], false),
                ],
            ])
        ;
    }

    public function testShow()
    {
        $this->seed();
        $genreId = 1;
        $response = $this->getJson(route('genre_show', ['genre' => $genreId]));

        $response
            ->assertOk()
            ->assertJsonPath('id', $genreId)
            ->assertJsonPath('_links.delete', route('genre_destroy', ['genre' => $genreId], false))
        ;
    }

    public function testStore()
    {
        $response = $this->postJson(route('genre_store'), ['name' => 'Aventure']);

        $response
            ->assertCreated()
            ->assertJsonPath('name', 'Aventure')
        ;
    }

    public function testStoreError()
    {
        $response = $this->postJson(route('genre_store'), ['name' => '']);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonPath('errors.name.0', 'The name field is required.')
        ;
    }

    public function testUpdate()
    {
        $this->seed();

        $response = $this->putJson(
            route('genre_update', ['genre' => 1]),
            ['name' => 'Science-fiction']
        );

        $response
            ->assertCreated()
            ->assertJsonPath('name', 'Science-fiction')
        ;
    }

    public function testDestroy()
    {
        $this->seed();

        $response = $this->deleteJson(route('genre_destroy', ['genre' => 1]));

        $response
            ->assertNoContent()
        ;
    }
}
