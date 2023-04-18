<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ProductTestCase;

class GetProductListTest extends ProductTestCase
{
    use RefreshDatabase;

    /**
     * Get product list
     */
    public function testGetListSuccess(): void
    {
        $response = $this->get('/api/products/');
        $response->assertStatus(200);
    }
}
