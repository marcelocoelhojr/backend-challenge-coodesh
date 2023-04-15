<?php

namespace App\Services;

class TestConfirmationSchedule
{
    /**
     * Schedule runner confirmation
     *
     * @param string|null $partner
     * @return void
     */
    public function __invoke(string $partner = null): void
    {
        if ($partner == null) {
            return;
        }

        $partnerService = new TestSellService();
        $partnerService->confirmationProcess(ucfirst($partner));
    }
}
