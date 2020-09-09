<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class OrderTest extends TestCase
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

        $response = $this->getJson(route('order_index'));

        $orderId = 1;
        $response
            ->assertOk()
            ->assertJsonFragment([
                '_links' => [
                    'self' => route('order_show', ['order' => $orderId], false),
                    'modify' => route('order_update', ['order' => $orderId], false),
                    'delete' => route('order_destroy', ['order' => $orderId], false),
                ],
            ])
        ;
    }

    public function testShow()
    {
        $this->seed();

        $orderId = 1;
        $response = $this->getJson(route('order_show', ['order' => $orderId]));

        $response
            ->assertOk()
            ->assertJsonPath('id', $orderId)
            ->assertJsonPath('_links.modify', route('order_update', ['order' => $orderId], false))
        ;
    }

    public function testStore()
    {
        $this->seed();

        $response = $this->postJson(route('order_store'), [
            'billing_address' => 'Strepestraat 416',
            'billing_postalcode' => '13100',
            'billing_city' => 'La Hulpe',
            'delivery_address' => 'Strepestraat 416',
            'delivery_postalcode' => '13100',
            'delivery_city' => 'La Hulpe',
            'user_id' => 12,
            'books' => [
                11, 15,
            ],
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('billing_address', 'Strepestraat 416')
        ;
    }

    public function testStoreError()
    {
        $this->seed();

        $response = $this->postJson(route('order_store'), [
            'billing_address' => '',
            'billing_postalcode' => '13100',
            'billing_city' => 'La Hulpe',
            'delivery_address' => 'Strepestraat 416',
            'delivery_postalcode' => '13100',
            'delivery_city' => 'La Hulpe',
            'user_id' => 12,
            'books' => [
                11, 15,
            ],
        ]);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonPath('errors.billing_address.0', 'The billing address field is required.')
        ;
    }

    public function testUpdate()
    {
        $this->seed();

        $response = $this->postJson(route('order_store', ['order' => 1]), [
            'billing_address' => 'Strepestraat 416',
            'billing_postalcode' => '13100',
            'billing_city' => 'La Hulpe',
            'delivery_address' => 'Strepestraat 416',
            'delivery_postalcode' => '13100',
            'delivery_city' => 'La Hulpe',
            'user_id' => 12,
            'books' => [
                11, 15,
            ],
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('billing_address', 'Strepestraat 416')
        ;
    }

    public function testDestroy()
    {
        $this->seed();

        $response = $this->deleteJson(route('order_destroy', ['order' => 1]));

        $response
            ->assertNoContent()
        ;
    }
}
