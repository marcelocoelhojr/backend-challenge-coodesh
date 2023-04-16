<?php

namespace App\Services\Product\OpenFood;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class OpenFoodApi extends ApiConnection
{
    protected Client $connection;
    protected string $endpoint;

    /**
     * Get files products list
     *
     * @return Collection
     */
    public function getProducts(): Collection
    {
        $response = $this->connection->get($this->endpoint . 'index.txt');
        $products = $this->returnHandle($response);

        return collect($this->explodeProducts($products));
    }

    /**
     * Turn product string into array
     *
     * @param string $response
     * @return array
     */
    private function explodeProducts(string $response): array
    {
       return explode(PHP_EOL, $response);
    }
}
