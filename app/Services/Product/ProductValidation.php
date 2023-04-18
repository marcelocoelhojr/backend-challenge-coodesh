<?php

namespace App\Services\Product;

use App\Models\Product;
use stdClass;

abstract class ProductValidation
{
    protected stdClass $product;
    protected string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * Validate if a code has product
     *
     * @param stdClass $product
     * @return void
     */
    public function validate(stdClass $product): void
    {
        $this->product = $product;
        $code = $this->findProduct();
        if ($code != null) {
            return;
        }
        $model = $this->setProductApiData($product);
        $model->save();
    }

    /**
     * Find product using a code
     *
     * @return ?Product
     */
    protected function findProduct(): ?Product
    {
        $externalId = $this->extractFindCode();

        return Product::where('external_id', $externalId)->first();
    }

    /**
     * Extract code reference from the product
     *
     * @return int
     */
    abstract protected function extractFindCode(): int;

    /**
     * Create product object with common attributes
     *
     * @return Product
     */
    abstract protected function setProductApiData(): Product;
}
