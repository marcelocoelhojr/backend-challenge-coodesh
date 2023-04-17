<?php

namespace App\Services\Product\OpenFood;

use App\Services\Product\ApiConnection;
use Illuminate\Support\Collection;

class OpenFoodApi extends ApiConnection
{
    public function __construct()
    {
        $this->endpoint = config('products.OpenFoodFacts.endpoint');
        parent::__construct();
    }

    /**
     * Get product file names
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
     * Download the compressed file and save it to disk
     *
     * @param string $fileName
     * @return void
     */
    protected function getFile(string $fileName): void
    {
        $url = $this->endpoint . $fileName;
        $fp = fopen('/tmp/' . $fileName, 'w');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }

    /**
     * Turn product string into array
     *
     * @param string $response
     * @return array
     */
    private function explodeProducts(string $response): array
    {
        $productNames = explode(PHP_EOL, $response);

        $removeKey = array_search('', $productNames);
        if ($removeKey) {
            unset($productNames[$removeKey]);
        }

        return $productNames;
    }
}
