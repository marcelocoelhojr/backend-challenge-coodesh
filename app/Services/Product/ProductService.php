<?php

namespace  App\Services\Product;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    /**
     * Get product by external code
     *
     * @param int $code
     * @return null|Product
     */
    public function getProduct(int $code): null|Product
    {
        return Product::where('external_id', $code)->first();
    }

    /**
     * Delete product by external code
     *
     * @param int $code
     * @return integer
     */
    public function deleteProduct(int $code): int
    {
        $product = Product::where('external_id', $code)->first();
        if ($product == null) {
            return 0;
        }
        $product->status = 'trash';
        $product->save();

        return $product->delete();
    }

    /**
     * Get product list
     *
     * @return LengthAwarePaginator
     */
    public function getProductList(): LengthAwarePaginator
    {
        return Product::paginate();
    }

    /**
     * Update product by code
     *
     * @param integer $code
     * @param array $params
     * @return Product
     */
    public function updateProduct(int $code, array $params): Product
    {
        $product = Product::where('external_id', $code)->firstOrFail();
        $product->external_id =  $code;
        $product->status =  $params['status'];
        $product->imported_t =  gmdate("Y-m-d H:i:s", $params['imported_t']);
        $product->url =  $params['url'];
        $product->product_name = $params['product_name'] ?? null;
        $product->payload = json_encode($params);
        $product->save();

        return $product;
    }
}
