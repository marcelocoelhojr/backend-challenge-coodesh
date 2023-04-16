<?php

namespace App\Services\Product\OpenFood;

use App\Contracts\ProductServiceContract;
use App\Jobs\ProductJob;

class OpenFoodService extends OpenFoodApi implements ProductServiceContract
{
    private string $provider = 'openFood';

    /**
     * @inheritdoc
     */
    public function dispachJobs(): void
    {
        $productsNames = $this->getProducts();
        $productsNames->each(function ($productName) {
            ProductJob::dispatch($this->provider, $productName);
        });
    }

    /**
     * @inheritdoc
     */
    public function getProductsFiles(string $fileName): void
    {
        // TODO: implementar request dos arquivos
    }
}
