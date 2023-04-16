<?php
namespace App\Contracts;

use Illuminate\Support\Collection;

interface ProductServiceContract
{
    /**
     * Dispach jobs to get products
     *
     * @return void
     */
    public function dispachJobs(): void;

    /**
     * Get files products list
     *
     * @return Collection
     */
    public function getProducts(): Collection;

    /**
     * Get products files from api
     *
     * @param string $fileName
     * @return void
     */
    public function getProductsFiles(string $fileName) : void;
}
