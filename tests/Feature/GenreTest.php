<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class GenreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->seed();

        $response = $this->getJson(route('genre_index'));

        // id is 11 because the DatabaseTest create 10 genre and delete them.
        $genreId = 11;
        $response
            ->assertOk()
            ->assertJsonFragment([
                '_links' => [
                    'self' => route('genre_show', ['genre' => $genreId], false),
                    'modify' => route('genre_update', ['genre' => $genreId], false),
                    'delete' => route('genre_destroy', ['genre' => $genreId], false),
                ]
            ])
        ;
    }

    public function testShow()
    {
        $genreId = 15;
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
        $response = $this->postJson(route('genre_store'), ['name' => 'Aventure']);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonPath('errors.name.0', 'The name has already been taken.')
        ;

        $response = $this->postJson(route('genre_store'), ['name' => '']);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonPath('errors.name.0', 'The name field is required.')
        ;
    }

    public function testUpdate()
    {
        $response = $this->putJson(
            route('genre_update', ['genre' => 17]), ['name' => 'Science-fiction']
        );

        $response
            ->assertCreated()
            ->assertJsonPath('name', 'Science-fiction')
        ;
    }

    public function testDestroy()
    {
        $response = $this->deleteJson(route('genre_destroy', ['genre' => 21]));

        $response
            ->assertNoContent()
        ;
    }
}
