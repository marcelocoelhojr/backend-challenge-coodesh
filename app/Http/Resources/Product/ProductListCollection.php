<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductListCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->collection->isEmpty()) {
            return [];
        }
        $productsColletion = $this->resource->map(function ($product) use ($request) {
            $productResource = new ProductResource($product);

            return $productResource->toArray($request);
        });
        $paginate = $this->getPaginateInfos();

        return $productsColletion->concat([$paginate])->toArray();
    }

    /**
     * Get page information
     *
     * @return array
     */
    private function getPaginateInfos(): array
    {
        $resource = json_decode($this->resource->toJson());

        return [
            'per_page' => $resource->per_page,
            'path' => $resource->path,
            'total' => $resource->total,
            'to' => $resource->to,
            'last_page' => $resource->last_page,
            'current_page' => $resource->current_page,
            'next_page_url' => $resource->next_page_url,
            'last_page_url' => $resource->last_page_url,
            'prev_page_url' => $resource->prev_page_url
        ];
    }
}
