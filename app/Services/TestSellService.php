<?php

namespace App\Services;

class TestSellService
{
    protected $transaction;

    /**
     * Confirm sells on partner
     *
     * @param string $partner
     */
    public function confirmationProcess(string $partner)
    {
        dd('teste');
        // $confirmationClass = $this->getConfirmationClass($partner);

        // return $confirmationClass->dispatchJobs();
    }

    /**
     * Get confirmation instance
     *
     * @param string $partner
     *
     */
    // protected function getConfirmationClass(string $partner)//! contrato aqui
    // {
    //     try {
    //         $confirmationClass =  __NAMESPACE__ . "\\" . $partner . "\\" . $partner . "Confirmation";
    //         return new $confirmationClass();
    //     } catch (Error) {
    //         // throw new ClassNotFoundError('classe de confirmação não encontrada');
    //     }
    // }
}
