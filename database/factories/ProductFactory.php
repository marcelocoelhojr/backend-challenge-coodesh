<?php

namespace Database\Factories;

use App\Models\Addresses;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobVacancie>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'external_id' => rand(1000, 5000),
            'product_name' => $this->faker->name,
            'status' => 'published',
            'imported_t' => Carbon::now()->format('Y-m-d H:i:s'),
            'url' => $this->faker->url(),
            'product_file' => 'products_01.json.gz',
            'payload' => '{
                "url": "http://world-en.openfoodfacts.org/product/0000000000017/vitoria-crackers", "brands": null,
                "cities": null, "labels": null,"status": "published", "stores": null, "creator": "2023-04-18 00:28:06",
                "quantity": null, "created_t": 1681838495,"image_url": null, "categories": null,
                "imported_t": 1681777686, "product_name": "Vitória crackers 1", "serving_size": null,
                "main_category": null, "last_modified_t": 1681838495, "purchase_places": null,
                "ingredients_text": null, "nutriscore_grade": null,"nutriscore_score": 0, "serving_quantity": 0}'
        ];
    }
}
