<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('Database\\Seeders\\ProductSeeder');
    }

    /**
     * Delete product successfully
     *
     * @return void
     */
    public function testDeleteSuccess(): void
    {
        $product = $this->get('/api/products/')['data'][0];
        $response = $this->delete('/api/products/' . $product['code']);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "retcode" => "SUCCESS",
            "message" => "produto deletado com sucesso",
            "data" =>  [
                "code" => $product['code']
            ]
        ]);
    }

    /**
     * Attempt to delete product
     *
     * @return void
     */
    public function testDeleteNoContent(): void
    {
        $response = $this->delete('/api/products/17');
        $response->assertStatus(204);
    }
}
