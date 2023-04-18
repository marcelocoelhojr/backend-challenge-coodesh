<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\CronLogResource;
use App\Http\Resources\Product\ProductResource;
use App\Services\CronLog\CronLogService;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    /**
     * Get product by external code
     *
     * @param int $code
     * @return Response|JsonResponse
     */
    public function getProduct(int $code): Response|JsonResponse
    {
        $productService = new ProductService();
        $product = $productService->getProduct($code);
        if ($product == null) {
            return response()->noContent();
        }

        return apiResponse(new ProductResource($product), 'dados do produto');
    }

     /**
     * Delete product by external code
     *
     * @param int $code
     * @return Response|JsonResponse
     */
    public function delete(int $code): Response|JsonResponse
    {
        $productService = new ProductService();
        $productStatus = $productService->deleteProduct($code);
        if ($productStatus == 0) {
            return response()->noContent();
        }

        return apiResponse(['code' => $code], 'produto deletado com sucesso');
    }

    /**
     *
     *
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request,
            [
                'external_id' => 'R',
                'product_name' => '',
                'status' => '',
                'imported_t' => '',
                'url' => '',
                'product_file' => '',
                'payload' => '',
            ]
        );
        dd($validator);
        if ($validator->fails()) {
            // throw new ValidationException($validator);
        }

        $cronService = new ProductService();
        // $log = $cronService->updateProduct($id);

        return apiResponse(new CronLogResource($log), 'detalhes da api');
    }
}
