<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        // TODO delete this when other tests will already have this line.
        $this->seed();
        $response = $this->getJson(route('book_index'));

        $bookId = 51;
        $response
            ->assertOk()
            ->assertJsonFragment([
                '_links' => [
                    'self' => route('book_show', ['book' => $bookId], false),
                    'modify' => route('book_update', ['book' => $bookId], false),
                    'delete' => route('book_destroy', ['book' => $bookId], false),
                ],
            ])
        ;
    }

    public function testShow()
    {
        $bookId = 65;
        $response = $this->getJson(route('book_show', ['book' => $bookId]));

        $response
            ->assertOk()
            ->assertJsonPath('id', $bookId)
            ->assertJsonPath('_links.delete', route('book_destroy', ['book' => $bookId], false))
        ;
    }

    public function testStore()
    {
        $response = $this->postJson(route('book_store'), [
            'name' => "L'Éveil du Léviathan",
            'author' => 'James S. A. Corey',
            'description' => "Dans un futur non daté, le système solaire a été colonisé par l'humanité. La Ceinture d'astéroïdes compte de nombreuses stations minières, dédiées à l'extraction des minerais nécessaires à l'industrie de l'ensemble du système solaire, en particulier pour les deux grandes puissances, Mars et la Terre.",
            'price' => 19.60,
            'available' => true,
            'created_at' => '2011-06-15',
            'genres' => [11, 14],
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('name', "L'Éveil du Léviathan")
            ->assertJsonPath('_embedded.genres.0', '/api/genres/11') // TODO update with route() when genres route will be created.
        ;
    }

    public function testStoreError()
    {
        $response = $this->postJson(route('book_store'), [
            'name' => "L'Éveil du Léviathan",
            'author' => 'James S. A. Corey',
            'description' => "Dans un futur non daté, le système solaire a été colonisé par l'humanité. La Ceinture d'astéroïdes compte de nombreuses stations minières, dédiées à l'extraction des minerais nécessaires à l'industrie de l'ensemble du système solaire, en particulier pour les deux grandes puissances, Mars et la Terre.",
            'price' => 19.60,
            'available' => true,
            'created_at' => '2011-06-15',
            'genres' => [11, 14],
        ]);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonPath('errors.name.0', 'The name has already been taken.')
        ;

        $response = $this->postJson(route('book_store'), [
            'name' => '',
            'author' => 'James S. A. Corey',
            'description' => "Dans un futur non daté, le système solaire a été colonisé par l'humanité. La Ceinture d'astéroïdes compte de nombreuses stations minières, dédiées à l'extraction des minerais nécessaires à l'industrie de l'ensemble du système solaire, en particulier pour les deux grandes puissances, Mars et la Terre.",
            'price' => 19.60,
            'available' => true,
            'created_at' => '2011-06-15',
            'genres' => [11, 14],
        ]);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonPath('errors.name.0', 'The name field is required.')
        ;
    }

    public function testUpdate()
    {
        $response = $this->putJson(
            route('book_update', ['book' => 53]), [
                'name' => 'Harry Potter et la chambre des secrets',
                'author' => 'J. K. Rowling',
                'description' => "Après la mort de ses parents (Lily et James Potter), Harry Potter est recueilli par sa tante maternelle Pétunia et son oncle Vernon à l'âge d'un an.",
                'price' => 19.99,
                'available' => true,
                'created_at' => '1997-06-26',
                'genres' => [
                    14, 17,
                ],
            ]
        );

        $response
            ->assertCreated()
            ->assertJsonPath('name', 'Harry Potter et la chambre des secrets')
        ;
    }

    public function testDestroy()
    {
        $response = $this->deleteJson(route('book_destroy', ['book' => 55]));

        $response
            ->assertNoContent()
        ;
    }
}
