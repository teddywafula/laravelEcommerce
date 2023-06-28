<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VendorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test get all vendors url.
     */
    public function test_get_all_vendors_url(): void
    {
        $response = $this->get('/api/vendor');

        $response->assertStatus(200);
    }
}
