<?php

namespace App\Services\Product\OpenFood;

use App\Contracts\ProductServiceContract;
use App\Exceptions\ProductException;
use App\Jobs\ProductJob;
use App\Services\Product\File\FilesService;
use Exception;

class OpenFoodService extends OpenFoodApi implements ProductServiceContract
{
    private string $provider = 'openFood';
    private ?string $fileName;

    public function __construct(?string $fileName = null)
    {
        $this->fileName = $fileName;
        parent::__construct();
    }

    /**
     * @inheritdoc
     */
    public function dispatchJobs(): void
    {
        $productsNames = $this->getProducts();
        $productsNames->each(function ($productName) {
            ProductJob::dispatch($this->provider, $productName);
        });
    }

    /**
     * @inheritdoc
     */
    public function getProductFile(): void
    {
        try {
            $this->getFile($this->fileName);
            $filesService = new FilesService($this->fileName);
            $filesService->decompressProductFile($this->fileName);
            $products = $filesService->readProductFile();
            $validateService = new OpenFoodValidation($this->fileName);
            $products->each(function ($product) use ($validateService) {
                $validateService->validate(json_decode($product));
            });
        } catch (Exception $e) {
            throw new ProductException($e->getMessage());
        }
    }
}
