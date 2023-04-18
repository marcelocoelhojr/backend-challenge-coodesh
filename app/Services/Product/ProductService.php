<?php

namespace  App\Services\Product;

use App\Http\Resources\CronLogResource;
use App\Models\Product;
use App\Services\CronLog\CronLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductService
{
    /**
     * Get cron API details
     *
     * @return JsonResponse
     */
    // public function updateProduct(int $id): JsonResponse
    // {

    // }

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
        return Product::where('external_id', $code)->delete();
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
}
