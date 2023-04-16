<?php

namespace App\Services\Product;

use GuzzleHttp\Client;

class ApiConnection
{
    protected Client $connection;
    protected string $endpoint;

    public function __construct()
    {
        $this->connection = new Client();
    }

    /**
     * Get api content
     *
     * @param object $response
     * @return string
     */
    public function returnHandle(object $response): string
    {
        return $response->getBody()->getContents();
    }
}
