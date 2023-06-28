<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test get all categories url.
     */
    public function test_get_all_categories_url(): void
    {
        $response = $this->get('/api/category');

        $response->assertStatus(200);
    }
}
