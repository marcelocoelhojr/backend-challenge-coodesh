<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $fileName;
    protected string $provider;

    const PRODUCT_CLASS_NAMESPACE = 'App\\Services\\Product\\';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $provider, string $fileName)
    {
        $this->provider = ucfirst($provider);
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws Exception
     */
    public function handle(): void
    {
        $providerClass =  self::PRODUCT_CLASS_NAMESPACE . $this->provider . "\\" . $this->provider . "Service";
        $providerService = new $providerClass($this->fileName);
        $providerService->getProductFile();
    }
}
