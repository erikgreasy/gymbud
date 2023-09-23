<?php

namespace Tests\Feature;

use Tests\TestCase;

class RecordTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

// 9 - 130kg
// 10 - 120kg
// 11 - 100kg
