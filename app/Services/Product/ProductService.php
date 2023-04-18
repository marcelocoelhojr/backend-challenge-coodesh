<?php

namespace  App\Services\Product;

use App\Http\Resources\CronLogResource;
use App\Models\Product;
use App\Services\CronLog\CronLogService;
use Illuminate\Http\JsonResponse;

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
}
