<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $payload = json_decode($this->payload);

        return [
            "code" =>  $this->external_id,
            "status" =>  $this->status,
            "imported_t" =>  $this->getDateSeconds($this->imported_t),
            "url" =>  $this->url,
            "creator" =>  $this->imported_t ?? "",
            "created_t" =>  $this->getDateSeconds($this->created_t),
            "last_modified_t" =>  $this->getDateSeconds($this->last_modified_t),
            "product_name" =>  $this->product_name,
            "quantity" =>  $payload->quantity ?? "",
            "brands" =>  $payload->brands ?? "",
            "categories" =>  $payload->categories ?? "",
            "labels" =>  $payload->labels ?? "",
            "cities" =>  $payload->cities ?? "",
            "purchase_places" =>  $payload->purchase_places ?? "",
            "stores" =>  $payload->stores ?? "",
            "ingredients_text" => $payload->ingredients_text ?? "",
            "serving_size" =>  $payload->serving_size ?? "",
            "serving_quantity" =>  (float)$payload->serving_quantity ?? "",
            "nutriscore_score" =>  (int)$payload->nutriscore_score ?? "",
            "nutriscore_grade" =>  $payload->nutriscore_grade ?? "",
            "main_category" =>  $payload->main_category ?? "",
            "image_url" =>  $payload->image_url ?? ""
        ];
    }

    /**
     * Convert timestamp to seconds
     *
     * @param ?string $date
     * @return integer
     */
    private function getDateSeconds(?string $date): int
    {
        return date_format(date_create($date), 'U');
    }
}
