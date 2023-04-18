<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ProductTestCase;

class GetProductTest extends ProductTestCase
{
    use RefreshDatabase;

    /**
     * Get product by id success test
     */
    public function testGetSuccess(): void
    {
        $products = $this->get('/api/products/');
        $response = $this->get('/api/products/' . $products['data'][0]['code']);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "retcode" => "SUCCESS",
            "message" => "dados do produto",
            "data" => [
                "code" => $products['data'][0]['code'],
                "status" => $products['data'][0]['status'],
                "imported_t" => $products['data'][0]['imported_t'],
                "url" => $products['data'][0]['url'],
                "creator" => $products['data'][0]['creator'],
                "created_t" => $products['data'][0]['created_t'],
                "last_modified_t" => $products['data'][0]['last_modified_t'],
                "product_name" => $products['data'][0]['product_name'],
                "quantity" => $products['data'][0]['quantity'],
                "brands" => $products['data'][0]['brands'],
                "categories" => $products['data'][0]['categories'],
                "labels" => $products['data'][0]['labels'],
                "cities" => $products['data'][0]['cities'],
                "purchase_places" => $products['data'][0]['purchase_places'],
                "stores" => $products['data'][0]['stores'],
                "ingredients_text" => $products['data'][0]['ingredients_text'],
                "serving_size" => $products['data'][0]['serving_size'],
                "serving_quantity" => $products['data'][0]['serving_quantity'],
                "nutriscore_score" => $products['data'][0]['nutriscore_score'],
                "nutriscore_grade" => $products['data'][0]['nutriscore_grade'],
                "main_category" => $products['data'][0]['main_category'],
                "image_url" => $products['data'][0]['image_url']
            ],
        ]);
    }

    /**
     * No content test
     */
    public function testGetNoContent(): void
    {
        $response = $this->get('/api/products/1');
        $response->assertStatus(204);
    }
}
