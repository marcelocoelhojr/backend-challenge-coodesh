<?php
namespace App\Contracts;

use Illuminate\Support\Collection;

interface ProductServiceContract
{
    /**
     * Dispatch jobs to get products
     *
     * @return void
     */
    public function dispatchJobs(): void;

    /**
     * Get product file names
     *
     * @return Collection
     */
    public function getProducts(): Collection;

    /**
     * Get product file from provider api
     *
     * @return void
     */
    public function getProductFile() : void;
}
