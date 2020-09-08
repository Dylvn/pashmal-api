<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function dbCountTest()
    {
        $this->seed();

        $this->assertDatabaseCount('genres', 10);
        $this->assertDatabaseCount('books', 50);
        $this->assertDatabaseCount('users', 50);
        $this->assertDatabaseCount('users', 50);
    }
}
