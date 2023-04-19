<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ProductTestCase;

class UpdateProductTest extends ProductTestCase
{
    use RefreshDatabase;

    /**
     * test product update success
     */
    public function testUpdateProductSuccess(): void
    {
        $productList = $this->get('/api/products/');
        $product = $this->get('/api/products/' . $productList['data'][0]['code']);
        $response = $this->put('/api/products/' . $product['data']['code'], [
            "code" => $product['data']['code'],
            "status" => $product['data']['status'],
            "imported_t" => $product['data']['imported_t'],
            "url" => $product['data']['url'],
            "creator" => $product['data']['creator'],
            "created_t" => $product['data']['created_t'],
            "last_modified_t" => $product['data']['last_modified_t'],
            "product_name" => 'teste',
            "quantity" => $product['data']['quantity'],
            "brands" => $product['data']['brands'],
            "categories" => $product['data']['categories'],
            "labels" => $product['data']['labels'],
            "cities" => $product['data']['cities'],
            "purchase_places" => $product['data']['purchase_places'],
            "stores" => $product['data']['stores'],
            "ingredients_text" => $product['data']['ingredients_text'],
            "serving_size" => $product['data']['serving_size'],
            "serving_quantity" => $product['data']['serving_quantity'],
            "nutriscore_score" => $product['data']['nutriscore_score'],
            "nutriscore_grade" => $product['data']['nutriscore_grade'],
            "main_category" => $product['data']['main_category'],
            "image_url" => $product['data']['image_url']
        ]);
        $response->assertStatus(200);
    }

     /**
     * Test product update error
     */
    public function testUpdateProductError(): void
    {
        $response = $this->put('/api/products/1', [
            "code" => 1,
            "status" => 'draft',
            "imported_t" => 1415302075,
            "url" => 'url example'
        ]);
        $response->assertStatus(400);
        $response->assertJsonFragment([
            'retcode' => 'BAD_REQUEST'
        ]);
    }
}
