<?php

namespace App\Services\Product;

use App\Contracts\ProductServiceContract;

class ProductConfirmationSchedule
{
    const PRODUCT_CLASS_NAMESPACE = 'App\\Services\\Product\\';

    /**
     * Schedule runner validation
     *
     * @param string|null $partner
     * @return void
     */
    public function __invoke(string $provider = null): void
    {
        if ($provider == null) {
            return;
        }
        $this->validationProcess(ucfirst($provider));
    }

    /**
     * Validate products on provider
     *
     * @param string $partner
     * @return void
     */
    public function validationProcess(string $provider): void
    {
        $validationClass = $this->getValidationClass($provider);

        $validationClass->dispatchJobs();
    }

    /**
     * Get product validation class
     *
     * @param string $provider
     * @return ProductServiceContract
     */
    private function getValidationClass(string $provider): ProductServiceContract
    {
        $validationClass = self::PRODUCT_CLASS_NAMESPACE . $provider . "\\" . $provider . "Service";

        return new $validationClass();
    }
}
