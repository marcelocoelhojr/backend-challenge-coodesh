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
    public function dispachJobs(): void
    {
        $productsNames = $this->getProducts();
        dump($productsNames);
        $productsNames->each(function ($productName) {
            ProductJob::dispatchSync($this->provider, $productName); //! tirar do sync
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
            $products->each(function ($product) {
                dump(json_decode($product));
                // TODO: implementar função para interar os dados no banco.
            });
        } catch (Exception $e) {
            throw new ProductException($e->getMessage());
        }
    }
}
