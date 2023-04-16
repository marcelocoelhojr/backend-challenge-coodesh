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
     * Get product file from provider api
     *
     * @return void
     */
    public function getProductFile() : void;
}
