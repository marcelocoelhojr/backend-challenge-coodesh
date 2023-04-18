<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductBadRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\CronLogResource;
use App\Http\Resources\Product\ProductListCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Services\CronLog\CronLogService;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
     * Get product list
     *
     * @return Response|JsonResponse
     */
    public function getProductsList(): Response|JsonResponse
    {
        $productService = new ProductService();
        $products = $productService->getProductList();
        if ($products == null) {
            return response()->noContent();
        }

        return apiResponse(new ProductListCollection($products), 'lista de produtos');
    }

  /**
     * Update product by code
     *
     * @param integer $code
     * @param array $params
     * @return JsonResponse
     */
    public function update(int $code, Request $request): JsonResponse
    {
        $validator = validate(Product::getValidation(), $request->all());
        if (method_exists($validator, 'getStatusCode')) {
            return $validator;
        }
        $productService = new ProductService();
        $product = $productService->updateProduct($code, $validator->validated());

        return apiResponse(new ProductResource($product), 'produto atualizado com sucesso');
    }
}
