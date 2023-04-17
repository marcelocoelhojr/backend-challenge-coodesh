<?php

namespace App\Services\Product;

use App\Contracts\ProductServiceContract;

class ProductConfirmationSchedule
{
    const PRODUCT_CLASS_NAMESPACE = 'App\\Services\\Product\\';

    /**
     * Schedule runner confirmation
     *
     * @param string|null $partner
     * @return void
     */
    public function __invoke(string $provider = null): void
    {
        // TODO: Detalhes da API, se conexão leitura e escritura com a base de dados está OK, horário da última vez que o CRON foi executado, tempo online e uso de memória.
        if ($provider == null) {
            return;
        }

        $this->validationProcess(ucfirst($provider));
    }

    /**
     * Confirm sells on partner
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
