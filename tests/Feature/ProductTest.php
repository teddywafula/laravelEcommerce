<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test get all categories url.
     */
    public function test_get_all_products_url(): void
    {
        $response = $this->get('/api/product');

        $response->assertStatus(200);
    }
}
