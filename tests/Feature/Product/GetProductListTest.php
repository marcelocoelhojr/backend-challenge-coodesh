<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetProductListTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('Database\\Seeders\\ProductSeeder');
    }

    /**
     * Get product list
     */
    public function testGetListSuccess(): void
    {
        $response = $this->get('/api/products/');
        $response->assertStatus(200);
    }
}
